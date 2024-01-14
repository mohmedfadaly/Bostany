<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Setting\Entities\Setting;
use Image;
use File;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{

    public function index()
    {
        $setting = Setting::first();
        return view('setting::setting.setting', compact('setting'));
    }

    public function update(Request $request)
    {

        $data = Setting::first();
        if(!is_null($request->name))
        {
            $data->name = $request->name;

        }
        if(!is_null($request->mission))
        {
            $data->mission = $request->mission;

        }
        if(!is_null($request->culture))
        {
            $data->culture = $request->culture;

        }
        if(!is_null($request->logo))
        {
            File::delete('uploads/culture/'.$data->logo);
            $photo=$request->logo;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/culture/'.$name,100);
            $data->logo=$name;
        }
        if(!is_null($request->about))
        {
            $data->about = $request->about;

        }
        if(!is_null($request->contact_image))
        {
            File::delete('uploads/about/'.$data->contact_image);
            $photo=$request->contact_image;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/about/'.$name,100);
            $data->contact_image=$name;
        }
        if(!is_null($request->manager_name))
        {
            $data->manager_name = $request->manager_name;

        }
        if(!is_null($request->manager_image))
        {
            File::delete('uploads/manager/'.$data->manager_image);
            $photo=$request->manager_image;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/manager/'.$name,100);
            $data->manager_image=$name;
        }
        if(!is_null($request->manager_message))
        {
            $data->manager_message = $request->manager_message;

        }
        if(!is_null($request->email))
        {
            $data->email = $request->email;

        }
        if(!is_null($request->phone))
        {
            $data->phone = $request->phone;

        }
        if(!is_null($request->link_facebook))
        {
            $data->link_facebook = $request->link_facebook;

        }
        if(!is_null($request->link_linkedin))
        {
            $data->link_linkedin = $request->link_linkedin;

        }
        if(!is_null($request->youtube))
        {
            $data->youtube = $request->youtube;

        }
        if(!is_null($request->link_twitter))
        {
            $data->link_twitter = $request->link_twitter;

        }
        if(!is_null($request->address))
        {
            $data->address = $request->address;

        }
        if(!is_null($request->long))
        {
            $data->long = $request->long;

        }
        if(!is_null($request->lat))
        {
            $data->lat = $request->lat;

        }
        if(!is_null($request->zoom))
        {
            $data->zoom = $request->zoom;

        }
        if(!is_null($request->facebook))
        {
            $data->facebook = $request->facebook;

        }
        if(!is_null($request->twitter))
        {
            $data->twitter = $request->twitter;

        }
        if(!is_null($request->linkedin))
        {
            $data->linkedin = $request->linkedin;

        }
        if(!is_null($request->insta))
        {
            $data->insta = $request->insta;

        }

        $data->save();
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }


}
