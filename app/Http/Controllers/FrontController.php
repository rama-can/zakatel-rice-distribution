<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\RiceIn;
use App\Models\RiceOut;
use App\Exports\RiceInExport;
use App\Exports\RiceOutExport;
use App\Models\RiceDistribution;
use App\Http\Requests\PageRequest;
use Maatwebsite\Excel\Facades\Excel;

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

    public function riceReport()
    {
        $inRices = RiceIn::all();
        $outRices = RiceOut::with('riceDistribution')->get();
        return view('pages.frontend.rice-report', compact(
            'inRices',
            'outRices'
        ));
    }

    public function inRiceExport()
    {
        return Excel::download(new RiceInExport, 'data-pemasukan-beras-zakat.xlsx');
    }

    public function outRiceExport()
    {
        return Excel::download(new RiceOutExport, 'data-pengeluaran-beras-zakat.xlsx');
    }
}