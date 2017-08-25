<?php 
    include("header.php");
?>
       <h1 class="text-center">Register</h1>
        <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <h1 class="display-4 m-b-2"></h1><br/>
        <!-- register form-->
        <form method="POST" action="/register">
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
            <button class="btn btn-primary" type="submit">Sign up</button>
            </div>
        </form>
        </div>
    </div>
    </div>

<?php
    include("footer.php");
?>