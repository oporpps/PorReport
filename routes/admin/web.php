<?php

    use Soyer\PMSoyer;
    use App\Http\Controllers\Index;
    use App\Http\Controllers\Manager;
    use App\Http\Middleware\Authentication;
    use App\Http\Controllers\Messages;
    use App\Http\Middleware\Admin;
    use App\Http\Middleware\NotAdmin;
    use App\Http\Middleware\NotAuthentication;
    use App\Http\Middleware\Role;
    use App\Http\Middleware\RoleAdmin;

    PMSoyer::route('/admin/login', ["GET"], function() {
        return render_template('admin/login.html', ['title' => 'เข้าสู่ระบบ']);
    }, [NotAdmin::class]);

    PMSoyer::route('/admin/mn_member', ["GET"], function() {
        return render_template('admin/mn_member.html', ['title' => 'จัดการสมาชิก','accout' => Manager::manager()]);
    }, [Admin::class, RoleAdmin::class]);

    PMSoyer::route('/admin/contact', ["GET"], function() {
        return render_template('admin/contact.html', ['title' => 'ติดต่อเจ้าหน้าที่','sends' => Messages::get()]);
    }, [Admin::class,RoleAdmin::class]);

    PMSoyer::route('/admin/changepassword', ["GET"], function() {
        return render_template('admin/changepw.html', ['title' => 'เปลี่ยนรหัสผ่าน']);
    }, [Admin::class,RoleAdmin::class]);

