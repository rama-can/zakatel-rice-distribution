<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RiceOutController extends Controller
{
    public function index()
    {
        return view('pages.admin.rice.out.index');
    }
}