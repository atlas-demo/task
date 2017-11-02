<?php

class Database {
    
    const DB_HOST = "localhost";
    const DB_USER = "root";
    const DB_PASS = "";
    const DB_NAME = "task";
    
    public static function saveToDB($collection) {
        $conn = new PDO("mysql:host=" . self::DB_HOST .";dbname=" . self::DB_NAME, self::DB_USER, self::DB_PASS);
        
        foreach ($collection as $data) {
            $stmt = $conn->prepare("INSERT INTO data (id, json_obj, dt)
                VALUES (null, ?, ?)");
            $stmt->bindParam(1, json_encode($data));
            $stmt->bindParam(2, date('Y-m-d H:i:s'));
            $stmt->execute();
            
        }
    }
    
    public static function getFromDB() {
        $conn = new PDO("mysql:host=" . self::DB_HOST .";dbname=" . self::DB_NAME, self::DB_USER, self::DB_PASS);
        
        $sth = $conn->prepare("SELECT id, json_obj, dt FROM data");
        $sth->execute();
        return $sth->fetchAll();
    }
    
}