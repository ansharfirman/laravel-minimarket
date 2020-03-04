<?php

namespace App\Models;

class Permission extends \Spatie\Permission\Models\Permission {

    public static function defaultPermissions() {
        $result = array();
        $modules = [
            "audits",
            "banks",
            "categories",
            "settings",
            "customers",
            "groups",
            "measures",
            "products",
            "roles",
            "stakeholders",
            "suppliers",
            "sales",
            "purchases",
            "units",
            "users",
        ];
        asort($modules);
        $actions = ["view", "add", "edit", "delete"];
        foreach ($modules as $m) {
            foreach ($actions as $a) {
                $result[] = $a . "_" . $m;
            }
        }
        return $result;
    }

}
