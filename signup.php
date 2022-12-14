<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signupPage3.css"><link>
    <script src="Subpage.js"></script>
    <title>Document</title>
    <style>
        .hidden{
            display: none;
        }
    </style>
    <script>

        function checkPage(){
            document.querySelector("#signUpHalf").classList.add("left");
            if (localStorage.getItem("changePage") == "login"){
                document.querySelector("#signUpHalf").classList.add("right");
                changeMode();
            }
        }

        function storePage(){
            if (document.querySelector(".redirect").classList.contains("signup")){
                localStorage.setItem("changePage", "signup");
            }
            else if (document.querySelector(".redirect").classList.contains("login")){
                localStorage.setItem("changePage", "login");
            }
        }

        
        
    </script>
    
</head>
<body onload="checkPage()">
    <section id="overlay"></section>
    <section id="loginOverlay"></section>
    <img src="SignUpImg3.png" id="loginImg">
    <section id="signUpWrapper">
        <section id="signUpHalf">
            <h1 id="welcomeTitle">Welcome</h1>
            <h3 id="welcomeInfo">Create an account to join a community of physicists</h3>
            <h1 class="title signup" id="formTitle">Sign Up</h1>
            <form class='form signup' action="./includes/sign_up.inc.php" method="post" autocomplete="off">

                <div>
                    <span class="inputTitle" >Email</span>
                    <input type="email" name="mail" class="input" id="email" onfocusout="checkValid()" required>
                    <h4 class="hidden" id="errorText">Invalid Email</h4> 
                    <i></i>
                </div>

                <div>
                    <span class="inputTitle">Password</span>
                    <input type="password" name="password" class="input password" id="pass" onfocusout="validPass()" required>
                    <h4 id="errorText" class="hidden passNotLong">Password Must be at Least 8 characters</h4>
                    <i></i>
                </div>

                <div>
                    <span class="confirmPasswordText inputTitle">Confirm Password</span>
                    <input id="confirmPass" type="password" name="confirm-password" class="confirmPassword input password" id="confirmPass" onfocusout="validPass()" required>
                    <h4 id="errorText" class="hidden passNotMatch">Passwords Don't Match</h4>
                    <h4 id="errorText" class="hidden incorrectLogin" id="incorrect">Incorrect Email or Password</h4>
                    <i></i>
                </div>

                <input type="submit" name="submit" placeholder="Submit" class="submit sign-up-button" value="Sign Up" disabled>
                



            </form>
            <p class='redirect signup' id="secondCTA" onclick="changeMode(); hideError()">Already a User? Login</p>
        </section>
    </section>
    <section id="imgSection">
        <section id="overlay"></section>
        <img src="SignUpImg2.png" id="signUpImg">
    </section>
</body>


<script>
    function incorrectLogin(){
            document.addEventListener("DOMContentLoaded", () => {
                document.querySelector(".incorrectLogin").classList.remove("hidden");
            })  
        }

        function hideError(){
            document.querySelector(".incorrectLogin").classList.add("hidden");
        }
</script>
<?php
        if (isset($_GET["error"])){
            if ($_GET["error"] == "wronglogin"){
                echo '<script type="text/javascript">incorrectLogin();</script>';
            }
        }
            
?>
<script src="./javascript/signupPage3.js"></script>
</html>