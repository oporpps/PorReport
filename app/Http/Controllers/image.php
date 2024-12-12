<?php

namespace App\Http\Controllers;
use Soyer\Http\Request;
use App\Http\Controllers\UserState;
use App\Models\Repair;

class image
{
    public static function handle()
    {
        $image_path = null;
        if (isset(Request::$files['images']) && Request::$files['images']['error'] == UPLOAD_ERR_OK) {
            $target_dir = $_ENV["HOME_PATH"] . "public/assets/images/";

            // สร้าง UUID
            $uuid = uniqid('', true); // หรือใช้ uuid แบบอื่น เช่น ramsey/uuid
            // ดึงนามสกุลไฟล์
            $image_extension = pathinfo(Request::$files["images"]["name"], PATHINFO_EXTENSION);
            // ตั้งชื่อไฟล์ใหม่โดยใช้ UUID และนามสกุลไฟล์
            $target_file = $target_dir . $uuid . '.' . $image_extension;

            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            if (move_uploaded_file(Request::$files['images']['tmp_name'], $target_file)) {
                echo "Image uploaded successfully.";

                // เก็บ path ของไฟล์ที่อัปโหลดสำเร็จ
                $image_path = "public/assets/images/" . $uuid . '.' . $image_extension;
            } else {
                echo "Image upload failed.";
                $image_path = null;
            }
        }
    }
}