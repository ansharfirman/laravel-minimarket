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
use App\Models\Bank;
use App\Models\User;
use App\Models\Customer;
use App\Models\Supplier;
use App\Models\TransactionDetail;

class Transaction extends Model implements Auditable {

    use SoftDeletes,
        \OwenIt\Auditing\Auditable;

    protected $dates = ['deleted_at'];
    protected $table = 'transactions';
    protected $fillable = [
        'bank_id',
        'user_id',
        'customer_id',
        'supplier_id',
        'is_purchased',
        'type',
        'invoice_date',
        'invoice_number',
        'total_items',
        'subtotal',
        'tax',
        'discount',
        'grandtotal',
        'cash',
        'change',
        'notes',
        'description',
    ];

    public function Bank() {
        return $this->belongsTo(Bank::class, "bank_id");
    }

    public function User() {
        return $this->belongsTo(User::class, "user_id");
    }

    public function Customer() {
        return $this->belongsTo(Customer::class, "customer_id");
    }

    public function Supplier() {
        return $this->belongsTo(Supplier::class, "supplier_id");
    }
    
    public function TransactionDetail() {
        return $this->hasMany(TransactionDetail::class);
    }

}
