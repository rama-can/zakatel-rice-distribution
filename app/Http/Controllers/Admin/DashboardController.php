<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\RiceDistribution;
use App\Models\TotalRice;

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
}