<?php

namespace App\Helpers;

class CommonHelper{

    public static function getVal($model, $value){
        return isset($model->$value) ? $model->$value : null;
    }

    public static function getConfig($slug){
        return \App\Models\Configuration::getBySlug($slug);
    }

    public static function getTheme(){
        $skin = \App\Models\Configuration::getBySlug("app-theme");
        if($skin != 'app-theme'){
            return $skin;
        }
        return "skin-blue";
    }

    public static function getBoxTheme(){
        $box = \App\Models\Configuration::getBySlug("app-box");
        if($box != 'app-box'){
            return $box;
        }
        return "box-default";
    }

    public static function getCompanyLogo(){
        $logo = \App\Models\Configuration::getBySlug("company-logo");
        if($logo != 'company-logo' && file_exists(public_path($logo))){
            return url($logo);
        }
        return url("assets/dist/img/no-image.png");
    }

    public static function getOptionCategories($model = null){
        \App\Models\Category::getTreeCatgeories($model);
    }

}