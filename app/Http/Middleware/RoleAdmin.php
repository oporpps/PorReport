<?php

    namespace App\Http\Middleware;

    use Closure;

    use App\Http\Controllers\UserState;


    class RoleAdmin {

        public static function isAdmin(){
            return UserState::getUserRole() == "admin";
        }

        public static function handle(Closure $next){ 
            if (self::isAdmin()) {
                return $next();
            }
        
            echo "คุณไม่ใช่ แอดมิน. <a href='/'>กลับสู่หน้าหลัก</a>";
            return UserState::unsetUserID();
        }
        

    }