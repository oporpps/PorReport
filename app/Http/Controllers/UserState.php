<?php


    namespace App\Http\Controllers;


    class UserState {

        public static function setUserID($data){
            $_SESSION["session_id"] = $data;
        }

        public static function setUserRole($data){
            $_SESSION["session_role"] = $data;
        }

        public static function setUserName($data){
            $_SESSION["session_name"] = $data;
        }

        public static function getUserID(){
            return $_SESSION["session_id"];
        }

        public static function getUserRole(){
            return $_SESSION["session_role"];
        }

        public static function getUserName(){
            return isset($_SESSION["session_name"]) ? $_SESSION["session_name"] : null;
        }

        public static function unsetUserID(){
            unset($_SESSION["session_id"]);
        }

        public static function unsetUserRole(){
            unset($_SESSION["session_role"]);
        }

        public static function unsetUserName(){
            unset($_SESSION["session_name"]);
        }

        public static function isUserID(): bool {
            return isset($_SESSION["session_id"]);
        }

        public static function isUserRole(): bool {
            return isset($_SESSION["session_role"]);
        }

        public static function isUserName(): bool {
            return isset($_SESSION["session_name"]);
        }

    }