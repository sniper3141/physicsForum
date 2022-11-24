<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/forum.css" rel="stylesheet"></link>
    <title>Document</title>
</head>
<body onload="scrollBottom()">
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
    <main>
        <!-- <h1>Welcome To ESMS's Physics Forum</h1> -->


        <?php
            require_once './includes/dbh.inc.php';
            require_once './includes/function.inc.php';

            $questionInfo = getInfo($conn);

            for ($row = 0; $row < sizeof($questionInfo)/3; $row++){
                echo '
                    <div class="forumItem">
                        <div class="emailAndTimeContainer"> 
                            <h5 class="userEmail">'.$questionInfo[$row*3 + 2].'</h5>
                            <h6 class="timeOfQuestion">'.$questionInfo[$row*3 + 1].'</h6>
                        </div>
                        <p>'.$questionInfo[$row*3].'</p>
                        
                        
                    </div>
                ';
            }



        ?>
    </main>
    <div id="formWrapper">
        <div id="textWrapper" onclick="clicked()">
            <h2 id="newQuestionButton">New Question</h2>
        </div>
        <form class='form signup' id="hidden" action="./includes/handleForum.inc.php" method="post" autocomplete="off">
            <input type="text" name="mainForum" required>
        </form>
    </div>
</body>
<script>
    function scrollBottom(){
        const main = document.querySelector("main")
        main.scrollTo(0, main.scrollHeight)
    }

    function clicked(){
        const button = document.querySelector("#textWrapper");
        const wrapper = document.querySelector("#formWrapper")
        button.style.color = "rgb(255, 255, 255, 0)";
        setTimeout(() => {
            button.style.width = "0";
            button.style.height = "0";
            wrapper.addEventListener("click", showButton);
        }, 100)
        setTimeout(() => {
            button.style.display = "none";
        }, 300)
        
        // console.log("1")
    }

    function showButton(){
        const button = document.querySelector("#textWrapper");
        const wrapper = document.querySelector("#formWrapper")
        if (button.style.display != "none"){
            setTimeout(() => {
                button.style.display = "flex";
                button.style.width = "15rem";
                button.style.height = "3.5rem"
                button.style.color = "rgb(255, 255, 255, 1)";
                return;
            }, 300)
        }
        button.style.display = "flex";
        setTimeout(() => {
            button.style.width = "15rem";
            button.style.height = "3.5rem";
        }, 1);
        setTimeout(() => {
            button.style.color = "rgb(255, 255, 255, 1)";
            wrapper.removeEventListener("click", showButton);
        }, 100)
        console.log("2")
    }
</script>
</html>