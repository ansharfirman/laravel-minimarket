<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use App\Models\Transaction as TransactionModel;
use DB;

class Report extends TransactionModel{
    
    const REPORT_SALE = 1;
    const REPORT_PURCHASE = 2;
    const REPORT_FEE = 3;

    public static function getTransaction($report_type, $filter, $data_start, $date_end){
        $tr = new self;
        if((int) $report_type == self::REPORT_SALE){
            if((int) $filter == 1){
                return $tr->transactionByPeriode(self::REPORT_SALE, $date_start, $date_end);
            }
            if((int) $filter == 2){
                return $tr->productByPeriode(self::REPORT_SALE, $date_start, $date_end);
            }
            if((int) $filter == 3){
                return $tr->customerByPeriode(self::REPORT_SALE, $date_start, $date_end);
            }
        }
        if((int) $report_type == self::REPORT_PURCHASE){
            if((int) $filter == 1){
                return $tr->transactionByPeriode(self::REPORT_PURCHASE, $date_start, $date_end);
            }
            if((int) $filter == 2){
                return $tr->productByPeriode(self::REPORT_PURCHASE, $date_start, $date_end);
            }
            if((int) $filter == 3){
                return $tr->supplierByPeriode(self::REPORT_PURCHASE, $date_start, $date_end);
            }
        }
        if((int) $report_type == self::REPORT_FEE){
            if((int) $filter == 1){
                return $tr->transactionByPeriode(self::REPORT_FEE, $date_start, $date_end);
            }
            if((int) $filter == 2){
                return $tr->stakeholderByPeriode(self::REPORT_FEE, $date_start, $date_end);
            }
        }
    }

    private function transactionByPeriode($type, $date_start, $date_end){

    }

    private function productByPeriode($type, $date_start, $date_end){

    }

    private function customerByPeriode($type, $date_start, $date_end){

    }

    private function supplierByPeriode($type, $date_start, $date_end){

    }

    private function stakeholderByPeriode($type, $date_start, $date_end){

    }

}