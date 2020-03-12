<?php

namespace App\Http\Controllers\Main\Product;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDiscount;

class ProductDiscountController extends MainController{

    public function __construct(){
        $this->layout = "main.product.discount";
        $this->route = "product_discounts";
        $this->title = "Discount";
        $this->subtitle = "product discount";
        $this->model = new ProductDiscount;
        $this->dataTableModel = base64_encode(ProductDiscount::class);
    }

    public function create(){
       $this->data["products"] = Product::orderBy("name", "ASC")->get();
       return parent::create();
    }

    public function edit($id){
        $this->data["products"] = Product::orderBy("name", "ASC")->get();
        return parent::edit($id);
     }

    protected function createValidation(){
        return [
            'product_id' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
        ];
    }

    protected function updateValidation($id){
        return $this->createValidation();
    }

}