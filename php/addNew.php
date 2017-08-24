<?php
    require 'connect.php';

    $title = htmlspecialchars($_POST["title"]);
    $date = htmlspecialchars($_POST["date"]);
    $content = htmlspecialchars($_POST["content"]);
    
    $query = "INSERT INTO posts (title, date, author, content)
                VALUES ('$title', '$date', 'Akshay', '$content');";

    if(!( empty($title) || empty($date) || empty($content) )) {
        mysqli_query($db, $query);
        echo "values added successfully";
    }
    else { 
        echo "Some of the values were empty";
    }
?>