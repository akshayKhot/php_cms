<?php 
    include "common.php";
    require 'connect.php';
    if(isset($_SESSION["user_id"])) {
        if(isset($_GET["deletePost"])) {
            $deleteQuery = "DELETE FROM posts WHERE post_id=$_GET[deletePost]";
            $db->query($deleteQuery) or die($db->error);
            header("Location: http://localhost:8888/php_cms/");
        }
        if(isset($_GET["editPost"])) {
            echo "editing post $_GET[editPost]";

        }

    }
    include "footer.php";
?>