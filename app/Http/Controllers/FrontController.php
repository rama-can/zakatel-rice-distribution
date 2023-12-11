<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\RiceDistribution;
use App\Http\Requests\PageRequest;

class FrontController extends Controller
{
    public function index()
    {
        $distributions = RiceDistribution::latest()->take('3')->get();
        return view('pages.frontend.home', compact(
            'distributions'
        ));
    }

    public function distribution()
    {
        $distributions = RiceDistribution::latest()->paginate(4);
        return view('pages.frontend.rice-distribution.index', compact(
            'distributions'
        ));
    }

    public function distributionBySlug(string $slug)
    {
        $data = RiceDistribution::where('slug', $slug)->firstOrFail();
        $date = $data->distribution_date->format('d F Y');
        return view('pages.frontend.rice-distribution.detail', compact(
            'data',
            'date'
        ));
    }

    public function pageBySlug(string $slug)
    {
        return view('pages.frontend.page', [
            'data' => Page::where('slug', $slug)->firstOrFail()
        ]);
    }
}