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
use Modules\About\Entities\Team;

class TeamController extends Controller
{
    public function index()
    {
        $team = Team::latest()->get();
    	return view('about::team.list',compact('team'));
    }

    public function add()
    {
    	return view('about::team.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required',
            'content'   => 'required',
            'specialty'   => 'required',
            'image'        => 'required|mimes:jpeg,png,jpg,gif,svg',
            'link_linkedin'   => 'nullable',
            'link_facebook'   => 'nullable',
            'link_twitter'   => 'nullable',
        ]);

        $data = new Team;
        $data->title = $request->title;
        $data->content = $request->content;
        $data->specialty = $request->specialty;
        $data->link_linkedin = $request->link_linkedin;
        $data->link_facebook = $request->link_facebook;
        $data->link_twitter = $request->link_twitter;

        # upload image
        $photo=$request->image;
        $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
        Image::make($photo)->save('uploads/team/'.$name,100);
        $data->image=$name;
        $data->save();

        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    public function edit(Request $request, $id)
    {
        $data = Team::findOrFail($id);
    	return view('about::team.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'   => 'required',
            'content'   => 'required',
            'specialty'   => 'required',
            'link_linkedin'   => 'nullable',
            'link_facebook'   => 'nullable',
            'link_twitter'   => 'nullable',
            'image'        => 'nullable|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = Team::where('id',$id)->first();
        $data->title = $request->title;
        $data->content = $request->content;
        $data->specialty = $request->specialty;
        $data->link_linkedin = $request->link_linkedin;
        $data->link_facebook = $request->link_facebook;
        $data->link_twitter = $request->link_twitter;

        # upload image
        if(!is_null($request->image))
        {
            File::delete('uploads/team/'.$data->image);
            $photo=$request->image;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/team/'.$name,100);
            $data->image=$name;
        }

        $data->save();
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }


    # delete
    public function delete($id)
    {
        $data = Team::where('id',$id)->first();
        File::delete('uploads/team/'.$data->image);
        $data->delete();
        Alert::success('عملية ناجحة','تم الحذف');
        return back();
    }
}
