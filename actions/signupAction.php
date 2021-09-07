<?php

require('actions/database.php');

//Validate form
if (isset($_POST['validate'])) {

    //Check if all the fields are complete
    if (!empty($_POST['pseudo']) and !empty($_POST['firstname']) and !empty($_POST['lastname']) and !empty($_POST['password'])) {
        
        //User's data 
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt pw with default algorythm

        //Check if user already exists
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT user_name FROM users WHERE user_name = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        if ($checkIfUserAlreadyExists->rowCount() == 0) {

            //Insert user in db
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(user_name, first_name, last_name, password) VALUES (?, ?, ?, ?)');
            $insertUserOnWebsite->execute(array($user_pseudo, $user_firstname, $user_lastname, $user_password));

            $getInfoOfThiseUserReq = $bdd->prepare('SELECT id, user_name, first_name, last_name FROM users WHERE user_name = ? AND first_name = ? AND last_name = ?');
            $getInfoOfThiseUserReq->execute(array($user_pseudo, $user_firstname, $user_lastname));

            $usersInfo = $getInfoOfThiseUserReq->fetch();

            //User authentification
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfo['id'];
            $_SESSION['pseudo'] = $usersInfo['user_name'];
            $_SESSION['firstname'] = $usersInfo['first_name'];
            $_SESSION['lastname'] = $usersInfo['last_name'];

            //Homepage direction
            header('Location:index.php');


        } else {
            $errorMsg = "This user already exists";
        }
    } else {
        $errorMsg = "All the fields are required";
    }
}
