<?php

namespace App\Http\Controllers;

use App\Models\SaleInvoice;
use App\Models\User;
use Illuminate\Http\Request;

class UserInfo extends Controller
{

    public function __construct()
    {
        $this->data["button"]="userinfo";

    }
    public function userinformation($id){
        $this->data["singledata"]=User::findOrFail($id);
        $this->data["button"]="userinfo";
        return view("user.userinfo",$this->data);
    }

}
