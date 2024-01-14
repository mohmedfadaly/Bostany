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
use Modules\About\Entities\OurFeature;
use Modules\About\Entities\OurService;

class OurFeatureController extends Controller
{
    public function index()
    {
        $OurFeature = OurFeature::latest()->get();
    	return view('about::features.list',compact('OurFeature'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'   => 'required',
            'description'   => 'required',

        ]);

        $data = OurService::where('id',$id)->first();
        $data->title = $request->title;
        $data->description = $request->description;

        $data->save();
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

}
