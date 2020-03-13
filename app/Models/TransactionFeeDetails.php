<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// Relations
use App\Models\Transaction;

class TransactionFeeDetails extends Model {

    protected $table = 'transactions_details';
    protected $fillable = [
        'transaction_id',
        'description',
        'total',
    ];

    public function Transaction() {
        return $this->belongsTo(Transaction::class, "transaction_id");
    }

}
