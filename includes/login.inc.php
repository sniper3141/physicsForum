<?php

//checks if the form method is submit
if (isset($_POST["submit"])) {

    //sets the username or email entered in the form to a variable, same with password
    $email = $_POST["mail"];
    $pwd = $_POST["password"];

    //links this file to dbh.inc.php and function.inc.php
    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

    //calls the function in function.inc.php to check if all fields are filled out
    if (emptyInputLogin($email, $pwd) !== false) {
        header("location: ../index.php?error=loginemptyinput");
        exit();
    }

    //calls the login function to either login the user or provide an error
    loginUser($conn, $email, $pwd);
}

//if the form method is not submit i.e a user tries to change the url to access a page that they should not have access to 
//then send them back to the index page
else {
    header("location: ../index.php");
    exit();
}