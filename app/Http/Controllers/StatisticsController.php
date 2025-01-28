<?php
namespace App\Http\Controllers;

use App\Charts\FeedbackChart;

class StatisticsController extends Controller
{
    public function statisticsPage()
    {
        // Instantiate the chart
        $chart = new FeedbackChart();

        // Return the view with the chart
        return view('pages.statistics', ['chart' => $chart]);
    }
}
