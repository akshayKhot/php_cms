
<?php
    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        
        $posts_result = getAllPostsForAuthor($user_id);
        $authorName = getUserFromId($user_id)["name"];
        
        foreach ($posts_result as $post) {
            createPost($post, $authorName);
        }
    } else {
        $posts_result = getAllPosts();
        
        foreach ($posts_result as $post) {
            $authorName = getUserFromId($post["author_id"])["name"];
            createPost($post, $authorName);
        }
    }

    function createPost($post, $authorName) {
        global $SRC_PATH;
        if(isset($_SESSION['user_id'])) {
            $icons = "<a href='$SRC_PATH/pages/modifyPost.php?deletePost=$post[post_id]'><span class='deletePost'>
                        <i class='fa fa-times' aria-hidden='true'></i>
                        </span></a>
                      <a href='$SRC_PATH/pages/modifyPost.php?editPost=$post[post_id]'><span class='editPost'>
                        <i class='fa fa-pencil-square-o' aria-hidden='true'></i>
                      </span></a>";
        } else {
            $icons = "";
        }

        echo "<article>";
        echo "<h3><a href='$SRC_PATH/pages/post.php?id=".$post["post_id"]."&author=$authorName'>" . $post['title'] . "</a></h3>";
        echo "<div class='author'>-<a href='" . $SRC_PATH . "/pages/user.php?user_id=" . $post['author_id'] . "'>$authorName</a>" . $icons . "</div>";
        echo "</article>";
    }
?>
