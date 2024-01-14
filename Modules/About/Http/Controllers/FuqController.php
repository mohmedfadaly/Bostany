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
use Modules\About\Entities\Files;
use Modules\About\Entities\Fuq;
use Modules\About\Entities\OurJourney;
use Modules\About\Entities\Team;

class FuqController extends Controller
{
    public function index()
    {
        $Fuq = Fuq::latest()->get();
    	return view('about::fuq.list',compact('Fuq'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required',
            'description'        => 'required',

        ]);

        $data = new Fuq;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();

        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'   => 'required',
            'description'        => 'nullable',
        ]);

        $data = Fuq::where('id',$id)->first();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }


    # delete
    public function delete($id)
    {
        $data = Fuq::where('id',$id)->first();
        $data->delete();
        Alert::success('عملية ناجحة','تم الحذف');
        return back();
    }
}
