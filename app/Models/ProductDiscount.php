<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Traits\DataTable;
// Relations
use App\Models\Product;

class ProductDiscount extends Model implements Auditable {

    use  DataTable,
        \OwenIt\Auditing\Auditable;

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

    public function selectData(){
        return [
            'products.sku as product_sku',
            'products.name as product_name',
            'products_discounts.product_value as product_value',
            'products_discounts.date_start as product_date_start',
            'products_discounts.date_end as product_date_end',
            'products_discounts.id as key_id'
        ];
    }

    public function dataTableQuery(){
        return self::where("products_discounts.id", "<>", 0)
            ->join("products", "products.id", "products_discounts.product_id")
        ;
    }

}
