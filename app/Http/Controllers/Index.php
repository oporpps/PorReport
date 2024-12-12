<?php

namespace App\Http\Controllers;
use Soyer\Http\Request;
use App\Http\Controllers\UserState;
use App\Models\Repair;
class Index {

    

    public static function get(){

        $report = new Repair();
        return  $report -> Select() -> where("? ORDER BY status = ? DESC", [1, "pending"]) -> executeWith() -> findAll();
    }

    public static function getbyId($id){

        $report = new Repair();
        return  $report -> Select() -> where("id=?", [$id]) -> executeWith() -> findOne();
    }

    public static function handle(){
        
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

                $report = new Repair();
                if (
                    $report->Create(
                        ["user_id","equipment", "brand", "model", "serial_number", "issue", "possible_cause", "previous_attempts", "description", "location","images"], 
                        [
                            $_SESSION["session_id"],
                            Request::$form["equipment"], 
                            Request::$form["brand"], 
                            Request::$form["model"], 
                            Request::$form["serial_number"], 
                            Request::$form["issue"], 
                            Request::$form["possible_cause"], 
                            Request::$form["previous_attempts"], 
                            Request::$form["description"], 
                            Request::$form["location"],
                            
                            $uuid . '.' . $image_extension
                        ]
                    )->execute()
                ) {
                    return redirect("/status");
                }
            } 
        }
        
        
    
        
    }

}