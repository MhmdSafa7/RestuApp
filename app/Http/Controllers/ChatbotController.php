<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Reservation;

class ChatbotController extends Controller
{
    protected $openAi;



    public function __construct()
    {
        $this->openAi = OpenAI::client(env('OPENAI_API_KEY'));
    }


    public function getAllReservations()
    {
        $reservationsArray = Reservation::all()->toArray();
        return response()->json($reservationsArray);
    }

    public function getAllEvents()
    {
        $eventsArray = Event::all()->toArray();
        return response()->json($eventsArray);
    }

    // Get all offers
    public function getAllOffers()
    {
        $offersArray = Offer::all()->toArray();
        return response()->json($offersArray);
    }

    // Get all products
    public function getAllProducts()
    {
        $productsArray = Product::all()->toArray();
        return response()->json($productsArray);
    }



    public function SendChat(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $conversationHistory = session('conversationHistory', []);

        $resevartions = $this->getAllReservations()->getData();
        $events = $this->getAllEvents()->getData();
        $offers = $this->getAllOffers()->getData();
        $products = $this->getAllProducts()->getData();


        // Add the user message to the conversation history
        $conversationHistory[] = [
            'role' => 'user',
            'content' => $request->input('message')
        ];


        try {
            // Read system role from file
            $filePath = public_path('chatbotData.txt'); // Path to the file in the public folder
            $systemRole = file_exists($filePath) ? trim(file_get_contents($filePath)) : 'You are a helpful assistant.';

            // Convert database entries to string
            $resevartionsString = json_encode($resevartions);
            $eventsString = json_encode($events);
            $offersString = json_encode($offers);
            $productsString = json_encode($products);

            // Append to the system role
            $systemRole .= "\n" . "Reservations: " . $resevartionsString;
            $systemRole .= "\n" . "Events: " . $eventsString;
            $systemRole .= "\n" . "Offers: " . $offersString;
            $systemRole .= "\n" . "Products: " . $productsString;

            \Log::info($systemRole); // Check if data looks correct

            $response = $this->openAi->chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => $systemRole], // Use system role from file
                    ['role' => 'user', 'content' => $request->input('message')],
                ],
                'temperature' => 0.7,
                'max_tokens' => 200,
            ]);


        $systemResponse = $response['choices'][0]['message']['content'] ?? 'No response';

        // Add the system response to the conversation history
        $conversationHistory[] = [
            'role' => 'system',
            'content' => $systemResponse
        ];

        // Save the conversation history to the session
        session(['conversationHistory' => $conversationHistory]);

        return response()->json([
            'reply' => $systemResponse,
            'conversationHistory' => $conversationHistory // Return the full conversation history
        ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }




}
