<?php

    use controllers\EmployesController;
    use controllers\UsersController;
    use core\Alert;

    $data = new EmployesController();
    $user = new UsersController();
    if(isset($_POST['findEmploye'])) {
        $employes = $data->findEmploye();
    } else {
        $employes = $data->getAllEmployes();
    }

?>

<main role="main">
    <div class="jumbotron">
        <div class="col-sm-8 mx-auto">
            <h1 class="text-center">Welcom Home Page</h1>
            <p class="text-center"><i class="fa fa-user"></i><?php echo ' '.$_SESSION['username'] ?></p>
            <form action="home" method="POST" class="d-flex flex-row">
                <input type="text" name="name" class="form-control" placeholder="Search">
                <button type="submit" name="findEmploye" class="btn btn-danger ml-1">Search</button>
            </form>  
            <div class="text-center mt-3"><?php Alert::getAlert(); ?></div>
        </div>
    </div>
</main>
<div class="table-responsive">
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Control</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($employes as $employe): ?>
        <tr>
            <td><?php echo $employe['id']; ?></td>
            <td><?php echo $employe['name']; ?></td>
            <td><?php echo $employe['email']; ?></td>
            <td class="d-flex flex-row">
                <form action="update" method="post" class="mr-2">
                    <input type="hidden" name="id_employe" value="<?php echo $employe['id'] ?>">
                    <button type="submit" name="updateEmploye" class="btn btn-info">
                        <i class="fa fa-edit"></i>
                    </button>
                </form>
                <form action="delete" method="post" class="ml-2">
                    <input type="hidden" name="id_employe" value="<?php echo $employe['id'] ?>">
                    <button type="submit" name="deleteEmploye" class="btn btn-warning">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </div>
            </td>
        </tr>
        <?php endforeach; ?>            
    </tbody>
</table>
</div>