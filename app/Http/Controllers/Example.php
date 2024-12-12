<?php

    namespace App\Http\Controllers;

    use Soyer\Http\Request;


    class Example {

        public static function handle(){ 
            return jsonify(["server" => "pong"]);
        }

    }