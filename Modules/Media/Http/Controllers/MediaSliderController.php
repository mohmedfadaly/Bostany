<?php

namespace Modules\Media\Http\Controllers;

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
use Modules\Media\Entities\MediaSlider;
use Str;
class MediaSliderController extends Controller
{
    public function index()
    {
        $sliders = MediaSlider::latest()->get();
    	return view('media::sliders.list',compact('sliders'));
    }

    public function Store(Request $request)
    {
        $request->validate([
            'title'   => 'required',
            'image'   => 'required',
        ]);

        $data = new MediaSlider;
        $data->title = $request->title;

        # upload image
        $photo=$request->image;
        $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
        Image::make($photo)->save('uploads/media/sliders/'.$name,100);
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

        $data = MediaSlider::where('id',$id)->first();
        $data->title = $request->title;
        # upload image
        if(!is_null($request->image))
        {
            File::delete('uploads/media/sliders/'.$data->image);
            $photo=$request->image;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/media/sliders/'.$name,100);
            $data->image=$name;
        }
        $data->save();
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }


    # delete
    public function Delete($id)
    {
        $data = MediaSlider::where('id',$id)->first();
        File::delete('uploads/media/sliders/'.$data->image);
        $data->delete();
        Alert::success('عملية ناجحة','تم الحذف');
        return back();
    }
}
