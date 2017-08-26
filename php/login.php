<?php 

    if((isset($_POST["submitBtn"]))) {
        require 'connect.php';
        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["password"]);

        $query = "SELECT user_id, name, password FROM users WHERE email='$email';";
        
        $result = $db->query($query) or die($db->error);
        $row = mysqli_fetch_assoc($result);
        
        $crypted = $row["password"]; 
        $name = $row["name"]; 
        $user_id = $row["user_id"];

        if(password_verify($password, $crypted)) {
            include("common.php");
            $_SESSION["user_id"] = $user_id;
            header("Location: http://localhost:8888/php_cms/");
        } else {
            echo "user didn't match";
        }
    } else {
        include("header.php");
?>
       <h1 class="text-center">Login</h1>
       <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <h1 class="display-4 m-b-2"> </h1><br/>
        <form action="" method="post">
            <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" id="email" placeholder="email" name="email"/>
            </div>
            <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" id="password" placeholder="password" name="password"/>
            </div>
            <div class="text-center">
                <button class="btn btn-primary" name="submitBtn" type="submit">Log in </button>
            </div>
        </form>
        </div>
 
<?php
    }
    include("footer.php");
?>