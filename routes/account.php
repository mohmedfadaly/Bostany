<?php
use App\Http\Controllers\Account\DeleteAccountController;
# ************************ delete account *********************** #
Route::get('request-delete-account', [DeleteAccountController::class,'request_delete']);
Route::post('send-email-sms', [DeleteAccountController::class,'send_email_sms'])->name('account.send_email_sms');
Route::get('confirm-delete-account', [DeleteAccountController::class,'confirm_delete']);
Route::get('delete-account', [DeleteAccountController::class,'delete_account']);


