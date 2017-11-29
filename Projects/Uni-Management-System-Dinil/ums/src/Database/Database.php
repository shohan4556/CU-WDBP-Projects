<?php
namespace App\Database;
use PDO;
class Database
{
    private static $pdo;
    private static function connection(){
        if (!isset(self::$pdo)){
            try{
                self::$pdo = new PDO('mysql:host=localhost; dbname=ums', 'root','');
            }catch (PDOException $e){
                echo $e->getMessage();
            }
        }
        return self::$pdo;

    }
    public static function Prepare($sql){
        return self::connection()->prepare($sql);
    }

}