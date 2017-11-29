<?php
namespace App\Session;
class Session{
    public static function init(){
        session_start();
    }
    public static function set($key, $val){
        $_SESSION[$key] = $val;
    }
    public static function get($key){
        if (isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return false;
        }
    }
    public static function checkSession(){
        self::init();
        if (self::get("login") == false){
            self::destroy();
        }
    }

    public static function checkLogin(){
        self::init();
        if (self::get("login") == true){
            header("Location: view/home.php");
        }
    }
    public static function destroy(){
        session_destroy();
        header("Location: ../index.php");
    }


    public static function SuccessMsg(){
        if(isset ($_SESSION["SuccessMsg"])){
            $output = "<span style='color: green'>";
            $output .= htmlentities($_SESSION["SuccessMsg"]);
            $output .= "</span>";
            unset($_SESSION["SuccessMsg"]);
            return $output;
        }
    }
    public static function ErrorMsg(){
        if(isset ($_SESSION["ErrorMsg"])){
            $output = "<span style='color: #ac2925'>";
            $output .= htmlentities($_SESSION["ErrorMsg"]);
            $output .= "</span>";

            unset($_SESSION["ErrorMsg"]);
            return $output;
        }
    }
}
?>