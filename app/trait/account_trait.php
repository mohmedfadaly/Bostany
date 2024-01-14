<?php

namespace App\trait;

use App\Models\Customer;
use App\Models\Customer_Diagnosis_History;
use App\Models\Customer_Car;
use App\Models\Consumption;
use App\Models\Maintenance;
use App\Models\Update_Data;

trait account_trait {
    public function _delete($uuid) {
        $diagnosis = Customer_Diagnosis_History::where([
            ['customer_uuid',$uuid],
            ['is_deleted','0']
        ])->get();

        $cars = Customer_Car::where([
            ['customer_uuid',$uuid],
            ['is_deleted','0']
        ])->get();

        $consumptions = Consumption::where([
            ['customer_uuid',$uuid],
            ['is_deleted','0']
        ])->get();

        $maintenances = Maintenance::where([
            ['customer_uuid',$uuid],
            ['is_deleted','0']
        ])->get();

        Update_Data::where('customer_uuid',$uuid)->delete();

        foreach($diagnosis as $diagnosi)
        {
            $diagnosi->is_deleted = '1';
            $diagnosi->save();
        }

        foreach($cars as $car)
        {
            $car->is_deleted = '1';
            $car->save();
        }

        foreach($consumptions as $consumption)
        {
            $consumption->is_deleted = '1';
            $consumption->save();
        }

        foreach($maintenances as $maintenance)
        {
            $maintenance->is_deleted = '1';
            $maintenance->save();
        }

        $row = Customer::where('uuid',$uuid)->first();
        $row->name         = 'your name';
        $row->avatar       = 'default.png';
        $row->fb_token     = null;
        $row->access_token = null;
        $row->delete_account_access_token = null;
        $row->last_send = null;
        $row->city_id      = null;
        $row->code         = null;
        $row->save();
        return true;
    }
}