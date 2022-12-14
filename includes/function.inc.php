<?php


//function for checking if all sign up fields are filled out
function emptyInputSignup($email, $pwd, $pwdRepeat) {
    $result;

    //checks all fields
    if (empty($email) || empty($pwd) || empty($pwdRepeat)) {
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
function uidExists($conn, $email) {

    //sets the sql statement to check all the items in the username field 
    $sql = "SELECT * FROM users WHERE usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    //looks through the database and checks to see if the inputed username is different to all usernames already in the database
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
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
function createUser($conn, $email, $pwd) {

    //sets up the sql statement with placeholder values at the moment so that our database cannot be 'corrupted' by users
    $sql = "INSERT INTO users (usersEmail, usersPwd) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);

    //error message if something fails
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }


    //encrypts the password
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ss", $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    //takes user to the main page
    $uidExists = uidExists($conn, $email);
    session_start();
    // $_SESSION["userid"] = $uidExists["usersId"];
    // $_SESSION["useruid"] = $uidExists["usersUid"];
    $_SESSION["random"] = rand();
    $_SESSION["email"] = $email;
    header("location: ../mainForum.php?i=$_SESSION[random]");
    exit();
}

//function for validating all the fields in the login form, ensuring that all fields are filled out
function emptyInputLogin($email, $pwd) {
    $result;
    if (empty($email) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}


//function for logging in the user
function loginUser($conn, $email, $pwd) {

    //recalls the previous function we have created which checks to see if the email exists
    $uidExists = uidExists($conn, $email);


    //if details cannot be found in the database the user is taken back to the index page with the error wrong login in the url
    if ($uidExists === false) {
        header("location: ../signup.php?error=wronglogin");
        exit();
    }

    //checks to see if the password entered matches the password of the username entered
    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../signup.php?error=wronglogin");
        exit();
    }

    //if password & username are both correct take user to main.php
    else if ($checkPwd === true) {
        session_start();
        // $_SESSION["userid"] = $uidExists["usersId"];
        // $_SESSION["useruid"] = $uidExists["usersUid"];
        $_SESSION["random"] = rand();
        $_SESSION["email"] = $email;

        //takes user to the main page
        header("location: ../mainForum.php?i=$_SESSION[random]");
        exit();
    }
}

function queryUserId($conn, $email, $question){

    $sql = "SELECT id FROM users WHERE usersEmail = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt); 
    $data = mysqli_fetch_assoc($resultData);
    // print_r($data["id"]);
    $dataOutOfArray = $data["id"];
    session_start();
    $_SESSION["emailId"] = $dataOutOfArray;
    mysqli_stmt_close($stmt);
    
    addPrimaryQuestion($conn, $dataOutOfArray, $question);
}

function addPrimaryQuestion($conn, $emailId, $question) {
    
    // sets up the sql statement with placeholder values at the moment so that our database cannot be 'corrupted' by users
    $sql = "INSERT INTO primaryforum (questionText, senderId) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);

    //error message if something fails
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../mainForum.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $question, $emailId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../mainForum.php?i=$_SESSION[random]");
    exit();
}

function getInfo($conn){

    $sqlQuery = "SELECT questionText, timeOfSend, usersEmail FROM primaryForum, users WHERE users.id = primaryforum.senderId;";
    $stmt = mysqli_stmt_init($conn);

    //error message if something fails
    if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
        //takes user to the main page
        $_SESSION["random"] = rand();
        header("location: ../mainForum.php?i=$_SESSION[random]&error=stmtfailed");
        exit();
    }


    mysqli_stmt_execute($stmt);

    $data = array();

    $result = mysqli_stmt_get_result($stmt);
    
    // print_r($result);
    

    while ($row = mysqli_fetch_object($result)) {
        foreach ($row as $r) {
            // print($r);
            $new = array_push($data, $r);
        }
    }

    // print_r($data);
    return $data;
}


function queryInfoForReply($reply, $questionId, $conn){
    session_start();
    $email = $_SESSION['email'];

    $sql = "SELECT id FROM users WHERE usersEmail = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt); 
    $data = mysqli_fetch_assoc($resultData);
    // print_r($data["id"]);
    $dataOutOfArray = $data["id"];
    $emailId = $dataOutOfArray;
    mysqli_stmt_close($stmt);
    // print_r($emailId);
    addReply($emailId, $reply, $questionId, $conn);
}


function addReply($emailId, $reply, $questionId, $conn){
    $sql = "INSERT INTO replyforum (replyContent, mainQuestionId, replyUsersId) VALUES (?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);

    //error message if something fails
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../mainForum.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sii", $reply, $questionId, $emailId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../mainForum.php?i=$_SESSION[random]");
    exit();

}



function getReplyInfo($conn){

    $sqlQuery = "SELECT replyContent, timeOfReply, questionId, usersEmail FROM replyforum, primaryforum, users WHERE replyforum.mainQuestionId = primaryforum.questionId AND replyforum.replyUsersId = users.id;";
    $stmt = mysqli_stmt_init($conn);

    //error message if something fails
    if (!mysqli_stmt_prepare($stmt, $sqlQuery)) {
        //takes user to the main page
        $_SESSION["random"] = rand();
        header("location: ../mainForum.php?i=$_SESSION[random]&error=stmtfailed");
        exit();
    }


    mysqli_stmt_execute($stmt);

    $data = array();

    $result = mysqli_stmt_get_result($stmt);
    
    // print_r(mysqli_fetch_object($result));
    

    while ($row = mysqli_fetch_object($result)) {
        foreach ($row as $r) {
            // print($r);
            $new = array_push($data, $r);
        }
    }

    // print_r($data);
    return $data;
}