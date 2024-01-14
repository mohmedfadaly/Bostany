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
use Modules\Media\Entities\Gallary;
use Modules\Media\Entities\News;

class GallaryController extends Controller
{
    public function index()
    {
        $gallary = Gallary::latest()->get();
    	return view('media::gallary.list',compact('gallary'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'galary.*'     => 'nullable|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if(!is_null($request->galary))
        {
            foreach($request->galary as $ga)
            {
                $image = new Gallary();
                $photo=$ga;
                $name = date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
                Image::make($photo)->save('uploads/gallary/'.$name);
                $image->image  = $name;
                $image->save();
            }
        }
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    public function DeleteImage(Request $request)
    {

        $image = Gallary::where('id',$request->id)->first();

        File::delete('uploads/gallary/'.$image->image);

        $image->delete();
        Alert::success('عملية ناجحة','تم الحذف');
        return back();
    }
}
