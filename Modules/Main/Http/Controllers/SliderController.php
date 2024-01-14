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
use Str;
class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
    	return view('main::sliders.list',compact('sliders'));
    }

    public function Store(Request $request)
    {
        $request->validate([
            'title'   => 'required',
            'image'   => 'required',
        ]);

        $data = new Slider;
        $data->title = $request->title;

        # upload image
        $photo=$request->image;
        $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
        Image::make($photo)->save('uploads/sliders/'.$name,100);
        $data->image=$name;
        $data->save();
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    public function Update(Request $request, $id)
    {
        $request->validate([
            'title'   => 'required',
        ]);

        $data = Slider::where('id',$id)->first();
        $data->title = $request->title;
        # upload image
        if(!is_null($request->image))
        {
            File::delete('uploads/sliders/'.$data->image);
            $photo=$request->image;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/sliders/'.$name,100);
            $data->image=$name;
        }
        $data->save();
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }


    # delete
    public function Delete($id)
    {
        $data = Slider::where('id',$id)->first();
        File::delete('uploads/sliders/'.$data->image);
        $data->delete();
        Alert::success('عملية ناجحة','تم الحذف');
        return back();
    }
}
