<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $guarded=["id"];
    public function group(){
        return $this->belongsTo(Group::class,"group_id","id");
    }
    public function usersales(){
        return $this->hasMany(SaleInvoice::class,"user_id","id");
    }
    public function userpurcas(){
        return $this->hasMany(PurchasInvoice::class,"user_id","id");
    }
    public function userpayments(){
        return $this->hasMany(Payment::class,"user_id","id");
    }
    public function userreceipts(){
        return $this->hasMany(Receipt::class,"user_id","id");
    }
}
