<?php 
    require("init.php");
    
    if(isset($_SESSION["user_id"])) {
        if(isset($_GET["deletePost"])) {
            $deleteQuery = "DELETE FROM posts WHERE post_id=$_GET[deletePost]";
            $db->query($deleteQuery) or die($db->error);
            header("Location: http://localhost:8888/php_cms/");
        }
        elseif(isset($_POST["submitBtn"])) {

            $title = htmlspecialchars(mysqli_real_escape_string($db, $_POST["title"]));
            $date = htmlspecialchars($_POST["date"]);
            $content = htmlspecialchars(mysqli_real_escape_string($db, $_POST["content"]));

            $updateQuery = "UPDATE posts SET title='$title', date='$date', content='$content' WHERE post_id=$_GET[editPost];";
            $db->query($updateQuery) or die($db->error);
            header("Location: http://localhost:8888/php_cms/");
        }
        elseif(isset($_POST["cancelBtn"])) {
            header("Location: http://localhost:8888/php_cms/");
        }
        elseif(isset($_GET["editPost"])) {
            include("header.php");
            include("nav.php");
            $postQuery = "SELECT title, date, content FROM posts WHERE post_id='$_GET[editPost])';";
            $result = $db->query($postQuery) or die($db->error);
            $row = mysqli_fetch_assoc($result);
            $phpdate = strtotime( $row['date'] );   
?>

<h1 class="text-center spaced">Update Post</h1>
        <form class="form-horizontal" action="" method="post">
            <div class="form-group">
                <label for="titleInput" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="titleInput" value="<?php echo $row['title']; ?>" name="title">
                </div>
            </div>
            <div class="form-group">
                <label for="dateInput" class="col-sm-2 control-label">Date</label>
                <div class="col-sm-10">
                <input type="date" class="form-control" id="dateInput" value="<?php echo date("Y-m-d", $phpdate); ?>" name="date">
                </div>
            </div>
            <div class="form-group">
                <label for="contentInput" class="col-sm-2 control-label">Content</label>
                <div class="col-sm-10">
                <textarea type="text" class="form-control" id="contentInput" rows="10" name="content"><?php echo $row['content']?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 text-center">
                <button type="submit" name="submitBtn" class="btn btn-success">Update</button>
                <button name="cancelBtn" class="btn btn-danger">Cancel</button>
                </div>
            </div>
        </form>
   


<?php
        }
    }
    include "footer.php";
?>