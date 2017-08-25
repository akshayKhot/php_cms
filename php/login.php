<?php 
    include("header.php");
?>
       <h1 class="text-center">Login</h1>
       <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <h1 class="display-4 m-b-2"> </h1><br/>
        <form method="POST" action="/login">
            <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="text" id="email" placeholder="email" name="email"/>
            </div>
            <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" id="password" placeholder="password" name="password"/>
            </div>
            <div class="text-center">
                <button class="btn btn-primary" type="submit">Log in </button>
            </div>
        </form>
        </div>
 
<?php
    include("footer.php");
?>