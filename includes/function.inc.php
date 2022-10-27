<?php


//function for checking if all sign up fields are filled out
function emptyInputSignup($username, $email, $pwd, $pwdRepeat) {
    $result;

    //checks all fields
    if (empty($username) || empty($email) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

//function for ensuring a valid username
function invalidUid($username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

//function for checking if the email is valid
function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

//function for ensuring that the password and the comfirm password fields are the same
function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}


//function for ensure that a username has not already been taken
function uidExists($conn, $username, $email) {

    //sets the sql statement to check all the items in the username field 
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    //looks through the database and checks to see if the inputed username is different to all usernames already in the database
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function checkEmail($email){
    if (!str_contains($email, "@esms.org.uk")){
        return true;
    }
    else{
        return false;
    }

}


//function that adds a users information to the database
function createUser($conn, $username, $email, $pwd) {

    //sets up the sql statement with placeholder values at the moment so that our database cannot be 'corrupted' by users
    $sql = "INSERT INTO users (usersUid, usersEmail, usersPwd) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    //error message if something fails
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }


    //encrypts the password
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss",  $username, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    //takes user to the main page
    $uidExists = uidExists($conn, $username, $username);
    session_start();
    $_SESSION["random"] = rand();
    $_SESSION["userid"] = $uidExists['usersId'];
    $_SESSION["useruid"] = $username;
    header("location: ../signup.php?i=$_SESSION[random]");
    exit();
}