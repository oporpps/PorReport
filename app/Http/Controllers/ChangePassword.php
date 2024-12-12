<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Soyer\Http\Request;
class ChangePassword {

    public static function change(){

        $acc = new Account();

        if ($acc->Update(["t_password"], [Request::$jsonr["new_password"]])-> where('t_id = ?',[$_SESSION["session_id"]]) ->execute()) {
            return  redirect("/");
        }
    }
    
}