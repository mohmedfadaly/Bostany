<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;
use App\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    # index
    public function Index()
    {
        $data = Role::latest()->get();
        return view('dashboard.roles.list',compact('data'));
    }

    # add
    public function Add()
    {
       return view('dashboard.roles.add');
    }

    # store role
    public function store(Request $request)
    {
        $this->validate($request,[
            'role' =>'required',
        ]);

        $role       = new Role;
        $role->name = $request->role;

        if(count($request->ids) > 0)
        {
            $ids    = json_encode($request->ids);
           $role->routes = $ids;
        }

        $role->save();

    }

    # edit role
    public function EditRole($id)
    {
        $role = Role::where('id',$id)->first();
        return view('dashboard.roles.edit',compact('role'));
    }

    # update role
    public function Update(Request $request)
    {
        $this->validate($request,[
            'role' =>'required',
            'id'   =>'required'
        ]);

        $role       = Role::where('id',$request->id)->first();
        $role->name = $request->role;
        if(count($request->ids) > 0)
        {
            $ids    = json_encode($request->ids);
           $role->routes = $ids;
        }
        $role->save();

    }

    # delete role
    public function Delete(Request $request)
    {
        $roles = Role::count();

        # check if current user has this role
        if(Auth::user()->role == $request->id)
        {
            Alert::warning('warning','لا يمكن حذف الصلاحية أثناء استخدامها في عملية الدخول !');
            return back();
        }

        # check roles count
        if($roles  == 1)
        {
            Alert::warning('warning','لا يمكن حذف أخر صلاحية !');
            return back();
        }

        $role = Role::where('id',$request->id)->first();
        $role->delete();
        Alert::success('success','تم الحذف بنجاح');
        return back();
    }
}
