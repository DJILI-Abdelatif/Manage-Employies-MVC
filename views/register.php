<?php

    use controllers\UsersController;
    use core\Alert;

    $user = new UsersController();
    $user->createUser();

?>

<main role="main">
    <div class="jumbotron">
        <div class="col-sm-8 mx-auto">
            <h1 class="text-center">Welcom Register Page</h1> 
            <div class="text-center mt-3"><?php Alert::getAlert(); ?></div>
        </div>
    </div>
</main>
<div class="col-md-8 mx-auto">
<form method="POST">
    <div class="form-group">
        <label for="fullname">Fullname</label>
        <input type="text" class="form-control" name="fullname" placeholder="Your Fullname" required>
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Your Username" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
    </div>
    <div class="form-group">
        <label for="password">Confirm Password</label>
        <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password" required>
    </div>
    <input type="submit" name="register" value="Register" class="btn btn-outline-info btn-block">
</form>
<span>
    If you have account than 
    <a href="<?php echo BASE_URL ?>login">Login</a>
</span> 
</div>