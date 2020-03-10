<?php

namespace App\Http\Controllers\Main\Reference;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends MainController{

    public function __construct(){
        $this->layout = "main.reference.unit";
        $this->route = "units";
        $this->title = "unit";
        $this->subtitle = "unit management";
        $this->model = new Unit;
        $this->dataTableModel = base64_encode(Unit::class);
    }

    protected function createValidation(){
        return [
            'code' => 'required|unique:units',
            'name' => 'required|unique:units',
        ];
    }

    protected function updateValidation($id){
        return [
            'code' => 'required|unique:units,code,' . $id,
            'name' => 'required|unique:units,name,' . $id,
        ];
    }

}