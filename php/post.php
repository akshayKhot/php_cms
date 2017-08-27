<?php
    include("header.php");
    $post_id = $_GET["id"];
    $query = "SELECT title, date, content FROM posts WHERE post_id='" . $post_id . "';";
    $result = $db->query($query) or die($db->error);
    $post = mysqli_fetch_assoc($result);
?>

<div class="container single-post">
    <h2><?php echo $post["title"]; ?></h2>
    <div class="author">
        <?php echo $_GET["author"]?>
    </div>
    <div class="content">
        <?php echo $post["content"]; ?>
    </div>
</div>

<?php
    include("footer.php");
?>
