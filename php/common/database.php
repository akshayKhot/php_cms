<?php
    $db = mysqli_connect("127.0.0.1", "root", "", "blog");

    if (!$db) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    function executeQuery($query="") {
        global $db;
        $result = mysqli_query($db, $query);
        confirm_result($result);
        return $result;
    }

    function confirm_result($result) {
        if(!$result) {
            exit("Database query failed.");
        }
    }  
?>
