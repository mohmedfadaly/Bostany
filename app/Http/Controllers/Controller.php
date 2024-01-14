<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function api_response($http,$msg = null,$error = null,$data = null){

        if($msg)
        {
            if(!is_array($msg))
            {
                $msg = [$msg];
            }
        }

        if($error)
        {
            if(!is_array($error))
            {
                $error = [$error];
            }
        }

        return response() -> json([
            'status'=> $http == 200 ? 1 : 0,
            'http'  => $http,
            'msg'   => $msg ?? null,
            'error' => $error ?? null,
            'data'  => $data ?? null,
        ],$http);
    }

}
