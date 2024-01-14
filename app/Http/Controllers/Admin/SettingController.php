<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Social;
use File;

class SettingController extends Controller
{
    public function index()
    {
        $exp = ['banner'];
        $rows = Setting::whereNotIn('key',$exp)->get();
        $banner = Setting::where('key','banner')->first();

        if(!$banner)
        {
            $banner = new Setting;
            $banner->title = 'البنر';
            $banner->key   = 'banner';
            $banner->value = 'default.png';
            $banner->attr  = 'required';
            $banner->save();
        }

        $social = Social::get();
        return view('dashboard.setting.setting',compact('rows','social','banner'));
    }

    public function update(Request $request)
    {
        foreach ($request->all() as $req => $value) {
            if($req !== '_token')
            {
                $row = Setting::where('key',$req)->first();
                $row->value = $value;
                $row->save();
            } 
        }
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    public function update_banner(Request $request)
    {
        $row = Setting::where('key','banner')->first();
        if($row->value !== 'default.png')
        {
            File::delete('uploads/banner/'.$row->value);
        }
        $photo=$request->banner;
        $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
        $photo->move(public_path('uploads/banner/'),$name);
        $row->value=$name;
        $row->save();

        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }
}
