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
use App\Models\Category;
use App\Models\Group;
use App\Models\Brand;
use App\Models\ProductDiscount;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\TransactionDetail;

class Product extends Model implements Auditable {

    use SoftDeletes,
        \OwenIt\Auditing\Auditable;

    protected $dates = ['deleted_at'];
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'group_id',
        'brand_id',
        'sku',
        'name',
        'price_profit',
        'price_purchase',
        'price_sale',
        'stock',
        'date_expired',
        'notes',
        'description'
    ];

    public function Brand() {
        return $this->belongsTo(Brand::class, "brand_id");
    }

    public function Category() {
        return $this->belongsTo(Category::class, "category_id");
    }

    public function Group() {
        return $this->belongsTo(Group::class, "group_id");
    }

    public function ProductDiscount() {
        return $this->hasMany(ProductDiscount::class);
    }

    public function ProductImage() {
        return $this->hasMany(ProductImage::class);
    }

    public function ProductSize() {
        return $this->hasMany(ProductSize::class);
    }

    public function TransactionDetail() {
        return $this->hasMany(TransactionDetail::class);
    }

}
