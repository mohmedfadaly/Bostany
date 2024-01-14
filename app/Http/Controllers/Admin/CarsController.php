<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Car;
use App\Models\Car_Model;
use App\Models\Malfunction;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class CarsController extends Controller
{
    public function index()
    {
        $data = Car::latest()->get();
        return view('dashboard.cars.list',compact('data'));
    }
    public function edit($id)
    {
        $data = Car::where('maker_code',$id)->first();
        return view('dashboard.cars.edit',compact('data'));
    }

    public function delete($id)
    {
        $data = Car::where('maker_code',$id)->first();
        if($data->logo !== 'default.png')
        {
            File::delete('uploads/cars/logo/'.$data->logo);
        }
        $data->delete();
        return back();
    }

    public function update(Request $request,$id)
    {
        // return $request->All();
        $this->validate($request,[
            'logo'           => 'nullable|image',
            'maker_code'     => 'required|max:191|min:1|unique:cars,maker_code,'.$id,
            'maker_name'     => 'required|max:191|min:1',
            'new_model_name' => 'nullable|max:191|min:1',
            'new_model_code' => 'nullable|max:191|min:1|unique:car_models,model_code'
        ]);

        $data = Car::where('maker_code',$request->maker_code)->first();
        $data->maker_name = $request->maker_name;
        $data->maker_code = $request->maker_code;

        if(!is_null($request->logo))
        {
            if($data->logo !== 'default.png')
            {
                File::delete('uploads/cars/logo/'.$data->logo);
            }
            $photo=$request->logo;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('uploads/cars/logo'),$name);
            $data->logo=$name;
        }

        $data->save();

        if($request->new_model_name)
        {
            foreach($request->new_model_name as $key => $name)
            {
                $model = new Car_Model;
                $model->model_name = $name;
                $model->model_code = $request->new_model_code[$key];
                $model->maker_code = $data->maker_code;
                $model->save();
            }
        }
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    public function add()
    {
        return view('dashboard.cars.add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'logo'           => 'nullable|image',
            'maker_code'     => 'required|max:191|min:1|unique:cars,maker_code',
            'maker_name'     => 'required|max:191|min:1',
            'new_model_name' => 'nullable|max:191|min:1',
            'new_model_code' => 'nullable|max:191|min:1|unique:car_models,model_code',
            'new_model_code.*' => 'unique:car_models,model_code'
        ]);

        $data = new Car;
        $data->maker_name = $request->maker_name;
        $data->maker_code = $request->maker_code;

        if(!is_null($request->logo))
        {
            $photo=$request->logo;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('uploads/cars/logo'),$name);
            $data->logo=$name;
        }

        $data->save();

        if($request->new_model_name)
        {
            foreach($request->new_model_name as $key => $name)
            {
                $model = new Car_Model;
                $model->model_name = $name;
                $model->model_code = $request->new_model_code[$key];
                $model->maker_code = $data->maker_code;
                $model->save();
            }
        }
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    public function update_model($id,$model_name,$model_code)
    {
        $model = Car_Model::findOrFail($id);
        $model->model_name = $model_name;
        $model->model_code = $model_code;
        $model->save();
        return response()->json([
            'status'=>'1'
        ]);
    }

    public function delete_model($id)
    {
        $model = Car_Model::findOrFail($id);
        $model->delete();
        return response()->json([
            'status'=>'1'
        ]);
    }

    public function import()
    {
        // return Malfunction::count();
        // $fil = getcwd().'/codes.xlsx';
        // $theArray = Excel::toArray([], $fil);
        // // return count($theArray[0]);

        // // return $theArray[0];
        // foreach($theArray[0] as $key =>$value)
        // {
        //     // return $value[2];
        //     $exist = Malfunction::where('code',$value[0])->first();
        //     if(!$exist)
        //     {
        //         $model = new Malfunction;
        //         $model->code    = $value[0];
        //         $model->desc_en = $value[1];
        //         $model->desc_ar = $value[2];
        //         $model->save();
        //     }
        // }
        // echo 'done';
    }
}
