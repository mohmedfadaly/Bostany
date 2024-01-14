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
use Modules\About\Entities\OtherService;
use Modules\About\Entities\OurJourney;
use Modules\About\Entities\Team;

class OtherServiceController extends Controller
{
    public function index()
    {
        $OtherService = OtherService::latest()->get();
    	return view('about::other_services.list',compact('OtherService'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required',

        ]);

        $data = new Fuq;
        $data->title = $request->title;
        $data->save();

        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'   => 'required',
        ]);

        $data = Fuq::where('id',$id)->first();
        $data->title = $request->title;
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
