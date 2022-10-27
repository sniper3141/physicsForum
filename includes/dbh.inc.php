<?php

//setting information about the database to variables
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "physicsforum";


//connecting to the database
$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);


// If the conection fails the die
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}