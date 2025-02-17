<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\Feedback;

class UserHistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $reservations = Reservation::where('user_id', $user->id)->orderBy('date', 'desc')->get();
        $feedbacks = Feedback::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('pages.history', compact('orders', 'reservations', 'feedbacks'));
    }
}
