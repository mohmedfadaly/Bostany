<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use RealRashid\SweetAlert\Facades\Alert;


class CitiesController extends Controller
{
    public function index()
    {
        $data = City::latest()->get();
        return view('dashboard.cities.list',compact('data'));
    }

    public function store(Request $request)
    {
        $data = new City;
        $data->title_ar        = $request->title_ar;
        $data->title_en        = $request->title_en;
        $data->save();
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    public function update(Request $request,$id)
    {
        $data = City::findOrFail($id);
        $data->title_ar        = $request->title_ar;
        $data->title_en        = $request->title_en;
        $data->save();
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    public function delete($id)
    {
        $data = City::findOrFail($id);
        $data->delete();
        Alert::success('عملية ناجحة','تم الحذف');
        return back();
    }
}
