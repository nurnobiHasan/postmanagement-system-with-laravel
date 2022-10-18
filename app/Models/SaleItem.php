<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;
    protected $guardedd="id";
    public function saleinvoice(){
        return $this->belongsTo(SaleInvoice::class,"sale_invoice_id","id");
    }
    public function product(){
        return $this->belongsTo(Product::class,"product_id","id");
    }

}
