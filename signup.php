<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signupPage2.css"><link>
    <script src="Subpage.js"></script>
    <title>Document</title>
    <style>
        .hidden{
            display: none;
        }
    </style>
    <script>

        function checkPage(){
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
                    <span class="inputTitle">Email</span>
                    <input type="email" name="mail" class="input" required> 
                    <i></i>
                </div>

                <div>
                    <span class="inputTitle">Password</span>
                    <input type="password" name="password" class="input" required>
                    <i></i>
                </div>

                <div>
                    <span class="confirmPasswordText inputTitle">Confirm Password</span>
                    <input id="confirmPass" type="password" name="confirm-password" class="confirmPassword input" required>
                    <i></i>
                </div>

                <input type="submit" name="submit" placeholder="Submit" class="submit sign-up-button" value="Sign Up">
                



            </form>
            <p class='redirect signup' id="secondCTA" onclick="changeMode()">Already a User? Login</p>
        </section>
    </section>
    <section id="imgSection">
        <section id="overlay"></section>
        <img src="SignUpImg2.png" id="signUpImg">
    </section>
</body>

<script src="./javascript/signupPage2.js"></script>
</html>