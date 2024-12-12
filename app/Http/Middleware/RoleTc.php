<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\UserState;

class RoleTc {

    public static function isTc() {
        return UserState::getUserRole() == "tc";
    }

    public static function handle(Closure $next) {
        if (self::isTc()) {
            return $next();
        }

        echo "คุณไม่ใช่ เจ้าหน้าที่. <a href='/'>กลับสู่หน้าหลัก</a>";
        UserState::unsetUserID();
        return;
    }
}
