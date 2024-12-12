<?php

namespace App\Http\Controllers;
use App\Models\Repair;

class Delete {

    public static function delete($id){

        $report = new Repair();

        return $report -> Delete() -> where("id = ?", [$id]) -> execute();
    }
    
}