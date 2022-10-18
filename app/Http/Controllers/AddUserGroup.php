<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddUserGroup extends Controller
{
    public function addusergroup(){
        return view("group.addusergroup");
    }
}
