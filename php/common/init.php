<?php
    session_start();

    define("COMMON_PATH", dirname(__FILE__));
    define("PHP_PATH", dirname(COMMON_PATH));
    define("PAGES_PATH", PHP_PATH . "/pages");
    define("SHARED_PATH", PHP_PATH . "/shared");

    $HOST_PATH = "http://" . $_SERVER["HTTP_HOST"];
    $HOME_PATH = $HOST_PATH . "/php_cms";
    $SRC_PATH = $HOST_PATH . "/php_cms/php";

    require_once("database.php");
?>