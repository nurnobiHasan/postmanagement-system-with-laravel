<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SaleInvoice;
use App\Models\SaleItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSaleController extends Controller
{
    public function __construct()
    {
        $this->data["button"]="usersale";
    }
    public function usersale($id){

        $this->data["singledata"]=User::find($id);
        $user=User::find($id);
        $this->data["usersale"]=$user->usersales;
        $this->data["button"]="usersale";
        return view("user.usersales",$this->data);


    }
    public function usersalestore(REQUEST $request,$user_id=null,$sale_invoice_id=null){
        $request->validate([
            "date"=>"required",
        ]);

        $storeusersaledata=new SaleInvoice();
        $storeusersaledata->user_id=$user_id;
        $storeusersaledata->admin_id=Auth::id();
        $storeusersaledata->challan_no=$request->challannumber;
        $storeusersaledata->date=$request->date;
        $storeusersaledata->note=$request->note;
        $storeusersaledata->save();
        return back()->with("usersale","User Sale Created Successfully!");

    }
    public function usersaleviewinvoice($user_id,$saleinvoice_id){
        $this->data["singledata"]=User::findOrFail($user_id);
        $this->data["singleuserinvoice"]=SaleInvoice::findOrFail($saleinvoice_id);
        $this->data["allproduct"]=Product::all();
        return view("user.userinvoiceview",$this->data);

    }
    public function usersalecreateinvoice(REQUEST $request,$user_id,$invoice_id){
        $request->validate(
            [
                "product"=>"required",
                "prize"=>"required|numeric",
                "quantity"=>"required",
                "totalamount"=>"required"
            ]
        );

        $createproduct=new SaleItem();
        $createproduct->product_id=$request->product;
        $createproduct->sale_invoice_id=$invoice_id;
        $createproduct->prize=$request->prize;
        $createproduct->quantity=$request->quantity;
        $createproduct->total=$request->totalamount;
        $createproduct->save();
        return back();

    }
    public function usersaledeleteinvoice(REQUEST $request,$user_id,$sale_invoice_id,$sale_invoice_item_id){
        SaleItem::findOrFail($sale_invoice_item_id)->delete();
        return back()->with("prodductitem","product item delete successfully");
    }
}
