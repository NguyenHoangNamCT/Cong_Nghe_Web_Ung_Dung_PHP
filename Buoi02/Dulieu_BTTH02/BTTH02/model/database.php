<?php
class DATABASE{
    //mysql: // tức là dùng csdl mysql
    //host=localhost
    //dbname=shop
    //port=3306 port để kết nối với mysql
    private static $dns = "mysql:host=localhost;dbname=shop;port=3306";
    private static $username = "root";
    private static $password = "vertrigo";
    private static $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, 
                                    PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8");    
    private static $db;//dùng để lưu trạng thái của kết nối
    
    private function __construct(){} 
    
    public static function connect(){
        // if(!isset($db)){
        //     self::$db = new PDO(self::$dns, self::$username, self::$password, self::$options);
        // }
        // return self::$db;
        if(!isset(self::$db)){
            try{
                self::$db = new PDO(self::$dns, self::$username, self::$password, self::$options);
            }
            catch(PDOException $e){
                $error_message = $e->getMessage();
                echo "<p>Lỗi kết nối: $error_message</p>";
                exit();
            }
        }
        return self::$db;
    }
    
    public static function close(){
        self::$db = null;
    }
}
?>