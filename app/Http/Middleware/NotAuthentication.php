<?php

    namespace App\Http\Middleware;
    use Closure;

    use App\Http\Controllers\UserState;


    class NotAuthentication {

        public static function isAdmin(){
            return UserState::getUserRole() == "admin";
        }

        public static function isTc(){
            return UserState::getUserRole() == "tc";
        }

        public static function handle(Closure $next){
            if (!UserState::isUserID()) {
                return $next();
            }

            if (self::isAdmin()) {
                return redirect("/admin/mn_member");
            }

            if (self::isTc()) {
                return redirect("/tc/tc");
            }
            return redirect("/");
        }

    }