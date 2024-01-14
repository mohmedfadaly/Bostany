<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Help_Center;
use RealRashid\SweetAlert\Facades\Alert;


class HelpCenterController extends Controller
{
    public function index()
    {
        $data = Help_Center::latest()->get();
        return view('dashboard.help_center.list',compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Help_Center;
        $data->title_ar   = $request->title_ar;
        $data->title_en   = $request->title_en;
        $data->content_ar = $request->content_ar;
        $data->content_en = $request->content_en;
        $data->save();
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    public function update(Request $request,$id)
    {
        $data = Help_Center::findOrFail($id);
        $data->title_ar   = $request->title_ar;
        $data->title_en   = $request->title_en;
        $data->content_ar = $request->content_ar;
        $data->content_en = $request->content_en;
        $data->save();
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    public function delete($id)
    {
        $data = Help_Center::findOrFail($id);
        $data->delete();
        Alert::success('عملية ناجحة','تم الحذف');
        return back();
    }
}
