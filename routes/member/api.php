<?php

use App\Http\Controllers\Cannot;
use App\Http\Controllers\ChangePassword;
    use Soyer\PMSoyer;
    use Soyer\Http\Request;
    use App\Http\Middleware\Authentication;
    use App\Http\Middleware\NotAuthentication;
    use App\Http\Controllers\Example as ConExample;
    use App\Http\Controllers\Index;
    use App\Http\Controllers\Login;
    use App\Http\Controllers\Logout;
    use App\Http\Controllers\Messages;
    use App\Http\Controllers\Register;
    use App\Http\Controllers\Delete;
    use App\Http\Controllers\DeleteM;
    use App\Http\Controllers\Manager;
use App\Http\Controllers\Progress;
use App\Http\Controllers\Reason;
use App\Http\Controllers\Success;
    use App\Http\Middleware\Role;

    PMSoyer::route("/ping", ["GET", "POST"], function(){
        return ConExample::handle();
    });

    PMSoyer::route("/api/register", ["POST"], function() {
        return Register::handle();
    });
    
    PMSoyer::route("/api/login", ["POST"], function(){
        return Login::handle();
    }, [NotAuthentication::class]);

    PMSoyer::route("/api/logout", ["GET"], function(){
        return Logout::handle();
    }, [Authentication::class]);

    PMSoyer::route("/api/index", ["POST"], function(){
        return Index::handle();
    }, [Authentication::class]);

    PMSoyer::route("/api/status", ["POST"], function(){
        return Index::handle();
    }, [Authentication::class]);

    // PMSoyer::route("/api/delete", ["POST"], function(){
    //     return Index::handle();
    // }, [Authentication::class]);

    PMSoyer::route("/api/messages", ["POST"], function(){
        return Messages::handle();
    });

    PMSoyer::route("/api/delete", ["DELETE"], function(){
        return Delete::delete(Request::$jsonr["id"]);
    });

    PMSoyer::route("/api/deleteM", ["DELETE"], function(){
        return DeleteM::delete(Request::$jsonr["id"]);
    });

    PMSoyer::route("/api/success", ["PUT"], function(){
        return Success::success(Request::$jsonr["id"]);
    });

    PMSoyer::route("/api/progress", ["PUT"], function(){
        return Progress::progress(Request::$jsonr["id"]);
    });

    PMSoyer::route("/api/cannot", ["PUT"], function(){
        return Cannot::cannot(Request::$jsonr["id"]);
    });

    PMSoyer::route("/api/reason", ["PUT"], function(){
        return Reason::reason(Request::$jsonr["id"]);
    });

    PMSoyer::route("/api/managers", ["PUT"], function(){
        return Manager::managers();
    });

    PMSoyer::route("/api/changepw", ["PUT"], function(){
        return ChangePassword::change();
    });