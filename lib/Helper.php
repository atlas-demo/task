<?php

/**
 * Парсер файла
 */ 
class Helper {
    
    public static function getMaxCount($collection) {
        $max = 0;
        foreach ($collection as $item) {
            if (count($item) > $max) {
                $max = count($item);
            }
        }
        
        return $max;
    }
    
}