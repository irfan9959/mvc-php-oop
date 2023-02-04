<?php
final class DatabaseConnection{
    private static $instance=null;
    private static $connection;
    public static function GetInstance(){
        if(is_null(self::$instance)){
            self::$instance=new DatabaseConnection();
        }
        return self::$instance;
    }
    public static function Connect($host,$user,$pass,$DB){
        self::$connection=mysqli_connect($host,$user,$pass,$DB);
    }
    public static function GetConnection(){
        return self::$connection;
    }
}