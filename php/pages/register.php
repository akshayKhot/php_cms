<?php 
    require_once("../common/init.php");
    if(isset($_POST["submitBtn"])) {
        $name = sanitize($_POST["name"]);
        $email = sanitize($_POST["email"]);
        $password = sanitize($_POST["password"]);
        $crypted = password_hash($password, PASSWORD_DEFAULT);
        $matches = password_verify("temp", $crypted);

        addUser($name, $email, $crypted);
        redirect_to("$SRC_PATH/pages/login.php");
        
    } else {
        include(SHARED_PATH . "/header.php");
?>
       <h1 class="text-center">Register</h1>
        <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <h1 class="display-4 m-b-2"></h1><br/>
        <!-- register form-->
        <form method="POST" action="" method="post" onsubmit="return isValidRegister()">
            <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control" id="name" type="text" placeholder="enter full name" name="name"/>
            </div>
            <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" id="email" type="email" placeholder="name@email.com" name="email"/>
            </div>
            <div class="form-group">
            <label for="pw">Password:</label>
            <input class="form-control" id="pw" type="password" name="password"/>
            </div>
            <div class="form-group">
            <label for="pw2">Confirm Password:</label>
            <input class="form-control" id="pw2" type="password" name="confirmPassword"/>
            </div>
            <div class="text-center">
            <button class="btn btn-primary" name="submitBtn" type="submit">Sign up</button>
            </div>
        </form>
        </div>
    </div>
    </div>

<?php
    }
    include(SHARED_PATH . "/footer.php");
?>