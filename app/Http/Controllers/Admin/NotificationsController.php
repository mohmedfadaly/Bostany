<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class NotificationsController extends Controller
{
    public function index()
    {
        $data = Notification::latest()->get();
        return view('dashboard.notifications.list',compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Notification;
        $data->title_ar   = $request->title_ar;
        $data->title_en   = $request->title_en;
        $data->content_ar = $request->content_ar;
        $data->content_en = $request->content_en;
        $data->save();
        NotiForTopic($data->title_ar,$data->content_ar,['foo'=>'bar'],'','7_ar');
        NotiForTopic($data->title_en,$data->content_en,['foo'=>'bar'],'','7_en');
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    public function update(Request $request,$id)
    {
        $data = Notification::findOrFail($id);
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
        $data = Notification::findOrFail($id);
        $data->delete();
        Alert::success('عملية ناجحة','تم الحذف');
        return back();
    }
}


