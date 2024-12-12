<?php

namespace App\Http\Controllers;
use Soyer\Http\Request;
use App\Models\MS;
class Messages {

    public static function handle(){

        $message = new MS();

        if (
            $message->Create(

                ["recipient", "subject" ,"message"],

                [Request::$jsonr["recipient"], Request::$jsonr["subject"], Request::$jsonr["message"]]

            )->execute()
        ) {
            return jsonify(["message" => "สำเร็จ"]);
        }
        
    }

    public static function get(){

        $message = new MS();
        return  $message -> Select() -> executeWith() -> findAll();
    }


}