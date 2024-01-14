<?php

namespace App\Http\Controllers;

use App\Models\Checkup;
use App\Models\Clinic;
use App\Models\Patient;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index()
    {
        return view('dashboard.home.home');
    }
}
