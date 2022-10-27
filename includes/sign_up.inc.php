<?php

    //checks to see if the method for submitting the form is submit
    if (isset($_POST["submit"])) {
    
        //assigns the data entered in the form to variables
        $username = $_POST["uname"];
        $email = $_POST["mail"];
        $pwd = $_POST["password"];
        $pwdRepeat = $_POST["confirm-password"];


        //links this file to the files in quotes
        require_once 'dbh.inc.php';
        require_once 'function.inc.php';


        //error handling taking the user back to the index page with an error in the url (check the function.inc.php for information about the functions)
        if (emptyInputSignup($username, $email, $pwd, $pwdRepeat) !== false) {
            header("location: ../signup.php?error=emptyinput");
            exit();
        }
        if (invalidUid($username) !== false) {
            header("location: ../signup.php?error=invaliduid");
            exit();
        }
        if (invalidEmail($email) !== false) {
            header("location: ../signup.php?error=invalidemail");
            exit();
        }
        if (pwdMatch($pwd, $pwdRepeat) !== false) {
            header("location: ../signup.php?error=passwordsdontmatch");
            exit();
        }
        if (uidExists($conn, $username, $email) !== false) {
            header("location: ../signup.php?error=usernametaken");
            exit();
        }
        if (checkEmail($email) !== false){
            header("location: ../signup.php?error=emailNotAcceptable");
            exit();
        }

        

        createUser($conn, $username, $email, $pwd);

        

    }
    else{
        header("location: ../signup.php");
        exit();
    }
?>