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
        
?>  

<div class="container">
    <h4>Welcome to the blog. To create your personal blog, please register.</h4>
    <h4>If you are an existing user, please log in. </h4>
</div>

<?php
    }
?>
