<?php 
    require_once("../common/init.php");
    
    if(isset($_POST["submitBtn"])) {
        
        $new_user = [];
        $new_user["name"] = sanitize($_POST["user_name"]) ?? "";
        $new_user["email"] = sanitize($_POST["email"]) ?? "";
        $new_user["password"] = sanitize($_POST["password"]) ?? "";
        $new_user["confirmPassword"] = sanitize($_POST["confirmPassword"]) ?? "";
        
        $result = addUser($new_user);
        if($result === true) {
            redirect_to("$SRC_PATH/pages/login.php");
        } else {
            $errors = $result;
        }
    }
    include(SHARED_PATH . "/header.php");
?>

<h1 class="text-center">Register</h1>
<?php echo display_errors($errors)?>
<div class="row">
    <div class="col-md-6 col-md-offset-3"><br/>
        <form method="POST" action="" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input class="form-control" id="name" type="text" placeholder="enter full name" value="<?php echo sanitize($new_user['name'] ?? ''); ?>" name="user_name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input class="form-control" id="email" type="email" placeholder="name@email.com" value="<?php echo sanitize($new_user['email'] ?? ''); ?>" name="email">
            </div>
            <div class="form-group">
                <label for="pw">Password:</label>
                <input class="form-control" id="pw" type="password" name="password">
            </div>
            <div class="form-group">
                <label for="pw2">Confirm Password:</label>
                <input class="form-control" id="pw2" type="password" name="confirmPassword">
            </div>
            <div class="text-center">
                <button class="btn btn-primary" name="submitBtn" type="submit">Sign up</button>
            </div>
        </form>
    </div>
</div>
</div>

<?php
    include(SHARED_PATH . "/footer.php");
?>