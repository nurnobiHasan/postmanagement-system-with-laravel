<?php

use App\Models\Admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AddAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admindata=[
            "name"=>"Md Nurnobi Islam",
            "email"=>"nurnobi100050@gmail.com",
            "password"=>Hash::make("1234"),
            "address"=>"tongi stationroad",
            "phone"=>"01753803877"
        ];
        DB::table("admins")->insert($admindata);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
