<?
    require_once(COMMON_PATH . "/init.php");
?>

<div class="header clearfix">
    
    <nav>
      <ul class="nav nav-pills pull-right">
          <?php 
            if(isset($_SESSION['user_id'])) {
                $user = getUserFromId($_SESSION['user_id']);
                echo "<li role='presentation'><a href='$SRC_PATH/pages/myAccount.php'>My Account</a></li>";
                echo "<li role='presentation'><a href='$SRC_PATH/pages/addnew.php'>Add</a></li>";
                echo "<li role='presentation'><a href='$SRC_PATH/pages/logout.php'>Logout</a></li>";
            } else {
                $user["name"] = "";
                echo "<li role='presentation'><a href='$SRC_PATH/pages/register.php'>Register</a></li>";
                echo "<li role='presentation'><a href='$SRC_PATH/pages/login.php'>Login</a></li>";
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