<?php

    //checks to see if the method for submitting the form is submit
    if (isset($_POST["submit"])) {
    
        //assigns the data entered in the form to variables
        $email = $_POST["mail"];
        $pwd = $_POST["password"];
        $pwdRepeat = $_POST["confirm-password"];


        //links this file to the files in quotes
        require_once 'dbh.inc.php';
        require_once 'function.inc.php';


        //error handling taking the user back to the index page with an error in the url (check the function.inc.php for information about the functions)
        if (emptyInputSignup($email, $pwd, $pwdRepeat) !== false) {
            header("location: ../signup.php?error=emptyinput");
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
        if (uidExists($conn, $email) !== false) {
            header("location: ../signup.php?error=emailtaken");
            exit();
        }
        if (checkEmail($email) !== false){
            header("location: ../signup.php?error=emailNotAcceptable");
            exit();
        }

        

        createUser($conn, $email, $pwd);

        

    }
    else{
        header("location: ../signup.php");
        exit();
    }
?>