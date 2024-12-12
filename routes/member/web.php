<?php

    use Soyer\PMSoyer;
    use App\Http\Controllers\Index;
    use App\Http\Controllers\UserState;
    use App\Http\Controllers\PrivateInfo;
    use App\Http\Middleware\Authentication;
    use App\Http\Middleware\NotAuthentication;
    use App\Http\Middleware\Role;   

    PMSoyer::route('/', ["GET"], function() {
        return render_template('member/index.html', ['title' => 'แจ้งซ่อม',]);
    }, [Authentication::class]);

    PMSoyer::route('/login', ["GET"], function() {
        return render_template('member/login.html', ['title' => 'เข้าสู่ระบบ']);
    }, [NotAuthentication::class]);

    PMSoyer::route('/status', ["GET"], function() {
        return render_template('member/status.html', ['title' => 'Status','reports' => PrivateInfo::get()]); 
    }, [Authentication::class]);

    PMSoyer::route('/status/cannot_repair/<id>', ["GET"], function($id) {
        return render_template('member/cannot_repair.html', ['title' => 'ซ่อมไม่ได้','reports' => Index::getbyId($id)]); 
    }, [Authentication::class]);

    PMSoyer::route('/register', ["GET"], function() {
        return render_template('member/register.html', ['title' => 'สมัครสมาชิก']);
    }, [NotAuthentication::class]);
 
    PMSoyer::route('/changepassword', ["GET"], function() {
        return render_template('member/changepw.html', ['title' => 'เปลี่ยนรหัสผ่าน',]);
    }, [Authentication::class]);
    


    
    
    
    
    // // custom error response
    // PMSoyer::errorHandler(404, function(){
    //     return render_template("404.html"); // please create 404.html file in templates directory
    // });