<?php

namespace App\Http\Controllers;

use App\Charts\FeedbackChart; // For the pie chart
use Illuminate\Http\Request;
use App\Models\Reservation; // Assuming you have a Reservation model
use ConsoleTVs\Charts\Classes\Chartjs\Chart; // For the bar graph

class StatisticsController extends Controller
{
    public function statisticsPage()
    {
        // Feedback Pie Chart
        $chart = new FeedbackChart();

        // Reservation Bar Chart
        $reservations = Reservation::all();
        $reservationData = $this->processReservationData($reservations);

        $reservationChart = new Chart();
        $reservationChart->labels(array_keys($reservationData)); // Days of the week
        $reservationChart->dataset('Morning', 'bar', array_column($reservationData, 'morning'))
                         ->backgroundColor('#8B0000');
        $reservationChart->dataset('Afternoon', 'bar', array_column($reservationData, 'afternoon'))
                         ->backgroundColor('#003049');
        $reservationChart->dataset('Evening', 'bar', array_column($reservationData, 'evening'))
                         ->backgroundColor('#CC5500');
        $reservationChart->dataset('Late Night', 'bar', array_column($reservationData, 'late_night'))
                         ->backgroundColor('#556B2F');

       // Configure chart options
       $reservationChart->options([
        'responsive' => true,
        'scales' => [
            'xAxes' => [
                [
                    'stacked' => true,
                ],
            ],
            'yAxes' => [
                [
                    'stacked' => true,
                ],
            ],
        ],
        'layout' => [
            'padding' => [
                'left' => 10,
                'right' => 10,
                'top' => 10,
                'bottom' => 10,
            ],
        ],
    ]);

        // Pass both charts to the view
        return view('pages.statistics', [
            'chart' => $chart,
            'reservationChart' => $reservationChart
        ]);
    }

    private function processReservationData($reservations)
    {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $timeSlots = ['morning', 'afternoon', 'evening', 'late_night'];

        $data = array_fill_keys($days, array_fill_keys($timeSlots, 0));

        foreach ($reservations as $reservation) {
            $day = date('l', strtotime($reservation->date));
            $time = strtotime($reservation->time);

            if ($time >= strtotime('9:00 AM') && $time < strtotime('12:00 PM')) {
                $data[$day]['morning']++;
            } elseif ($time >= strtotime('12:00 PM') && $time < strtotime('5:00 PM')) {
                $data[$day]['afternoon']++;
            } elseif ($time >= strtotime('5:00 PM') && $time < strtotime('9:00 PM')) {
                $data[$day]['evening']++;
            } elseif ($time >= strtotime('9:00 PM') || $time < strtotime('2:00 AM')) {
                $data[$day]['late_night']++;
            }
        }

        return $data;
    }
}
