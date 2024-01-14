<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\Social;
use File;

class SocialsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'   => 'required',
            'icon'   => 'required|image',
            'link'   => 'required',
        ]);

        $row = new Social;
        $row->name = $request->name;
        $row->link = $request->link;

        $photo=$request->icon;
        $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
        $photo->move(public_path('uploads/socials'),$name);
        $row->icon=$name;
        
        $row->save();

        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'edit_name'   => 'required',
            'edit_icon'   => 'nullable|image',
            'edit_link'   => 'required',
        ]);

        $row = Social::findOrFail($request->edit_social_id);
        $row->name = $request->edit_name;
        $row->link = $request->edit_link;

        if(!is_null($request->edit_icon))
        {
            File::delete('uploads/socials'.$row->icon);
            $photo=$request->edit_icon;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('uploads/socials'),$name);
            $row->icon=$name;
        }

        $row->save();

        Alert::success('عملية ناجحة','تم التحديث');
        return back();
    }

    public function delete($id)
    {
        $row = Social::where('id',$id)->first();
        File::delete('uploads/socials'.$row->icon);
        $row->delete();
        Alert::success('عملية ناجحة','تم الحذف');
        return back();
    }
}
