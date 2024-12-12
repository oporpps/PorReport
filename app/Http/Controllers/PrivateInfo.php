<?php

namespace App\Http\Controllers;
use Soyer\Http\Request;
use App\Http\Controllers\UserState;
use App\Models\Repair;

class PrivateInfo {

    public static function get(){

        $report = new Repair();
        return  $report -> Select() -> executeWith() -> findAll();
    }

    public static function getbyId($id){

        $report = new Repair();
        return  $report -> Select() -> where("user_id=?", [$id]) -> executeWith() -> findAll();
    }
}