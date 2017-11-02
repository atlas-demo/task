<?php

require_once "lib" . DIRECTORY_SEPARATOR . 'Parser.php';
require_once "lib" . DIRECTORY_SEPARATOR . 'Database.php';

$data = Parser::parseFile('data' . DIRECTORY_SEPARATOR . 'test.txt');
Database::saveToDB($data);

$items = Database::getFromDB();

echo "<table border='1'>";
echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>OBJECT</th>";
    echo "<th>DATETIME</th>";
echo "</tr>";
foreach ($items as $item) {
    echo "<tr>";
    echo "<td>{$item['id']}</td>";
    echo "<td>{$item['json_obj']}</td>";
    echo "<td>{$item['dt']}</td>";
    echo "</tr>";
}
echo "</table>";