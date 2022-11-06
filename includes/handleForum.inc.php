<?php
    session_start();
    $email = $_SESSION['email'];
    $forumInput = $_POST["mainForum"];

    require_once "dbh.inc.php";
    require_once 'function.inc.php';

    queryUserId($conn, $email, $forumInput);
    header("location: ../mainForum.php?i=$_SESSION[random]");
    exit();

    
