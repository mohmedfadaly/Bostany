<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faqs;
use App\Models\Faqs_Section;
use RealRashid\SweetAlert\Facades\Alert;


class FaqController extends Controller
{
    public function index()
    {
        $data = Faqs::latest()->get();
        $sections = Faqs_Section::latest()->get();
        return view('dashboard.faqs.list',compact('data','sections'));
    }

    public function store(Request $request)
    {
        $data = new Faqs;
        $data->title_ar        = $request->title_ar;
        $data->title_en        = $request->title_en;
        $data->content_ar      = $request->content_ar;
        $data->content_en      = $request->content_en;
        $data->faqs_section_id = $request->faqs_section_id;
        $data->save();
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    public function update(Request $request,$id)
    {
        $data = Faqs::findOrFail($id);
        $data->title_ar        = $request->title_ar;
        $data->title_en        = $request->title_en;
        $data->content_ar      = $request->content_ar;
        $data->content_en      = $request->content_en;
        $data->faqs_section_id = $request->faqs_section_id;
        $data->save();
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    public function delete($id)
    {
        $data = Faqs::findOrFail($id);
        $data->delete();
        Alert::success('عملية ناجحة','تم الحذف');
        return back();
    }
}
