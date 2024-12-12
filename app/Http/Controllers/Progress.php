<?php

namespace App\Http\Controllers;
use App\Models\Repair;

class Progress {

    public static function progress($id){

        $report = new Repair();

        return $report -> Update(['status'] ,['progress']) -> where('id = ?',[$id]) -> execute();
    }
    
}