<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view("login.loginpage");
    }
    public function checklogin(REQUEST $request){
        $data=$request->only("email","password");
        if(Auth::attempt($data)){
            return redirect()->intended("mainpage");
        }else{
            return redirect()->to("loginroute")->with("loginmessage","email and password Don't match");
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
}
