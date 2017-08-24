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

        <div class="text-right">
            <a href="html/addnew.html">
                <button class="btn btn-primary">Add new post</button>
            </a>
        </div>


        <?php
            include("php/fetch.php");
        ?>

        


   </div>

   <script src='script.js'></script>
</body>
</html>



