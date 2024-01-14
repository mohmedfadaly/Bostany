<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faqs_Section;
use RealRashid\SweetAlert\Facades\Alert;

class FaqSectionsController extends Controller
{
    public function index()
    {
        $data = Faqs_Section::latest()->get();
        return view('dashboard.faqs_sections.list',compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Faqs_Section;
        $data->title_ar        = $request->title_ar;
        $data->title_en        = $request->title_en;
        $data->save();
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    public function update(Request $request,$id)
    {
        $data = Faqs_Section::findOrFail($id);
        $data->title_ar        = $request->title_ar;
        $data->title_en        = $request->title_en;
        $data->save();
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    public function delete($id)
    {
        $data = Faqs_Section::findOrFail($id);
        $data->delete();
        Alert::success('عملية ناجحة','تم الحذف');
        return back();
    }
}
