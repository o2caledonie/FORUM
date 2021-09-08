<?php require('actions/securityAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>

<body>
    <?php include 'includes/navbar.php'; ?>
    
    <form class="container mt-5" method="POST">

        <?php if (isset($errorMsg)) {
            echo '<p>' . $errorMsg . '</p>';
        } ?>
        <div class="mb-3">
            <label for="exampleInputTitle" class="form-label">Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label for="exampleInputDescription" class="form-label">Description</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputContent" class="form-label">Content</label>
            <textarea class="form-control" name="content"></textarea>
        </div>


        <button type="submit" class="btn btn-primary" name="post">Post</button>

    </form>
</body>

</html>