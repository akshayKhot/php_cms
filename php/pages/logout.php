<?php
    require("../common/init.php");
    if(isset($_SESSION["user_id"])) {
        session_destroy();
    }
    header("Location: $HOME_PATH");

?>