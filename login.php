<?php
session_start();
require_once "lib" . DIRECTORY_SEPARATOR . 'Parser.php';
require_once "lib" . DIRECTORY_SEPARATOR . 'Database.php';

if (!empty($_POST)) {
    $isLoggedIn = Database::checkUser($_POST['name'], $_POST['password']);
    if ($isLoggedIn) {
        $_SESSION['logged_in'] = '1';
        header('Location: /upload.php');
        die();
    }
}

include 'tpl' . DIRECTORY_SEPARATOR . 'login.phtml';