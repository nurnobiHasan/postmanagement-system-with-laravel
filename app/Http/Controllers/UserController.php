<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data["users"]=User::all();
        return view("user.user",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data["usergroup"]=Group::all();
        $this->data["singleusergroup"]=new Group();
        $this->data["singleuser"]=new User();
        return view("user.userform",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {


        $adduser=new User();
        $adduser->group_id=$request->group;
        $adduser->admin_id=Auth::id();
        $adduser->name=$request->name;
        $adduser->email=$request->email;
        $adduser->phone=$request->phone;
        $adduser->address=$request->address;
        $adduser->save();
        return redirect()->to("user")->with("messagecreate","User create successfully");


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data["singledata"]=User::find($id);
        $this->data["button"]="userinfo";
        return view("user.userinfo",$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data["usergroup"]=Group::all();
        $this->data["singleusergroup"]=Group::FindOrFail($id);
        $this->data["singleuser"]=User::findOrFail($id);
        return view("user.userform",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $requestdata=$request->all();
        $modeldata=User::findOrFail($id);
        $modeldata->group_id=$requestdata=$request["group"];
        $modeldata->name=$requestdata=$request["name"];
        $modeldata->email=$requestdata=$request["email"];
        $modeldata->phone=$requestdata=$request["phone"];
        $modeldata->address=$requestdata=$request["address"];
        $modeldata->save();
        return redirect()->to("user")->with("updateuser","User update successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->to("user")->with("userdelete","User delete successfully");
    }
}
