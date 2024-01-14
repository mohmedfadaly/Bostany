<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;

class AdminAuthController extends Controller
{
    # login
    public function Login()
    {

        return view('admin.auth.login');
    }

    # check auth
    public function ChechAuth(Request $request)
    {
        if(auth()->guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect()->route('admin.home');
        }else{
            Alert::warning('warning','يوجد خطأ في التسجيل!');
            return back();
        }
    }

    # logout
    public function Logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login.admin');
    }
}
