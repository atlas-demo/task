<?php

/**
 * Парсер файла
 */ 
class Parser {
    
    public static function parseFile($fileName) {
        $content = file_get_contents($fileName);
        $lines = explode(PHP_EOL, $content);
        $result = [];
        
        foreach ($lines as $line) {
            $row = [];
            for ($i = 0; $i < strlen($line); $i++) {
                if (is_numeric($line[$i])) {
                    $row[] = $line[$i];
                }
            }
            sort($row);
            $result[] = $row;
        }
        
        return $result;
    }
    
}