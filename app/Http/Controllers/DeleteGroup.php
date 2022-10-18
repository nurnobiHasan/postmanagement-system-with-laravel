<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class DeleteGroup extends Controller
{
    public function delategroup($id){
       Group::findOrFail($id)->delete();
       return redirect()->to("usergroup")->with("deletegroup","User group deleted successfully");

    }
}
