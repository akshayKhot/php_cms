<?php
    require("init.php");
    if(isset($_SESSION["user_id"])) {
        session_destroy();
    }
    header("Location: http://localhost:8888/php_cms/");

?>