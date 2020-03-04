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
use App\Models\Transaction;

class Supplier extends Model implements Auditable {

    use SoftDeletes,
        \OwenIt\Auditing\Auditable;

    protected $dates = ['deleted_at'];
    protected $table = 'suppliers';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'mobile',
        'postal_code',
        'fax_number',
        'address'
    ];

    public function Transaction() {
        return $this->hasMany(Transaction::class);
    }

}
