<?php

namespace App\Http\Controllers\Admin;
// use App\DataTables\CustomersDataTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\City;

class CustomersController extends Controller
{
    public function index()
    {
        $data = Customer::take(50)->latest()->get();
        return view('dashboard.customers.list',compact('data'));
        // return $dataTable->render('dashboard.customers.list');
    }

    public function edit($id)
    {
        $row = Customer::where('id',$id)->first();
        $cities = City::get();
        return view('dashboard.customers.edit',compact('row','cities'));
        // return $dataTable->render('dashboard.customers.list');
    }
    
}
