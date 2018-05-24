<?php

class Database {

    private static $dbName = 'voto';
    private static $dbHost = 'localhost';
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';
    
    private static $conexion = null;

    public function __construct() {
        exit('No se permite instanciar esta clase.');
    }

    public static function connect() {
        if (null == self::$conexion) {
            try {
                self::$conexion = new PDO("mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$conexion;
    }

    public static function disconnect() {
        self::$conexion = null;
    }

}
?>