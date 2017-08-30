<?php

    function sanitize($text="") {
        global $db;
        return htmlspecialchars(mysqli_real_escape_string($db, $text));
    }

    function redirect_to($location) {
        header("Location: " . $location);
        exit;
    }


?>