<?php
    require("../common/init.php");
    if(isset($_SESSION["user_id"])) {
        session_destroy();
    }
    redirect_to($HOME_PATH);

?>