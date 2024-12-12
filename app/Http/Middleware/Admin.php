<?php

    namespace App\Http\Middleware;
    use Closure;

    use App\Http\Controllers\UserState;


    class Admin {

        public static function handle(Closure $next){
            if (UserState::isUserID()) {
                return $next();
            }
            return redirect("/admin/login");
        }

    }