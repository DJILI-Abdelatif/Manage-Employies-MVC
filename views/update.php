<?php

    use controllers\EmployesController;

    $update = new EmployesController();
    $employe = $update->getOneEmploye();

    if(isset($_POST['submit'])) {
        $employe = $update->updateEmploye();
    }

?>

<main role="main">
    <div class="jumbotron">
        <div class="col-sm-8 mx-auto">
            <h1 class="text-center">Welcom Update Page</h1> 
        </div>
    </div>
</main>
<div class="col-md-8 mx-auto">
<form action="update" method="post">
    <input type="hidden" name="id_employe" value="<?php echo isset($_POST['submit']) ? '' : $employe['id'] ?>" >
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" value="<?php echo isset($_POST['submit']) ? '' : $employe['name'] ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" value="<?php echo isset($_POST['submit']) ? '' : $employe['email'] ?>" required>
    </div>
    <button type="submit" name="submit" class="btn btn-info btn-block">send</button>
</form>
</div>