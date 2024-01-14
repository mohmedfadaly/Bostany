<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Datatables\ContactsDataTable;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(ContactsDataTable $dataTable)
    {
        // $rows = Contact::latest()->get();
        // return view('dashboard.contacts.list',compact('rows'));
        return $dataTable->render('dashboard.contacts.list');
    }

    public function delete($id)
    {
        $row = Contact::findOrFail($id);
        $row->delete();
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }
}
