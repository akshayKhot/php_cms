<?php
    
    if(isset($_SESSION['user_id'])) {
        require 'connect.php';

        $user_id = $_SESSION['user_id'];
        $posts_query = "SELECT * FROM posts WHERE author_id='$user_id' ORDER BY date DESC;";
        $posts_result = $db->query($posts_query) or die($db->error);
        
        $query = "SELECT name FROM users WHERE user_id='" . $user_id . "';";
        $result = $db->query($query) or die($db->error);
        $user = mysqli_fetch_assoc($result);
        
        foreach ($posts_result as $post) {
            createPost($post, $user);
        }
    } else {
        $posts_query = "SELECT * FROM posts ORDER BY date DESC;";
        $posts_result = $db->query($posts_query) or die($db->error);

        foreach ($posts_result as $post) {

            $query = "SELECT name FROM users WHERE user_id='" . $post["author_id"] . "';";
            $result = $db->query($query) or die($db->error);
            $user = mysqli_fetch_assoc($result);

            createPost($post, $user);
        }

    }

    function createPost($post, $user) {

        if(isset($_SESSION['user_id'])) {
            $icons = "<span class='deletePost'><i class='fa fa-times' aria-hidden='true'></i></span><span class='editPost'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></span>";
        } else {
            $icons = "";
        }

        echo "<article>";
        echo "<h2><a href='php/post.php?id=".$post["post_id"]."&author=".$user["name"]."'>" . $post['title'] . "</a></h2>";
        echo "<div class='author'>-" . $user['name'] . $icons . "</div>";
        echo "</article>";
    }
?>
