<?php

namespace App\Http\Controllers;
use Soyer\Http\Request;
use App\Models\Repair;
class Reason {
    
    public static function reason($id){

        $reason = new Repair();

        if ($reason->Update(["reason"], [Request::$jsonr["message"]])-> where("id=?", [$id]) ->execute()) {
            return  jsonify(["message" => 'ok']);
        }
    }
    // public static function get(){

    //     $message = new Repair();
    //     return  $message -> Select() -> executeWith() -> findAll();
    // }

    // public static function getbyId($id){

    //     $report = new Repair();
    //     return  $report -> Select() -> where("id=?", [$id]) -> executeWith() -> findOne();
    // }

}