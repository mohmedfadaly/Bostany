<?php

namespace App\Http\Controllers\admin;
use App\Exports\MalfunctionsExport;
use App\Datatables\MalfunctionsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Malfunction;
use RealRashid\SweetAlert\Facades\Alert;
use Excel;
class MalfunctionsController extends Controller
{
    public function index(MalfunctionsDataTable $dataTable)
    {
        // $data = Malfunction::take(50)->latest()->get();
        // return view('dashboard.malfunctions.list',compact('data'));
        return $dataTable->render('dashboard.malfunctions.list');
    }

    public function store(Request $request)
    {
        $data = new Malfunction;
        $data->code                = $request->code;
        $data->desc_ar             = $request->desc_ar;
        $data->desc_en             = $request->desc_en;
        $data->potential_causes_ar = $request->potential_causes_ar;
        $data->potential_causes_en = $request->potential_causes_en;
        $data->symptoms_ar         = $request->symptoms_ar;
        $data->symptoms_en         = $request->symptoms_en;
        $data->solution_ar         = $request->solution_ar;
        $data->solution_en         = $request->solution_en;
        $data->save();
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    public function update(Request $request,$id)
    {
        $data = Malfunction::findOrFail($id);
        $data->code                = $request->code;
        $data->desc_ar             = $request->desc_ar;
        $data->desc_en             = $request->desc_en;
        $data->potential_causes_ar = $request->potential_causes_ar;
        $data->potential_causes_en = $request->potential_causes_en;
        $data->symptoms_ar         = $request->symptoms_ar;
        $data->symptoms_en         = $request->symptoms_en;
        $data->solution_ar         = $request->solution_ar;
        $data->solution_en         = $request->solution_en;
        $data->save();
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    public function delete($id)
    {
        $data = Malfunction::findOrFail($id);
        $data->delete();
        Alert::success('عملية ناجحة','تم الحذف');
        return back();
    }

    public function export()
    {
        // return (new MalfunctionsExport)->download('malfunctions.xlsx');
        return Excel::download(new MalfunctionsExport, 'malfunctions.xlsx');
    }
}
