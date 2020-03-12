<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DataTable;
use OwenIt\Auditing\Contracts\Auditable;
// Relations
use App\Models\Product;
use App\Models\Measure;
use App\Models\Unit;

class ProductSize extends Model implements Auditable {

    use DataTable,
        \OwenIt\Auditing\Auditable;

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

    public function selectData(){
        return [
            'products.sku as product_sku',
            'products.name as product_name',
            'measures.name as measure_name',
            'units.name as unit_name',
            'products_sizes.product_value as product_value',
            'products_sizes.id as key_id'
        ];
    }

    public function dataTableQuery(){
        return self::where("products_sizes.id", "<>", 0)
            ->join("products", "products.id", "products_sizes.product_id")
            ->join("measures", "measures.id", "products_sizes.measure_id")
            ->join("units", "units.id", "products_sizes.unit_id")
        ;
    }

}
