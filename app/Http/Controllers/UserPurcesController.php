<?php

namespace App\Http\Controllers;

use App\Models\PurchasInvoice;
use App\Models\User;
use Illuminate\Http\Request;

class UserPurcesController extends Controller
{
    public function __construct()
    {
        $this->data["button"]="userperces";
    }
    public function userpurces($id){
        $this->data["singledata"]=User::findOrFail($id);
        $user=User::findOrFail($id);
        $this->data["userpurches"]=$user->userpurcas;
        $this->data["button"]="userpurces";
        return view("user.userpurces",$this->data);



    }
}
