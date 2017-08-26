<?php 
    include("header.php");
    if((isset($_POST["submitBtn"]))) {
        require 'connect.php';
        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["password"]);

        $query = "SELECT name, password FROM users WHERE email='$email';";
        
        $result = $db->query($query) or die($db->error);
        $row = mysqli_fetch_assoc($result);
        $crypted = $row["password"];
        if(password_verify($password, $crypted)) {
            $name = $row['name'];
            echo "Welcome, $name";
        } else {
            echo "user didn't match";
        }
    } else {
?>
       <h1 class="text-center">Login</h1>
       <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <h1 class="display-4 m-b-2"> </h1><br/>
        <form action="" method="post">
            <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="text" id="email" placeholder="email" name="email"/>
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