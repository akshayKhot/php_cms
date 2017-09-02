<?php

    function sanitize($text="") {
        global $db;
        return htmlspecialchars(mysqli_real_escape_string($db, $text));
    }

    function redirect_to($location) {
        header("Location: " . $location);
        exit;
    }

    function display_errors($errors=array()) {
        $output = '';
        if(!empty($errors)) {
            $output .= "<div class='error'>
                        <p>There were following errors:</p>
                        <ul>";
            foreach($errors as $error) {
                $output .= "<li>$error</li>";
            }
            $output .= "</ul></div>";
        }
        return $output;
    }

?>