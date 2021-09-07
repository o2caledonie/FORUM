<?php
require('actions/database.php');

//Validate form
if (isset($_POST['validate'])) {

    //Check if all the fields are complete
    if (!empty($_POST['pseudo']) and !empty($_POST['password'])) {

        //User's data 
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = htmlspecialchars($_POST['password']);

        //Check if user already exists (correct username)
        $checkIfUserExists = $bdd->prepare('SELECT id, user_name, password FROM users WHERE user_name = ?');
        $checkIfUserExists->execute(array($user_pseudo));

        if ($checkIfUserExists->rowCount() > 0) {
            $usersInfo = $checkIfUserExists->fetch();

            //Check if password is correct
            if (password_verify($user_password, $usersInfo['password'])) {

                //User authentification
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfo['id'];
                $_SESSION['pseudo'] = $usersInfo['user_name'];
                $_SESSION['firstname'] = $usersInfo['first_name'];
                $_SESSION['lastname'] = $usersInfo['last_name'];

                //Homepage direction
                header('Location: index.php');

            } else {
                $errorMsg = "Please check your password ...";
            }
        } else {
            $errorMsg = "Please check your username ...";
        }
    } else {
        $errorMsg = "All the fields are required";
    }
}
