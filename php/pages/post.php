<?php
    require_once("../common/init.php");
    include(SHARED_PATH . "/header.php");
    $post_id = $_GET["id"];
    $query = "SELECT title, date, content FROM posts WHERE post_id='" . $post_id . "';";
    $result = executeQuery($query);
    $post = mysqli_fetch_assoc($result);
?>

<div class="container single-post">
    <h2><?php echo $post["title"]; ?></h2>
    <div class="author">
        <?php echo $_GET["author"]?>
    </div>
    <div class="content">
        <?php echo nl2br($post["content"]); ?>
    </div>
</div>

<?php
    include(SHARED_PATH . "/footer.php");
?>
