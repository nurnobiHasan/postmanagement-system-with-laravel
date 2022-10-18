<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserReceiptController extends Controller
{
    public function __construct(){
            $this->data["button"]="userperces";
    }
    public function userreceipt($id){
        $this->data["singledata"]=User::findOrFail($id);
        $user=User::findOrFail($id);
        $this->data["userreceipt"]=$user->userreceipts;
        $this->data["button"]="userreceipt";

        return view("user.userreceipt",$this->data);
    }
    public function userreceiptstore(REQUEST $request,$user_id,$invoice_id=null){

        $request->validate([
            "amount"=>"required",
            "date"=>"required",
            "note"=>"string"

        ]);

        $addreceipt=new Receipt();
        $addreceipt->user_id=$user_id;
        if($invoice_id){
            $addreceipt->sale_invoice_id=$invoice_id;
        }
        $addreceipt->admin_id=Auth::id();
        $addreceipt->amount=$request->amount;
        $addreceipt->receipt_date=$request->date;
        $addreceipt->note=$request->note;
        $addreceipt->save();
        if($invoice_id){
            return back()->with("addreceipt","receipt addet successfully");
        }else{

            return back()->with("addreceipt","receipt addet successfully");


        }

    }
    public function userreceiptdelete(REQUEST $request,$user_id,$userreceipt_id){
        Receipt::findOrFail($userreceipt_id)->delete();
        return back()->with("deletereceipt","Receipt deleted successfully");
    }
}
