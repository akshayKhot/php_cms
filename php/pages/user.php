<?php 
    require_once("../common/init.php");
    include(SHARED_PATH . "/header.php");

    $user_id = $_GET['user_id'];

    $user = getUserFromId($user_id);
    $posts = getAllPostsForAuthor($user_id);

    echo "<h3>$user[name]</h3>";
    echo "<p>$user[email]</p>";
    echo "<p> Posts Written: " . mysqli_num_rows($posts) . "</p>"
    
?>
    

<?php
    include(SHARED_PATH . "/footer.php");
?>