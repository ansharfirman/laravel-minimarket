<?php

namespace App\Http\Controllers\Main\Transaction;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Group;

class PurchaseController extends MainController{

    const TYPE = 2;
    const CODE = "TPRC";

    public function __construct(){
        $this->layout = "main.transaction.purchase";
        $this->route = "transaction_purchases";
        $this->title = "Purchase";
        $this->subtitle = "purchase invoice management";
        $this->model = new Transaction;
        $this->dataTableModel = base64_encode(Transaction::class);
    }

    public function create(){
        $invoice_number = Transaction::createInvoiceNumber(self::TYPE, self::CODE);
        $invoice_date = date("Y-m-d");
        $user_id = \Auth::user()->id;
        $data = array(
            'user_id'=> $user_id,
            'is_purchased'=> 0,
            'type'=> self::TYPE,
            'invoice_date'=> $invoice_date,
            'invoice_number'=> $invoice_number,
            'total_items'=> 0,
            'subtotal'=> 0,
            'tax'=> 0,
            'discount'=> 0,
            'grandtotal'=> 0,
            'cash'=> 0,
            'change'=> 0
        );
        $transaction = Transaction::create($data);
        return redirect()->route($this->route.".edit", ["id"=>$transaction->id]);
    }

    public function edit($id){

        $model = $this->model->where("id", $id)
            ->where("type", self::TYPE)
            ->where("is_purchased", 0)
            ->first();

        if(is_null($model)){
            return abort(404);  
        }

        $this->data["title"] = $this->title;
        $this->data["subtitle"] = $this->subtitle;
        $this->data["model"] = $model;
        $this->data["suppliers"] = Supplier::orderBy("name", "ASC")->get();
        $this->data["brands"] = Brand::orderBy("name", "ASC")->get();
        $this->data["groups"] = Group::orderBy("name", "ASC")->get();
        $this->data["route"] = $this->route;
        return $this->__render__page($this->layout.".form", $this->data);
    }

}