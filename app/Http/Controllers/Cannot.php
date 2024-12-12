<?php

namespace App\Http\Controllers;
use App\Models\Repair;

class Cannot {

    public static function cannot($id){

        $report = new Repair();

        return $report -> Update(['status'] ,['cannot']) -> where('id = ?',[$id]) -> execute();
    }
    
}