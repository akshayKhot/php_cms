<!DOCTYPE>
<html>
<head>
   <meta charset='UTF-8'>
   <title>Codes</title>
   <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
   <link rel='stylesheet' href='style.css'>
   </head>
<body>

   <div class="container">

    <h1 class="text-center">Blog</h1>
        <?php
            require 'connect.php';

            $result = $db->query("SELECT * FROM posts") or die($db->error);

            echo "<article>";
            foreach ($result as $row) {
                echo "<div><h3>" . $row['title'] . "</h3></div>";
                echo "<div><p>" . $row['content'] . "</p></div>";
            }
            echo "</article>";

        ?>

   </div>

   <script src='script.js'></script>
</body>
</html>



