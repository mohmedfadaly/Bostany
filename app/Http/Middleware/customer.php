<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Resources\CustomerResource;
use App\Models\Customer as Customer_Model;
use Symfony\Component\HttpFoundation\Response;

class customer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!is_null($request->header('Authorization')))
        {
            $token = $request->header('Authorization'); 
            $token = explode(' ',$token);
            if(count( $token) == 2)
            {
                $customer = Customer_Model::where('access_token',$token[1])->first();
                if($customer)
                {
                    auth()->guard('customer')->loginUsingId($customer->uuid); 
                    # $data = new CustomerResource($data);
                    return $next($request);
                }else{
                    return $this->api_response(401,null,['Unauthenticated'],null);
                }
            }else{
                return $this->api_response(401,null,['Unauthenticated'],null);
            }
        }else{
            return $this->api_response(401,null,['Unauthenticated'],null);
        }
    }

    public function api_response($http,$msg = null,$error = null,$data = null){
        return response() -> json([
            'status'=> $http == 200 ? 1 : 0,
            'http'  => $http,
            'msg'   => $msg ?? null,
            'error' => $error ?? null,
            'data'  => $data ?? null,
        ],$http);
    }
}


