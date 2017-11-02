<?php

require_once "lib" . DIRECTORY_SEPARATOR . 'Parser.php';
require_once "lib" . DIRECTORY_SEPARATOR . 'Database.php';
require_once "lib" . DIRECTORY_SEPARATOR . 'Helper.php';

$data = Parser::parseFile('data' . DIRECTORY_SEPARATOR . 'test.txt');
Database::saveToDB($data);

$items = Database::getFromDB();
$count = Helper::getMaxCount($items);

echo "<table border='1'>";
foreach ($items as $item) {
    echo "<tr>";
    $data = json_decode($item['json_obj']);
    if (!is_array($data)) {
        continue;
    }
    
    for ($i = 0; $i < $count; $i++) {
        if (isset($data[$i])) {
            echo "<td>$data[$i]</td>";    
        }   else  {
            echo "<td>&nbsp;</td>";    
        }
    }
    echo "</tr>";
}

    echo "<tr>";
    echo "<td colspan='2'>Итого: </td>";
    echo "<td>" . count($items) . "</td>";
    echo "</tr>";

echo "</table>";