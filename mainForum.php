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
                        <div id="paddingContainer">
                            <div class="emailAndTimeContainer"> 
                                <h6 class="userEmail">'.$questionInfo[$row*3 + 2].'</h5>
                                <h6 class="timeOfQuestion">'.$questionInfo[$row*3 + 1].'</h6>
                            </div>
                            <p>'.$questionInfo[$row*3].'</p>
                        </div>
                        <p id="replyBtn" class="s'.$row.'" onclick="openReplyForum(this.className)"></p>
                        
                        
                    </div>
                ';
            }



        ?>
    </main>
    <div id="formWrapper">
        <div id="textWrapper" onclick="clicked()">
            <h2 id="newQuestionButton">New Question</h2>
        </div>
        <form class='form' action="./includes/handleForum.inc.php" method="post" autocomplete="off">
            <input class="forumInput" id="noWidth" type="text" name="mainForum" placeholder="Enter a Question" required>
        </form>
    </div>
</body>
<script>
    
    var focus = function(){
        return 1;  
    }

    function scrollBottom(){
        const main = document.querySelector("main")
        main.scrollTo(0, main.scrollHeight)

        const reply = document.querySelectorAll("#replyBtn");

        reply.forEach(rep => {
            rep.innerHTML = "Reply";
        })
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
            const forum = document.querySelector(".forumInput");
            forum.style.display = "flex";
            forum.style.width = "40vw";
        }, 300)
        
    }

    function showButton(){
        const button = document.querySelector("#textWrapper");
        const wrapper = document.querySelector("#formWrapper")
        const forum = document.querySelector(".forumInput");

        if (forum === document.activeElement || forum.value !== ""){
            // console.log("true")
            return;
        }

        forum.style.display = "none";
        forum.style.width = "0";
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
    }

    let counter = 1;
    function openReplyForum(className){

        const reply = document.querySelector("." + className);
        if (counter % 2 !== 0){
            window.removeEventListener("click", closeReplyForum);
            counter += 1;
        }
        else{
            counter += 1;
            window.addEventListener("click", closeReplyForum);
        }
        // console.log(window)
        
        const main = document.querySelector("main");
        reply.style.padding = "0.5% 0 3% 1.5%";
        main.style.scrollBehavior = "smooth";
        setTimeout(() => {
            main.scrollBy(0, 30);
        }, 10);
        // console.log(counter)
        displayReplyForm(reply);
    }

    function closeReplyForum(){
        setTimeout(() => {
            const reply = document.querySelectorAll("#replyBtn");
            // console.log(reply)
            reply.forEach(rep => {
                rep.style.padding = "0.5% 0 0.5% 1.5%";
                rep.innerHTML = "Reply";
            })
            const main = document.querySelector("main");
            // reply.style.padding = "0.5% 0.5% 1.5%";
            main.style.scrollBehavior = "smooth";
            setTimeout(() => {
                main.scrollBy(0, -10);
            }, 10);
            window.removeEventListener("click", closeReplyForum);
            console.log(focus);
        }, 10);
        
    }


    function displayReplyForm(className){
        // console.log(className)
        // setTimeout(() => {
            className.innerHTML = "<form action='replyForum.inc.php'><input type='text' class='replyForm' name='replyForum' placeholder='Enter your response' onfocus='focus()' required></form>";
            className.style.padding = "0.5% 0 1% 1.5%"
            // className.style.transition = "0s"
            // return
        // }, 300)
        
    }
</script>
</html>