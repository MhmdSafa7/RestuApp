<?php

namespace App\Charts;
use App\Models\Feedback; // Your Feedback model
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class FeedbackChart extends Chart
{
    public function __construct()
    {
        parent::__construct();

        // Fetch counts of each rating
        $rate1 = Feedback::where('rate', 1)->count();
        $rate2 = Feedback::where('rate', 2)->count();
        $rate3 = Feedback::where('rate', 3)->count();
        $rate4 = Feedback::where('rate', 4)->count();
        $rate5 = Feedback::where('rate', 5)->count();

        // Set chart labels (1-star to 5-star ratings)
        $this->labels(['1 Star', '2 Stars', '3 Stars', '4 Stars', '5 Stars']);

        // Set dataset with rating counts
        $this->dataset('Feedback by Star Ratings', 'pie', [$rate1, $rate2, $rate3, $rate4, $rate5])
             ->backgroundColor([
                 '#f48c06', // 1 star
                 '#e85d04', // 2 stars
                 '#dc2f02', // 3 stars
                 '#d00000', // 4 stars
                 '#9d0208', // 5 stars
             ]);
    }
}
