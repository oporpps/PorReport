<?php

    use Soyer\PMSoyer;
    use App\Http\Controllers\Index;
    use App\Http\Controllers\Messages;
    use App\Http\Middleware\Authentication;
    use App\Http\Middleware\NotAuthentication;
    use App\Http\Middleware\NotTc;
    use App\Http\Middleware\Role;
    use App\Http\Middleware\RoleTc;
    use App\Http\Middleware\TC;

    PMSoyer::route('/tc/login', ["GET"], function() {
        return render_template('officer/login.html', ['title' => 'เข้าสู่ระบบ']);
    }, [NotTc::class]);

    PMSoyer::route('/tc/tc', ["GET"], function() {
        return render_template('officer/tc.html', ['title' => 'สำหรับช่าง','reports' => Index::get()]);
    }, [TC::class ,RoleTc::class]);

    PMSoyer::route('/tc/messages', ["GET"], function() {
        return render_template('officer/messages.html', ['title' => 'ข้อความ','sends' => Messages::get()]);
    }, [TC::class, RoleTc::class]);

    PMSoyer::route('/tc/changepassword', ["GET"], function() {
        return render_template('officer/changepw.html', ['title' => 'เปลี่ยนรหัสผ่าน']);
    }, [TC::class, RoleTc::class]);

    PMSoyer::route('/tc/report_detail/<id>', ["GET"], function($id) {
        return render_template('officer/report_detail.html', ['title' => 'แสดงรายละเอียด','reports' => Index::getbyId($id)]);
    }, [TC::class,RoleTc::class]);

    PMSoyer::route('/tc/cannot_repair/<id>', ["GET"], function($id) {
        return render_template('officer/cannot_repair.html', ['title' => 'แจ้งเหตุผลซ่อมไม่ได้','reports' => Index::getbyId($id)]);
    }, [TC::class,RoleTc::class]);


    