<?php

namespace App\Http\Controllers;

use Soyer\Http\Request;
use App\Models\Account;
use App\Http\Controllers\UserState;

class Logout {

    public static function handle() {

        UserState::unsetUserID();
        UserState::unsetUserName();
        UserState::unsetUserRole();

        return jsonify(["message" => "ออกจากระบบสำเร็จ"]);
    }
}
