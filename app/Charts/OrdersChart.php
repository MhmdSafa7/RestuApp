<?php
namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Order;
use Carbon\Carbon;

class OrdersChart
{
    public function buildChart()
    {
          // Fetch orders for the current month
    $orders = Order::whereMonth('created_at', now()->month)
    ->whereYear('created_at', now()->year)
    ->get();
    
        // Debugging: Check if data exists
        if ($orders->isEmpty()) {
            dd('No orders found for today');
        }

        $orderData = $this->processOrderData($orders);

        $chart = (new LarapexChart())->lineChart();
        $chart->setTitle('Orders Per Time Slot')
              ->setXAxis(['Morning', 'Afternoon', 'Evening', 'Late Night']);

        $colors = [
            'Monday'    => '#8B0000',
            'Tuesday'   => '#003049',
            'Wednesday' => '#CC5500',
            'Thursday'  => '#556B2F',
            'Friday'    => '#006400',
            'Saturday'  => '#800080',
            'Sunday'    => '#00008B'
        ];

        foreach ($orderData as $day => $data) {
            $chart->addData("Orders on $day", array_values($data));
        }

        $chart->setColors(array_values($colors));

        return $chart;
    }

    private function processOrderData($orders)
    {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $timeSlots = ['morning', 'afternoon', 'evening', 'late_night'];

        $data = array_fill_keys($days, array_fill_keys($timeSlots, 0));

        foreach ($orders as $order) {
            $day = date('l', strtotime($order->created_at));
            $time = Carbon::parse($order->created_at)->format('H:i');

            if ($time >= '09:00' && $time < '12:00') {
                $data[$day]['morning']++;
            } elseif ($time >= '12:00' && $time < '17:00') {
                $data[$day]['afternoon']++;
            } elseif ($time >= '17:00' && $time < '21:00') {
                $data[$day]['evening']++;
            } elseif ($time >= '21:00' || $time < '02:00') {
                $data[$day]['late_night']++;
            }
        }

        return $data;
    }
}
