<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Models\User;
use App\Models\RiceIn;
use App\Models\RiceOut;
use App\Models\TotalRice;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\RiceDistribution;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $distribution = RiceDistribution::count();
        $page = Page::count();
        $latestTotalRice = TotalRice::latest()->first();
        $riceTotal = $latestTotalRice ? number_format($latestTotalRice->total, 0, ',', '.') . ' Kg' : '0 Kg';
        $users = User::latest()->take(3)->get();
        $avatar = 'https://ui-avatars.com/api/?name=';
        return view('pages.admin.dashboard', compact(
            'users',
            'avatar',
            'distribution',
            'page',
            'riceTotal'
        ));
    }

    public function riceChart()
    {
        // Ambil data RiceIn dan RiceOut dari bulan Oktober 2023 sampai Januari 2024
        $riceInData = RiceIn::whereBetween('created_at', ['2023-10-01', '2024-01-31'])
            ->get();

        $riceOutData = RiceOut::with('riceDistribution')
            ->whereBetween('created_at', ['2023-10-01', '2024-01-31'])
            ->get();

        // Mengelompokkan data RiceIn dan RiceOut berdasarkan bulan
        $riceInGrouped = $this->groupDataByMonth($riceInData);
        $riceOutGrouped = $riceOutData->groupBy(function ($item) {
            return Carbon::parse($item->created_at)->format('F Y');
        })->map(function ($monthData) {
            return $monthData->sum('riceDistribution.quantity_distributed');
        });

        return response()->json([
            'labels' => $this->getMonthLabels(),
            'riceInData' => $this->getMonthlyData($riceInGrouped),
            'riceOutData' => $riceOutGrouped->values()->all(),
        ]);
    }

    private function groupDataByMonth($data)
    {
        $groupedData = [];
        foreach ($data as $item) {
            $month = Carbon::parse($item->created_at)->format('F Y');
            $groupedData[$month][] = $item;
        }

        return $groupedData;
    }

    private function getMonthLabels()
    {
        return ['October 2023', 'November 2023', 'December 2023', 'January 2024'];
    }

    private function getMonthlyData($data)
    {
        $monthlyData = [];

        foreach ($this->getMonthLabels() as $month) {
            if (isset($data[$month])) {
                $monthlyData[] = collect($data[$month])->sum('quantity');
            } else {
                $monthlyData[] = 0;
            }
        }

        return $monthlyData;
    }
}