<?
    require_once("init.php");
?>

<div class="header clearfix">
    <nav>
      <ul class="nav nav-pills pull-right">
          <?php 
            if(isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
                $user_query = "SELECT name FROM users WHERE user_id='$user_id';";
                $user_result = $db->query($user_query) or die($db->error);
                $user = mysqli_fetch_assoc($user_result);
                echo "<li role='presentation'><a href='http://localhost:8888/php_cms/php/addnew.php'>Add</a></li>";
                echo "<li role='presentation'><a href='http://localhost:8888/php_cms/php/logout.php'>Logout</a></li>";
            } else {
                $user["name"] = "";
                echo "<li role='presentation'><a href='http://localhost:8888/php_cms/php/register.php'>Register</a></li>";
                echo "<li role='presentation'><a href='http://localhost:8888/php_cms/php/login.php'>Login</a></li>";
            }
            ?>        
      </ul>
    </nav>
    <h3 class="text-muted"><a href="http://localhost:8888/php_cms/"><?php echo getFirstName($user["name"]); ?> Blog</a></h3>
</div>

<?php 
    function getFirstName($name) {
        $firstName = explode(" ", $name)[0];
        return $firstName ? $firstName . "'s" : "";
    }
?>