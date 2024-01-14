<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\trait\account_trait;

use Illuminate\Http\Request;
use App\Models\Customer;
use Str;
use Carbon\Carbon;
use Session;
class DeleteAccountController extends Controller
{
    use account_trait;
    public function request_delete()
    {
        return view('account.request_delete_account');
    }

    public function send_email_sms(Request $request)
    {
        $this->validate($request,[
            'type'    => 'required|in:phone,email',
            'phone'   => $request->type === 'phone' ? 'required|max:10|min:10|exists:customers,phone' : 'nullable|max:10|min:10|exists:customers,phone',
            'email'   => $request->type === 'email' ? 'required|email|exists:customers,email' : 'nullable|max:10|min:10|exists:customers,email'
        ]);

        if($request->type === 'email' && !is_null($request->email))
        {
            $row = Customer::where('email', $request->email)->first();

            if(is_null($row->delete_account_access_token))
            {
                Session::flash('danger','هذة البيانات غير متوفرة لدينا !');
                return back();
            }

            if(!is_null($row->last_send))
            {
                $datetime_1 =  $row->last_send; 
                $datetime_2 = Carbon::now()->format('Y-m-d H:i:s');
                $diff = round((strtotime($datetime_2) - strtotime($datetime_1))/3600, 1);
                if($diff == 0)
                {
                    $msg = 'يجب الإنتظار ثلاث دقائق علي الاقل بين كل عملية !';
                    Session::flash('warning',$msg);
                    return back();
                }
            }

            $row->delete_account_access_token = Str::random(150);
            $row->last_send = Carbon::now()->format('Y-m-d H:i:s');
            $row->save();
            
            $url = url('account/confirm-delete-account?token='.$row->delete_account_access_token);
            $body = '<h3>تلقينا طلب بحذف حسابك لدينا ، لمتابعة وتأكيد حذف حسابك يُرجي الضغط علي الرابط التالي </h3><h3><a href='.$url.'>حذف الحساب</a></h3>';
            SendMail($row->email,'طلب حذف حسابك','طلب حذف حساب',$body,$cc = null,$bcc = null);
            Session::flash('success','تم إرسال رسالة علي بريدك الإلكتروني تحتوي علي خطوات حذف الحساب ');
            return back();
        }
    }

    public function confirm_delete()
    {  
        if(request()->token)
        {
            $row = Customer::where('delete_account_access_token',request()->token)->first();
            if($row)
            {
                return view('account.confirm_delete_account',compact('row'));
            }
        }

    }

    public function delete_account()
    {
        if(request()->id)
        {
            $row = Customer::where('id',request()->id)->first();
            if($row)
            {
                $this->_delete($row->uuid);
                return $this->api_response(200,__('api.delete_account'),null,null);
            }
        }
    }
    
}
