<?php

namespace Modules\Main\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use View;
use Session;
use Image;
use File;
use Auth;
use Modules\Main\Entities\OurValue;
use Str;
class OurValueController extends Controller
{
    public function index()
    {
        $our_values = OurValue::latest()->get();
    	return view('main::our_values.list',compact('our_values'));
    }

    public function Store(Request $request)
    {
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);

        $data = new OurValue;
        $data->title = $request->title;
        $data->content = $request->content;
        $data->save();
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    public function Update(Request $request, $id)
    {
        $request->validate([
            'title'   => 'required',
        ]);

        $data = OurValue::where('id',$id)->first();
        $data->title = $request->title;
        $data->content = $request->content;
        $data->save();
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }


    # delete
    public function Delete($id)
    {
        $data = OurValue::where('id',$id)->first();
        $data->delete();
        Alert::success('عملية ناجحة','تم الحذف');
        return back();
    }
}
