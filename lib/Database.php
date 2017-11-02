<?php

/**
 * Простой статический класс обертка для работы с БД
 */ 
class Database {
    
    const DB_HOST = "localhost";
    const DB_USER = "root";
    const DB_PASS = "";
    const DB_NAME = "task";
    
    /**
     * Сохранить файл в базу
     */ 
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
    
    /**
     * Получить из базы
     */ 
    public static function getFromDB() {
        $conn = new PDO("mysql:host=" . self::DB_HOST .";dbname=" . self::DB_NAME, self::DB_USER, self::DB_PASS);
        
        $sth = $conn->prepare("SELECT id, json_obj, dt FROM data");
        $sth->execute();
        return $sth->fetchAll();
    }
    
    /**
     * Проверяем логин пароль пользователя
     */ 
    public static function checkUser($name, $password) {
        $conn = new PDO("mysql:host=" . self::DB_HOST .";dbname=" . self::DB_NAME, self::DB_USER, self::DB_PASS);
        
        $salt = 'secret';
        $password = md5($salt . $password . $salt);
        $sth = $conn->prepare("SELECT id FROM users WHERE name = ? AND password = ?");
        
        
        $sth->bindParam(1, $name);
        $sth->bindParam(2, $password);
        $sth->execute();
        return $sth->fetch() !== false;
    }
}