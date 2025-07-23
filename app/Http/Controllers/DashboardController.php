<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $services = DB::connection('dynamic')->table('services')->get();
        return view('dashboard', compact('services'));
    }
}
