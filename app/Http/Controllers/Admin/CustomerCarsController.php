<?php

namespace App\Http\Controllers\Admin;
use App\Datatables\MaintenanceDataTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer_Car;

class CustomerCarsController extends Controller
{

    public function index()
    {
        return 'list';
    }

    public function maintenance($id)
    {
        $row = Customer_Car::with('maintenance','customer')->findOrFail($id);
        return view('dashboard.customer_cars.maintenances',compact('row'));
    }

    public function diagnosis($id)
    {
        $row = Customer_Car::with('diagnosis','customer')->findOrFail($id);
        return view('dashboard.customer_cars.diagnosis',compact('row'));
    }

    public function consumptions($id)
    {
        $row = Customer_Car::with('consumptions','customer')->findOrFail($id);
        return view('dashboard.customer_cars.consumptions',compact('row'));
    }
}
