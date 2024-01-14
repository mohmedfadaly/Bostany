<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Clinic;
use App\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Session;
use Image;
use File;
use View;
use Hash;

class UsersController extends Controller
{

    public function __construct()
    {
        View::share([
            'users'=> User::get(),
            'roles'=> Role::get(),
        ]);
    }

    # index
    public function Index()
    {
        $data = User::latest()->get();
        return view('dashboard.users.list',compact('data'));
    }


    # add
    public function add()
    {

        return view('dashboard.users.add');
    }

    # store
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'      => 'required|max:191|min:10',
            'password'  => 'required|min:6',
            'role'      => 'required',
            'email'     => 'required|unique:users,email,',
            'phone'     => 'required|unique:users,phone,',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
        ]);



        $data = new User;
        $data->name     = $request->name;
        $data->email    = $request->email;
        $data->phone    = $request->phone;
        $data->role     = $request->role;
        $data->password = bcrypt($request->password);

         # upload image
        $photo=$request->image;
        $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
        Image::make($photo)->save('uploads/users/'.$name,100);
        $data->avatar=$name;
        $data->save();

        Alert::success('عملية ناجحة','تم الحفظ');
        return redirect()->route('users.list');
    }

    # edit
    public function edit($id)
    {
        $data = User::findOrFail($id);
    	return view('dashboard.users.edit',compact('data'));
    }

    # update
    public function update(Request $request)
    {
        $valisd = $this->validate($request,[
            'name'      => 'required|max:191|min:10',
            'password'  => 'nullable|min:6',
            'role'      => 'required',
            'email'     => 'required|unique:users,email,'.$request->id,
            'phone'     => 'required|unique:users,phone,'.$request->id,
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
        ]);



        $data = User::where('id',$request->id)->first();
        $data->name     = $request->name;
        $data->email    = $request->email;
        $data->phone    = $request->phone;
        $data->role     = $request->role;
        # password
        if(!is_null($request->password))
        {
            $data->password = bcrypt($request->password);
        }
        # upload image
        if(!is_null($request->image))
        {
            if($data->avatar != 'default.png')
            {
                File::delete('uploads/users/'.$data->avatar);
            }

            $photo=$request->image;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/users/'.$name,100);
            $data->avatar=$name;
        }
        $data->save();



        Alert::success('عملية ناجحة','تم الحفظ');
        return redirect()->route('users.list');
    }


    public function delete($id)
    {
        $data = User::where('id',$id)->first();
        if (auth()->user()->id == $id) {
            Alert::error(' هناك خطأ','لم يتم الحذف');
            return back();
        }
        if($data->avatar != 'default.png')
        {
            File::delete('uploads/users/'.$data->avatar);
        }

        $data->delete();
        Alert::success('عملية ناجحة','تم الحذف');
        return back();
    }
}
