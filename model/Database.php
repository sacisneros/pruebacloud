<?php

class Database {

    private static $dbName = 'voto';
    private static $dbHost = 'postgresproyecto.postgres.database.azure.com';
    private static $port = '5432';
    private static $dbUsername = 'pgproyecto@postgresproyecto';
    private static $dbUserPassword = 'Sextofisico.1';
    
    private static $conexion = null;

    public function __construct() {
        exit('No se permite instanciar esta clase.');
    }

    public static function connect() {
        if (null == self::$conexion) {
            try {
                self::$conexion = new PDO("pgsql:host=" . self::$dbHost . ";"."port=".self::$port .";". "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);
            
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
