<?php

namespace App\Http\Controllers;
use App\Models\Repair;

class Success {

    public static function success($id){

        $report = new Repair();

        return $report -> Update(['status'] ,['finish']) -> where('id = ?',[$id]) -> execute();
    }
    
}