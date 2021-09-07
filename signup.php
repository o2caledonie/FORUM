<?php require('actions/signupAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>

<body>
    <form class="container mt-5" method="POST">

    <?php if(isset($errorMsg)){echo '<p>'.$errorMsg.'</p>'; } ?>
        <div class="mb-3">
            <label for="exampleInputPseudo" class="form-label">Pseudo</label>
            <input type="text" class="form-control" name="pseudo">
        </div>
        <div class="mb-3">
            <label for="exampleInputFirstName" class="form-label">First name</label>
            <input type="text" class="form-control" name="firstname">
        </div>
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Last name</label>
            <input type="text" class="form-control" name="lastname">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>

        <button type="submit" class="btn btn-primary" name="validate">Sign Up</button>
    </form>

</body>

</html>