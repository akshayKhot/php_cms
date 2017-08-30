<?php
    require_once("../common/init.php");
    include(SHARED_PATH . "/header.php");
    $post = getPostFromId($_GET["id"]);
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
