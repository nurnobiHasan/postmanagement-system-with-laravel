<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleInvoice extends Model
{
    use HasFactory;
    protected $guarded=["id"];
    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }
    public function admin(){
        return $this->belongsTo(Admin::class,"admin_id","id");
    }
    public function saleinvoiceitems(){
        return $this->hasMany(SaleItem::class,"sale_invoice_id","id");
    }


}
