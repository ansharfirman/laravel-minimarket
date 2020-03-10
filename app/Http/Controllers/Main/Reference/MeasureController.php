<?php

namespace App\Http\Controllers\Main\Reference;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Measure;

class MeasureController extends MainController{

    public function __construct(){
        $this->layout = "main.reference.measure";
        $this->route = "measures";
        $this->title = "Measure";
        $this->subtitle = "measure management";
        $this->model = new Measure;
        $this->dataTableModel = base64_encode(Measure::class);
    }

    protected function createValidation(){
        return [
            'code' => 'required|unique:measures',
            'name' => 'required|unique:measures',
        ];
    }

    protected function updateValidation($id){
        return [
            'code' => 'required|unique:measures,code,' . $id,
            'name' => 'required|unique:measures,name,' . $id,
        ];
    }

}