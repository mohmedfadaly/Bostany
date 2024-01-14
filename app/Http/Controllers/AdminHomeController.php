<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Package;

use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function Index()
    {
        $Package_count = Package::latest()->count();
        $User_count = User::where('role', '2')->latest()->count();
        return view('admin.home.home',compact('Package_count','User_count'));
    }
}
