<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    public function usergroup(){
        $this->data["usergroup"]=Group::all();
        return view("group.group",$this->data);

    }
}
