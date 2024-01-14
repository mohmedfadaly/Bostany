<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class AuthController extends Controller
{
    # login
    public function Login()
    {
        if(User::count() == 0)
        {

        }
        return view('dashboard.auth.login');
    }

    # check auth
    public function ChechAuth(Request $request)
    {
        if(auth()->attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            auth()->user()->created_at = Carbon::now();
            auth()->user()->save();
            return redirect()->route('admin.home');
        }else{
            Alert::warning('warning','يوجد خطأ في التسجيل!');
            return back();
        }
    }

    # logout
    public function Logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
