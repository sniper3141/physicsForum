<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $counter = 0;

    // header("location: ./includes/get_task_information.inc.php");
    //starts a session
    session_start();
    //checks the url to see if their is an error key word present
    if (isset($_GET["i"])){

        //if the error key word is present check to see if it is equal to the random number that we created in function.inc.php
        if ($_GET["i"] == $_SESSION['random']){
            echo "<p style='display: none;'>hello world</p>";
        }   
        else{
            header("location: ../signup.php");
            exit();
        }
    }

    //both of these else statements run so that if the user tries to access the main.php without actually logging in then they will automatically
    //be taken back to the index page
    else{
        header("location: ../signup.php");
        exit();
    }

            //NOTE ON THESE IF STATEMENTS: There is no way a user could know the random number and therefore they have no way to access the main.php without logging in


    ?>
    <h1>Forum</h1>
</body>
</html>