<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Order;

class OrdersChart
{
    public function buildChart()
    {
        // Fetch orders data
        $ordersData = Order::selectRaw('DATE(created_at) as order_date, HOUR(created_at) as order_hour, COUNT(id) as order_count')
            ->groupBy('order_date', 'order_hour')
            ->orderBy('order_date')
            ->orderBy('order_hour')
            ->get();

        $datasets = [];

        // Prepare data for each day
        foreach ($ordersData as $order) {
            $day = $order->order_date;
            $hour = $order->order_hour . ':00';
            $datasets[$day][$hour] = $order->order_count;
        }

        // Create the time labels for the x-axis
        $timeLabels = array_map(function ($h) { return "$h:00"; }, range(9, 26)); // 9 AM to 2 AM

        // Prepare data for the chart
        $ordersDataset = [];
        foreach ($datasets as $day => $data) {
            $ordersDataset[] = array_map(fn($hour) => $data[$hour] ?? 0, $timeLabels);
        }

        // Create and return the chart object
        return (new LarapexChart)
            ->setType('line') // Correct method
            ->setTitle('Orders Per Hour')
            ->setXAxis($timeLabels)
            ->setDataset($ordersDataset);
    }
}
