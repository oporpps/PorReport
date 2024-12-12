<?php

namespace App\Http\Controllers;
use App\Models\Account;
use Soyer\Http\Request;

class Manager {

    public static function manager(){

        $acc = new Account();

        return $acc -> Select() -> executeWith() -> findAll();
    }
    
    public static function managers(){

        $acc = new Account();

        return $acc -> Update(['t_email', 't_role'],[Request::$jsonr["t_email"],Request::$jsonr["t_role"]]) -> where('t_id = ?',[Request::$jsonr["t_id"]]) -> execute();
    }
}