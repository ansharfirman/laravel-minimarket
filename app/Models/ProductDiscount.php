<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
// Relations
use App\Models\Product;

class ProductDiscount extends Model implements Auditable {

    use SoftDeletes,
        \OwenIt\Auditing\Auditable;

    protected $dates = ['deleted_at'];
    protected $table = 'products_discounts';
    protected $fillable = [
        'product_id',
        'product_value',
        'date_start',
        'date_end',
    ];

    public function Product() {
        return $this->belongsTo(Product::class, "product_id");
    }

}
