<?php

namespace App\Http\Controllers;
use Soyer\Http\Request;
use App\Models\Account;

class Tc {

    public static function handle(){
        if(Request::$jsonr["password"] != Request::$jsonr["confirm_password"]){
            return jsonify(["msg"=>"รหัสไม่ตรงกัน", 400]);
        }

        $acc = new Account();

        if ($acc->Select()->where('t_email = ?', [Request::$jsonr["username"]])->executeWith()->findOne()) {
            return abortWithJson(400, ["status" => "error", "msg" => "มีอีเมลนี้ในระบบแล้ว"]);
        }

        if ($acc->Create(["t_email", "t_password"], [Request::$jsonr["username"], Request::$jsonr["password"]])->execute()) {
            return jsonify(["msg"=> "สมัครสำเร็จ"]);
        }
    }
}