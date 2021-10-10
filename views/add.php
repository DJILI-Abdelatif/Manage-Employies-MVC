<?php

    use controllers\EmployesController;
    use core\Alert;

    if(isset($_POST['submit'])) {
        $add = new EmployesController();
        $add->addEmploye();
    }

?>

<main role="main">
    <div class="jumbotron">
        <div class="col-sm-8 mx-auto">
            <h1 class="text-center">Welcom Add Page</h1>
        </div>
    </div>
</main>
<div class="col-md-8 mx-auto">
    <form action="add" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <button type="submit" name="submit" class="btn btn-info btn-block">send</button>
    </form>
</div>