<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $jobs = Job::where('status', 'aktif')
            ->latest()
            ->take(3)
            ->get();

        return view('landing.index', compact('jobs'));
    }
}
