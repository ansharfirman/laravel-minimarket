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
use App\Traits\DataTable;
// Relations
use App\Models\ProductSize;

class Measure extends Model implements Auditable {

    use SoftDeletes,
        DataTable,
        \OwenIt\Auditing\Auditable;

    protected $dates = ['deleted_at'];
    protected $table = 'measures';
    protected $fillable = [
        'code',
        'name',
        'description',
    ];

    public function ProductSize() {
        return $this->hasMany(ProductSize::class);
    }

    public function selectData(){
        return [
            'measures.code as measure_code',
            'measures.name as measure_name',
            'measures.description as measure_description',
            'measures.id as key_id'
        ];
    }

}
