<?php

    namespace App\Http\Controllers;

    use Soyer\Http\Request;
    use App\Models\Account;
    use App\Http\Controllers\UserState;

    class Login {

        public static function handle() {

            $username = Request::$jsonr["username"];
            $password = Request::$jsonr["password"];

            if (empty($username) || empty($password)) {
                return jsonify(["message" => "username and password are required"], 400);
            }

            $acc = new Account();

            $result = $acc->Select()
                ->where('t_email = ? AND t_password = ?', [$username, $password])
                ->executeWith()
                ->findOne();

            if (!$result) {
                return jsonify(["message" => "ไม่พบผู้ใช้นี้"], 404);
            }

            UserState::setUserID($result["t_id"]);
            UserState::setUserName($result["t_email"]);
            UserState::setUserRole($result["t_role"]);

            return jsonify(["message" => "สำเร็จ"]);
        }
    }