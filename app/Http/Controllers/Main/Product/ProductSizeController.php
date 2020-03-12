<?php

namespace App\Http\Controllers\Main\Product;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Measure;
use App\Models\Unit;

class ProductSizeController extends MainController{

    public function __construct(){
        $this->layout = "main.product.size";
        $this->route = "product_sizes";
        $this->title = "Size";
        $this->subtitle = "product size";
        $this->model = new ProductSize;
        $this->dataTableModel = base64_encode(ProductSize::class);
    }

    public function create(){
       $this->data["products"] = Product::orderBy("name", "ASC")->get();
       $this->data["units"] = Unit::orderBy("name", "ASC")->get();
       $this->data["measures"] = Measure::orderBy("name", "ASC")->get();
       return parent::create();
    }

    public function edit($id){
        $this->data["products"] = Product::orderBy("name", "ASC")->get();
        $this->data["units"] = Unit::orderBy("name", "ASC")->get();
        $this->data["measures"] = Measure::orderBy("name", "ASC")->get();
        return parent::edit($id);
     }

    protected function createValidation(){
        return [
            'product_id' => 'required',
            'measure_id' => 'required',
            'unit_id' => 'required',
        ];
    }

    protected function updateValidation($id){
        return $this->createValidation();
    }

}