<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/26
 * Time: 9:09
 */
class DB{
    private static $ins;
    private static $db;
    private function __construct($dbconfig)
    {
        list($ip,$dbname,$username,$password)=$dbconfig;
        self::$db=new PDO("mysql:host=$ip;dbname=$dbname",$username,$password);
    }
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }
    public static function getint($dbconfig){
        if (self::$ins instanceof SELF){
            return self::$ins;
        }
        return self::$ins=new SELF($dbconfig);
    }
    function create($sql){
        return self::$db->exec($sql);
    }
    function show($sql){
        return self::$db->query($sql)->fetchAll();
    }
    function find($sql){
        return self::$db->query($sql)->fetch();
    }
    function del($sql){
        return self::$db->exec($sql);
    }
    function upd($sql){
        return self::$db->exec($sql);
    }
}
$dbconfig=['127.0.0.1','1607a','root','root'];
DB::getint($dbconfig);
$sql="insert into user values(null,'123','123','1')";
DB::create($sql);