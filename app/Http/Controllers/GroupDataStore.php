<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupDataStore extends Controller
{

    public function storedata(Request $request){
        $request->validate(
            [
                "name"=>"required"
            ]
        );
        $storedata=new Group();
        $storedata->title=$request->name;
        $storedata->save();
        return redirect()->to("usergroup")->with("creategroup","user group create successfully.");

    }
}
