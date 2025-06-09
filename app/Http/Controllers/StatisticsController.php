<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class StatisticsController extends Controller
{
    public function index() : View
    {
        $monthlyInvestments = [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'data' => [150000, 320000, 450000, 580000, 720000, 890000, 1050000, 1200000, 1350000, 1500000, 1680000, 1850000]
        ];

        $monthlyInterest = [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'data' => [12000, 25000, 38000, 52000, 67000, 82000, 98000, 115000, 132000, 150000, 168000, 187000]
        ];

        $monthlyInvestors = [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'data' => [120, 245, 380, 510, 650, 790, 920, 1050, 1180, 1320, 1450, 1580]
        ];

        $aggregatedStats = [
            'totalInvested' => '1,850,000 EUR',
            'totalInterest' => '187,000 EUR',
            'averagePortfolio' => '1,170 EUR'
        ];

        $portfolioBreakdown = [
            'labels' => ['Current', '1-15 days', '16-30 days', '31-60 days', '60+ days'],
            'data' => [75, 12, 8, 3, 2],
            'colors' => ['#92D050', '#FFC000', '#FF9A00', '#FF6600', '#FF0000']
        ];

        return view('statistics', compact(
            'monthlyInvestments',
            'monthlyInterest',
            'monthlyInvestors',
            'aggregatedStats',
            'portfolioBreakdown'
        ));
    }
}

