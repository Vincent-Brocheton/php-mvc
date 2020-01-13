<?php
namespace Valarep\dao;

use \PDO;
use \PDOException;
use Valarep\View;

class Dao
{
    private static $host = "127.0.0.1";
    private static $port = "3306";
    private static $database = "monsite";
    private static $charset = "UTF8";
    private static $user = "monsite";
    private static $password = "11m1993A";
    private static $connection;
    public static function open()
    {
        $dsn = "mysql:" .
                "host=" . self::$host . ";" .
                "port=" . self::$port . ";" .
                "dbname=" . self::$database . ";" . 
                "charset=" . self::$charset . ";";
        try {
            self::$connection = new PDO($dsn, self::$user, self::$password);
            return self::$connection;
        } catch (PDOException $ex) {
            //echo $ex->getMessage();
            $code = "ABCD1234";

            View::setTemplate("fatal_error");
            View::bindVariable("code", $code);
            //View::bindVariable("MonSite", $title);
            View::bindVariable("debugMode", false);
            View::bindVariable("ex", $ex);
            View::display();
            die();
        }
    }

    public static function close()
    {
        self::$connection = null;
    }
}