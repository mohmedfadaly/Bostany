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
use Modules\Media\Entities\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
    	return view('media::news.list',compact('news'));
    }

    public function add()
    {
    	return view('media::news.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required',
            'sub_title'   => 'required',
            'content'   => 'required',
            'cover'     => 'required|mimes:jpeg,png,jpg,gif,svg',
            'image'        => 'required|mimes:jpeg,png,jpg,gif,svg',
            'avater'        => 'nullable|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = new News;
        $data->title = $request->title;
        $data->content = $request->content;
        $data->sub_title = $request->sub_title;

        # upload image
        $photo=$request->image;
        $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
        Image::make($photo)->save('uploads/news/'.$name,100);
        $data->image=$name;

        $photo=$request->cover;
        $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
        Image::make($photo)->save('uploads/news/cover/'.$name,100);
        $data->cover=$name;

        if(!is_null($request->avater))
        {
            $photo=$request->avater;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/news/avater/'.$name,100);
            $data->avater=$name;
        }

        $data->save();

        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    public function edit(Request $request, $id)
    {
        $data = News::findOrFail($id);
    	return view('media::news.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'   => 'required',
            'content'   => 'required',
            'image'        => 'nullable|mimes:jpeg,png,jpg,gif,svg',
            'cover'        => 'nullable|mimes:jpeg,png,jpg,gif,svg',
            'avater'        => 'nullable|mimes:jpeg,png,jpg,gif,svg',
            'sub_title'   => 'required',

        ]);

        $data = News::where('id',$id)->first();
        $data->title = $request->title;
        $data->content = $request->content;
        $data->sub_title = $request->sub_title;

        # upload image
        if(!is_null($request->image))
        {
            File::delete('uploads/news/'.$data->image);
            $photo=$request->image;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/news/'.$name,100);
            $data->image=$name;
        }
        if(!is_null($request->cover))
        {
            File::delete('uploads/news/cover/'.$data->image);
            $photo=$request->cover;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/news/cover/'.$name,100);
            $data->cover=$name;
        }

        if(!is_null($request->avater))
        {
            if($data->avatar != 'default.png')
            {
                File::delete('uploads/news/avater/'.$data->avatar);
            }
            $photo=$request->avater;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/news/avater/'.$name,100);
            $data->avater=$name;
        }

        $data->save();
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    # delete
    public function delete($id)
    {
        $data = News::where('id',$id)->first();
        File::delete('uploads/news/'.$data->image);
        File::delete('uploads/news/cover/'.$data->cover);
        if($data->avatar != 'default.png')
        {
            File::delete('uploads/news/avater/'.$data->avatar);
        }
        $data->delete();
        Alert::success('عملية ناجحة','تم الحذف');
        return back();
    }
}
