<?php

use App\Http\Controllers\AddUserGroup;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Category;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeleteGroup;
use App\Http\Controllers\GroupDataStore;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\UserInfo;
use App\Http\Controllers\UserPaymentController;
use App\Http\Controllers\UserPurcesController;
use App\Http\Controllers\UserReceiptController;
use App\Http\Controllers\UserSaleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


route::middleware("auth")->group(function(){
    Route::get('/', function () {
        return view('layout/mainpage');
    });
    route::get("mainpage",function(){
        return view('layout/mainpage');
    });
    Route::get("layout",function(){
        return view("layout.layout");
    });

    //group route
    route::get("usergroup",[UserGroupController::class,  "usergroup"]);
    route::get("addgroup",[AddUserGroup::class,          "addusergroup"]);
    route::post("groupdatastore",[GroupDataStore::class, "storedata"]);
    route::delete("deletegroup/{id}",[DeleteGroup::class,"delategroup"]);
    //User Route
    route::resource("user",UserController::class);
    route::get("userinfo/{id}",[UserInfo::class,                 "userinformation"]);
    route::get("usersale/{id}",[UserSaleController::class,       "usersale"]);
    route::get("userpurces/{id}",[UserPurcesController::class,   "userpurces"]);
    route::get("userpayment/{id}",[UserPaymentController::class, "userpayment"])->name("userpayment");
    route::get("userreceipt/{id}",[UserReceiptController::class, "userreceipt"]);
    //User Payment Route
    route::post("userpayment/store/{id}",[UserPaymentController::class,             "userpaymentstore"]);
    route::delete("userpayment/delete/{id}/{user_id}",[UserPaymentController::class,"userpaymentdelete"]);
    //User Receipt Route
    route::post("userreceipt/store/{id}/{invoice_id?}",[UserReceiptController::class,                      "userreceiptstore"]);
    route::delete("userreceiptp/delete/{receipt_id}/{user_id}",[UserReceiptController::class,"userreceiptdelete"]);

    //User Sale Route
    route::post("usersale/store/{user_id}",[UserSaleController::class,       "usersalestore"]);
    route::get("usersaleinvoice/view/{user_id}/{sale_invoice_id}",[UserSaleController::class,       "usersaleviewinvoice"])->name("view");
    route::post("usersaleinvoice/create/{user_id}/{sale_invoice_id}",[UserSaleController::class,       "usersalecreateinvoice"]);
    route::delete("usersaleinvoice/delete/{user_id}/{sale_invoice_id}/{invoice_item_id}",[UserSaleController::class,       "usersaledeleteinvoice"]);

    //Category Route
    route::resource("category",CategoryController::class);
    //Product Route
    route::resource("product",ProductController::Class);
    route::get("logout",[AuthController::class,"logout"]);


});

//Route login
route::get("loginroute",[AuthController::class,"login"])->name("login");
route::post("check",[AuthController::class,    "checklogin"]);



