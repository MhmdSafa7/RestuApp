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
                 '#8B0000', // 1 star
                 '#DC143C', // 2 stars
                 '#CC5500', // 3 stars
                 '#556B2F', // 4 stars
                 '#003049', // 5 stars
             ]);
    }
}
