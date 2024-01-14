<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use App\Models\Maintenance_Center;
use App\Models\City;
use File;

class MaintenanceCentersController extends Controller
{
    public function index()
    {
        $data = Maintenance_Center::latest()->get();
        return view('dashboard.maintenance_center.list',compact('data'));
    }

    public function add()
    {
        $cities = City::get();
        return view('dashboard.maintenance_center.add',compact('cities'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name_ar'   => 'required|max:225',
            'name_en'   => 'required|max:225',
            'city_id'   => 'required|exists:cities,id',
            'phones'    => 'required|max:500',
            'emails'    => 'nullable|max:500',
            'lat'       => 'required|max:190',
            'lng'       => 'required|max:190',
            'address'   => 'required|max:500',
        ]);

        $row = new Maintenance_Center;
        $row->name_ar = $request->name_ar;
        $row->name_en = $request->name_en;
        $row->city_id = $request->city_id;
        $row->phones  = $request->phones;
        $row->emails  = $request->emails;
        $row->lat     = $request->lat;
        $row->lng     = $request->lng;
        $row->address = $request->address;

        if(!is_null($request->logo))
        {
            $photo=$request->logo;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('uploads/maintenance_centers/'),$name);
            $row->logo=$name;
        }

        $dates = [];
        for($i=1;$i<=7;$i++)
        {
            $day  = $request['day'.$i];
            $time = $request['time'.$i];
            if(!is_null($day) && !is_null($time))
            {
                $day = ['day' => implode(' ',$day),'time' => $time];
                array_push($dates,$day);
            }
        }

        $row->dates = json_encode($dates);
        $row->save();
        Alert::success('عملية ناجحة','تم الحفظ');
        return redirect()->route('maintenance_center.list');

    }

    public function edit($id)
    {
        $cities = City::get();
        $row    = Maintenance_Center::findOrfail($id);
        $dates  = json_decode($row->dates);
        return view('dashboard.maintenance_center.edit',compact('cities','row','dates'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name_ar'   => 'required|max:225',
            'name_en'   => 'required|max:225',
            'city_id'   => 'required|exists:cities,id',
            'phones'    => 'required|max:500',
            'emails'    => 'required|max:500',
            'lat'       => 'required|max:190',
            'lng'       => 'required|max:190',
            'address'   => 'required|max:500',
        ]);
        // return $request->All();
        $row = Maintenance_Center::findOrFail($id);
        $row->name_ar = $request->name_ar;
        $row->name_en = $request->name_en;
        $row->city_id = $request->city_id;
        $row->phones  = $request->phones;
        $row->emails  = $request->emails;
        $row->lat     = $request->lat;
        $row->lng     = $request->lng;
        $row->address = $request->address;

        if(!is_null($request->logo))
        {
            if($row->logo != 'default.png')
            {
                File::delete('uploads/maintenance_centers/'.$row->logo);
            }
            $photo=$request->logo;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('uploads/maintenance_centers/'),$name);
            $row->logo=$name;
        }

        $dates = [];
        for($i=1;$i<=7;$i++)
        {
            $day  = $request['day'.$i];
            $time = $request['time'.$i];
            if(!is_null($day) && !is_null($time))
            {
                $day = ['day' => implode(' ',$day),'time' => $time];
                array_push($dates,$day);
            }
        }

        $row->dates = json_encode($dates);
        $row->save();
        Alert::success('عملية ناجحة','تم الحفظ');
        return redirect()->route('maintenance_center.list');

    }

    public function delete($id)
    {
        $data = Maintenance_Center::where('id',$id)->first();
        File::delete('uploads/maintenance_centers/'.$data->logo);
        $data->delete();
        return back();
    }
}
