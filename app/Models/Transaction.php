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
use DB;
// Relations
use App\Models\Bank;
use App\Models\User;
use App\Models\Customer;
use App\Models\Supplier;
use App\Models\StakeHolder;
use App\Models\TransactionDetail;

class Transaction extends Model implements Auditable {

    use SoftDeletes,
        DataTable,
        \OwenIt\Auditing\Auditable;

    private $type = 0;    
    protected $dates = ['deleted_at'];
    protected $table = 'transactions';
    protected $fillable = [
        'bank_id',
        'user_id',
        'customer_id',
        'supplier_id',
        'stakeholder_id',
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

    public function StakeHolder(){
        return $this->belongsTo(StakeHolder::class, "stakeholder_id");
    }
    
    public function TransactionDetail() {
        return $this->hasMany(TransactionDetail::class);
    }

    public static function createInvoiceNumber($type, $code){
        $sql = "SELECT MAX(invoice_number) as max_number FROM transactions WHERE type = ".$type." AND invoice_date <=  DATE(now())";
        $data = DB::select($sql);
        if(!is_null($data) && isset($data[0]->max_number)){
            $arr = explode(".", $data[0]->max_number);
            $val = (int) $arr[2] + 1;
            $digit = 5;
            $i_number = strlen($val);
            for ($i = $digit; $i > $i_number; $i--) {
                $val = "0" . $val;
            }
            return $code.".".date("Ymd").".".$val;
        }
        return $code.".".date("Ymd").".00001";
    }

    public function selectData(){
        return [
            'transactions.invoice_date as invoice_date',
            'transactions.invoice_number as invoice_number',
            'users.username as username',
            'customers.name as customer_name',
            'suppliers.name as supplier_name',
            'stakeholders.name as stakeholder_name',
            'transactions.total_items as total_items',
            'transactions.subtotal as subtotal',
            'transactions.tax as tax',
            'transactions.discount as discount',
            'transactions.grandtotal as grandtotal',
            'transactions.is_purchased as is_purchased',
            'transactions.id as key_id'
        ];
    }

     public function dataTableQuery(){
        $t = $this->getType();
        return self::where("transactions.id", "<>", 0)
            ->where("transactions.type", $t)
            ->leftJoin("users", "users.id", "transactions.user_id")
            ->leftJoin("customers", "customers.id", "transactions.customer_id")
            ->leftJoin("suppliers", "suppliers.id", "transactions.supplier_id")
            ->leftJoin("stakeholders", "stakeholders.id", "transactions.stakeholder_id")
        ;
    }


    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}
