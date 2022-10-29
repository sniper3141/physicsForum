<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./javascript/signupPage.js"></script>
    <title>Document</title>
    <style>
        .hidden{
            display: none;
        }
    </style>
    <script>
        function checkPage(){
            if (localStorage.getItem("changePage") == "login"){
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
    <h1 class="title signup">Sign Up</h1>
    <form class='form signup' action="./includes/sign_up.inc.php" method="post" autocomplete="off">

        <div>
            <input type="email" name="mail" required>
            <span>Email</span>
            <i></i>
        </div>

        <div>
            <input type="password" name="password" required>
            <span>Password</span>
            <i></i>
        </div>

        <div>
            <input id="confirmPass" type="password" name="confirm-password" class="confirmPassword" required>
            <span class="confirmPasswordText">Confirm Password</span>
            <i></i>
        </div>

        <input type="submit" name="submit" placeholder="Submit" class="submit sign-up-button">
        <p class='redirect signup' onclick="changeMode()">Already have an account?</p>


        
    </form>
</body>
<script src="Subpage.js"></script>
</html>