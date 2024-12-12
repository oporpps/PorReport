<?php

namespace App\Http\Controllers;
use Soyer\Http\Request;
use App\Models\Account;

class Register {

    public static function handle() {
        $recaptchaResponse = Request::$jsonr["recaptchaResponse"];
        $secretKey = "6LdGwFwqAAAAALNKrBnalFTUgkjSvKdyruazrBiu";  

        $verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}");
        $responseData = json_decode($verifyResponse);

        if (!$responseData->success) {
            return jsonify(["msg" => "การตรวจสอบ reCAPTCHA ล้มเหลว"], 400);
        }

        if (Request::$jsonr["password"] != Request::$jsonr["confirm_password"]) {
            return jsonify(["msg" => "รหัสผ่านไม่ตรงกัน"], 400);
        }

        $acc = new Account();

        if ($acc->Select()->where('t_email = ?', [Request::$jsonr["username"]])->executeWith()->findOne()) {
            return abortWithJson(400, ["status" => "error", "msg" => "มีอีเมลนี้ในระบบแล้ว"]);
        }

        if ($acc->Create(["t_email", "t_password"], [Request::$jsonr["username"], Request::$jsonr["password"]])->execute()) {
            return jsonify(["msg" => "สมัครสำเร็จ"]);
        }
    }
}