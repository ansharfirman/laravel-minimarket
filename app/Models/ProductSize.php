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
use App\Models\Measure;
use App\Models\Unit;

class ProductSize extends Model implements Auditable {

    use SoftDeletes,
        \OwenIt\Auditing\Auditable;

    protected $dates = ['deleted_at'];
    protected $table = 'products_sizes';
    protected $fillable = [
        'product_id',
        'measure_id',
        'unit_id',
        'product_value',
        'description'
    ];

    public function Product() {
        return $this->belongsTo(Product::class, "product_id");
    }

    public function Measure() {
        return $this->belongsTo(Measure::class, "measure_id");
    }
    
    public function Unit() {
        return $this->belongsTo(Unit::class, "unit_id");
    }

}
