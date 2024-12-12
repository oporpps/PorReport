<?php

namespace App\Http\Controllers;
use App\Models\MS;

class DeleteM {

    public static function delete($id){

        $message = new MS();

        return $message -> Delete() -> where("id = ?", [$id]) -> execute();
    }
    
}