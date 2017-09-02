<?php 
    require_once("../common/init.php");
    
    if(isset($_SESSION["user_id"])) {
        if(isset($_GET["deletePost"])) {
            deletePost($_GET["deletePost"]);
            redirect_to($HOME_PATH);
        }
        elseif(isset($_POST["submitBtn"])) {
            $post = [];
            $post['title'] = sanitize($_POST["title"]) ?? '';
            $post['date'] = sanitize($_POST["date"]) ?? '';
            $post['content'] = sanitize($_POST["content"]) ?? '';
            $post['post_id'] = $_GET["editPost"];

            $result = updatePost($post);
            if($result === true) {
                redirect_to($HOME_PATH);
            } else {
                $errors = $result;
            }
        }
        elseif(isset($_POST["cancelBtn"])) {
            redirect_to($HOME_PATH);
        }
        
        include(SHARED_PATH . "/header.php");
        $post = getPostFromId($_GET["editPost"]);
        $phpdate = strtotime( $post['date'] );   
?>

<h1 class="text-center spaced">Update Post</h1>
<?php echo display_errors($errors); ?>
<form class="form-horizontal" action="" method="post">
    <div class="form-group">
        <label for="titleInput" class="col-sm-2 control-label">Title</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="titleInput" value="<?php echo $post['title']; ?>" name="title">
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
        <textarea type="text" class="form-control" id="contentInput" rows="10" name="content"><?php echo $post['content']?></textarea>
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
    include(SHARED_PATH . "/footer.php");
?>