<?php require('actions/loginAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>

<body>
    <form class="container mt-5" method="POST">

        <?php if (isset($errorMsg)) {
            echo '<p>' . $errorMsg . '</p>';
        } ?>
        <div class="mb-3">
            <label for="exampleInputPseudo" class="form-label">Pseudo</label>
            <input type="text" class="form-control" name="pseudo">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>

        <button type="submit" class="btn btn-primary" name="validate">Log in</button>
        <a href="signup.php"><p>I'm new. Create an account</p></a>

    </form>

</body>

</html>