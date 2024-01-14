<?php

namespace Modules\About\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Main\Entities\Slider;
use RealRashid\SweetAlert\Facades\Alert;
use View;
use Session;
use Image;
use File;
use Auth;
use Modules\About\Entities\About;
use Modules\About\Entities\Files;
use Modules\About\Entities\Fuq;
use Modules\About\Entities\OurJourney;
use Modules\About\Entities\Team;

class AboutController extends Controller
{
    public function about_us()
    {
        $model = About::where('id',1)->latest()->first();
    	return view('about::about_us.about_us',compact('model'));
    }

    public function section_update(Request $request, $id)
    {

        $data = About::where('id',$id)->first();
        if(!is_null($request->title))
        {
            $data->title = $request->title;

        }
        if(!is_null($request->sub_title))
        {
            $data->sub_title = $request->sub_title;

        }
        if(!is_null($request->description))
        {
            $data->description = $request->description;

        }
        if(!is_null($request->sub_description))
        {
            $data->sub_description = $request->sub_description;

        }

        if(!is_null($request->image1))
        {
            File::delete('uploads/about1/'.$data->image1);
            $photo=$request->image1;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/about1/'.$name,100);
            $data->image1=$name;
        }
        if(!is_null($request->image2))
        {
            File::delete('uploads/about2/'.$data->image2);
            $photo=$request->image2;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/about2/'.$name,100);
            $data->image2=$name;
        }
        if(!is_null($request->image3))
        {
            File::delete('uploads/about3/'.$data->image3);
            $photo=$request->image3;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/about3/'.$name,100);
            $data->image3=$name;
        }



        $data->save();
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }
}
