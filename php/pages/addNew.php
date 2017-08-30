<?php
    require_once("../common/init.php");
    
    if(isset($_POST["submitBtn"])) {
        
        $title = sanitize($_POST["title"]);
        $date = sanitize($_POST["date"]);
        $content = sanitize($_POST["content"]);
        $user_id = $_SESSION['user_id'];

        $query = "INSERT INTO posts (title, date, author_ID, content)
                    VALUES ('$title', '$date', '$user_id', '$content');";

        if(!( empty($title) || empty($date) || empty($content) )) {
            $db->query($query) or die($db->error);
            redirect_to($HOME_PATH);
        }
        else { 
            echo "<h1>Database Error</h1>";
        }
    } else {
        include(SHARED_PATH . "/header.php");
?>

<h1 class="text-center spaced">Add New Post</h1>
        <form class="form-horizontal" action="" method="post">
            <div class="form-group">
                <label for="titleInput" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="titleInput" placeholder="title" name="title">
                </div>
            </div>
            <div class="form-group">
                <label for="dateInput" class="col-sm-2 control-label">Date</label>
                <div class="col-sm-10">
                <input type="date" class="form-control" id="dateInput" placeholder="date" name="date" value="<?php echo date('Y-m-d');?>">
                </div>
            </div>
            <div class="form-group">
                <label for="contentInput" class="col-sm-2 control-label">Content</label>
                <div class="col-sm-10">
                <textarea type="text" class="form-control" id="contentInput" placeholder="content" rows="10" name="content"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 text-center">
                <button type="submit" name="submitBtn" class="btn btn-success">Add Post</button>
                </div>
            </div>
        </form>
   
<?php
    }
    include(SHARED_PATH . "/footer.php");
?>