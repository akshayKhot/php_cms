<?php
    require_once("../common/init.php");
    include(SHARED_PATH . "/header.php");

    if(isset($_SESSION["user_id"])) {
        $user = getUserFromId($_SESSION["user_id"]);
    }
    
?>

    <form class="form-horizontal addNewForm" action="" method="post">
        <div class="form-group">
            <label for="editNameInput" class="col-sm-4 control-label">Name</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" id="editNameInput" placeholder="Edit Name" value="<?php echo sanitize($user['name'] ?? '')?>" name="editName">
            </div>
        </div>
        <div class="form-group">
            <label for="editEmailInput" class="col-sm-4 control-label">Email</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" id="editEmailInput" placeholder="email" name="editEmail" value="<?php echo sanitize($user['email'] ?? '')?>">
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10 text-center">
            <button type="submit" name="submitBtn" class="btn btn-success">Update</button>
            </div>
        </div>
    </form>

<?php
    include(SHARED_PATH . "/footer.php");
?>