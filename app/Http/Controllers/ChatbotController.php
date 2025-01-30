<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI;

class ChatbotController extends Controller
{
    protected $openAi;

    public function __construct()
    {
        $this->openAi = OpenAI::client(env('OPENAI_API_KEY'));
    }

    public function SendChat(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        try {
            $response = $this->openAi->chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a helpful chatbot.'],
                    ['role' => 'user', 'content' => $request->input('message')],
                ],
                'temperature' => 0.7,
                'max_tokens' => 200,
            ]);

            return response()->json([
                'reply' => $response['choices'][0]['message']['content'] ?? 'No response',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
