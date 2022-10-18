<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserPaymentController extends Controller
{
    public function __construct()
    {
        $this->data["button"]="userpayment";
    }
    public function userpayment($id){
        $this->data["singledata"]=User::findOrFail($id);
        $userpayment=User::findOrFail($id);
        $this->data["button"]="userpayment";
        $this->data["userpayment"]=$userpayment->userpayments;
        return view("user.userpayment",$this->data);
    }
    public function userpaymentstore(REQUEST $request,$user_id){
        $request->validate([
            "amount"=>"required",
            "date"=>"required",
            "note"=>"string"
        ]);
        $addpayment=new Payment();
        $addpayment->user_id=$user_id;
        $addpayment->admin_id=Auth::id();
        $addpayment->amount=$request->amount;
        $addpayment->date=$request->date;
        $addpayment->note=$request->note;
        $addpayment->save();
        return back()->with("addpayment","Payment addet successfully");

    }
    public function userpaymentdelete(REQUEST $request,$user_id,$userpayment_id){
        Payment::findOrFail($userpayment_id)->delete();
        return back()->with("deletepayment","Payment deleted successfully");
    }
}
