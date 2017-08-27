<?php
    
    if(isset($_SESSION['user_id'])) {
        require 'connect.php';

        $user_id = $_SESSION['user_id'];
        $posts_query = "SELECT * FROM posts WHERE author_id='$user_id';";

        $posts_result = $db->query($posts_query) or die($db->error);

        
        foreach ($posts_result as $post) {
            echo "<article>";
            echo "<div><h4>" . $post['title'] . "</h4></div>";
            echo "<div><p>" . $post['content'] . "</p></div>";
            echo "</article>";
        }
    } else {
        $posts_query = "SELECT * FROM posts;";
        $posts_result = $db->query($posts_query) or die($db->error);

        
        
        foreach ($posts_result as $post) {

            $query = "SELECT name FROM users WHERE user_id='" . $post["author_id"] . "';";
            $result = $db->query($query) or die($db->error);
            $user = mysqli_fetch_assoc($result);

            echo "<article>";
            echo "<div><h4>" . $post['title'] . "</h4>By " . $user["name"] . "</div>";
            echo "<div><p>" . $post['content'] . "</p></div>";
            echo "</article>";
        }

    }
?>
