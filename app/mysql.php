<?php
class Mysql {
    private static $_db = null;

    public static function getInstence() {
        $user  = 'root';
        $password = 'root';
        $db = 'diploma';
        $host = 'localhost';
        $port = 8889;
        $dsn = 'mysql:host='.$host.'; dbname='.$db.';port='.$port;

        if(self::$_db == null)
            self::$_db = new PDO($dsn,$user,$password);

        return self::$_db;
    }

    private function __construct() {}
    private function __clone() {}
    public function __wakeup() {}

}