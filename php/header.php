<!DOCTYPE>
<html>
<head>
   <meta charset='UTF-8'>
   <title>Codes</title>
   <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
   <link rel='stylesheet' href='http://localhost:8888/php_cms/style.css'>
   <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
   </head>
<body>

   <div class="container">
       <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
              <?php 
                if(isset($_SESSION['user_id'])) {
                    echo "<li role='presentation'><a href='http://localhost:8888/php_cms/php/addnew.php'>Add</a></li>";
                    echo "<li role='presentation'><a href='http://localhost:8888/php_cms/php/logout.php'>Logout</a></li>";
                } else {
                    echo "<li role='presentation'><a href='http://localhost:8888/php_cms/php/register.php'>Register</a></li>";
                    echo "<li role='presentation'><a href='http://localhost:8888/php_cms/php/login.php'>Login</a></li>";
                }
                ?>
            
            
          </ul>
        </nav>
        <h3 class="text-muted"><a href="http://localhost:8888/php_cms/">Blog</a></h3>
      </div>