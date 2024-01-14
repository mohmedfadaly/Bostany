<?php

namespace Modules\Main\Http\Controllers;

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
use Modules\Main\Entities\Email;
use Modules\Main\Entities\Section;
use Str;
class SectionController extends Controller
{
    public function section_header()
    {
        $model = Section::where('id',1)->latest()->first();
    	return view('main::sections.section_header',compact('model'));
    }

    public function section_services()
    {
        $model = Section::where('id',2)->latest()->first();
    	return view('main::sections.section_services',compact('model'));
    }

    public function section_features()
    {
        $model = Section::where('id',3)->latest()->first();
    	return view('main::sections.section_features',compact('model'));
    }

    public function section_gallary()
    {
        $model = Section::where('id',4)->latest()->first();
    	return view('main::sections.section_gallary',compact('model'));
    }

    public function section_fuq()
    {
        $model = Section::where('id',5)->latest()->first();
    	return view('main::sections.section_fuq',compact('model'));
    }

    public function section_article()
    {
        $model = Section::where('id',6)->latest()->first();
    	return view('main::sections.section_article',compact('model'));
    }

    public function section_contact()
    {
        $model = Section::where('id',7)->latest()->first();
    	return view('main::sections.section_contact',compact('model'));
    }

    public function section_footer()
    {
        $model = Section::where('id',8)->latest()->first();
    	return view('main::sections.section_footer',compact('model'));
    }

    public function section_update(Request $request, $id)
    {

        $data = Section::where('id',$id)->first();
        if(!is_null($request->title))
        {
            $data->title = $request->title;

        }
        if(!is_null($request->sub_title))
        {
            $data->sub_title = $request->sub_title;

        }
        if(!is_null($request->client))
        {
            $data->client = $request->client;

        }
        if(!is_null($request->years))
        {
            $data->years = $request->years;

        }
        if(!is_null($request->villa))
        {
            $data->villa = $request->villa;

        }
        if(!is_null($request->home))
        {
            $data->home = $request->home;

        }
        if(!is_null($request->description))
        {
            $data->description = $request->description;

        }
        if(!is_null($request->sub_description))
        {
            $data->sub_description = $request->sub_description;

        }
        if(!is_null($request->title_color))
        {
            $data->title_color = $request->title_color;

        }
        if(!is_null($request->image))
        {
            File::delete('uploads/main/'.$data->image);
            $photo=$request->image;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/main/'.$name,100);
            $data->image=$name;
        }



        $data->save();
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }


}
