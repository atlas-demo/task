<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== '1') {
    die('Access denied');
}

$message = '';
if (!empty($_POST)) {
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], 'data' . DIRECTORY_SEPARATOR . 'test.txt');
    $message = 'Файл загружен';
}

include 'tpl' . DIRECTORY_SEPARATOR . 'upload.phtml';