<?php

namespace App\Models;

class Permission extends \Spatie\Permission\Models\Permission {

    public static function defaultPermissions() {
        $result = array();
        $modules = [
           // Dashboard
           "dashboards",
           // References
           "banks",
           "customers",
           "measures",
           "stakeholders",
           "suppliers",
           "units",
           // Products
           "brands",
           "groups",
           "categories",
           "items",
           "product_images",
           "product_sizes",
           "product_discounts",
           // Transactions
           "transaction_sales",
           "transaction_purchases",
           "transaction_fees",
           // Reports
           "report_sales",
           "report_purchases",
           "report_fees",
           // Settings
           "audits",
           "settings",
           "users",
           "audits",
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
