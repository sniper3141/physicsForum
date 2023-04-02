<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexMediaQuery.css">
    
    <link rel="import" href="Unit1.php">
    <title>Physics Posters</title>
    <style>
        #div1{
            width: 33.333%;
            height: 100%;
            /* background-image: url("Gravitation-and-motion.png"); */
            transition: width 500ms ease-in-out;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            background-repeat: no-repeat;
            /* background-attachment: fixed; */
            background-position: center;
        }
        #div2{
            width: 33.333%;
            height: 100%;
            /* background-image: url("Particles-and-Waves.png"); */
            background-position: center;
            transition: width 500ms ease-in-out;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            background-repeat: no-repeat;
            /* background-attachment: fixed; */
            background-position: center;
            

        }
        #div3{
            width: 33.333%;
            height: 100%;
            transition: width 500ms ease-in-out;
            /* background-image: url("Electromagnetism-Colage.png"); */
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            background-repeat: no-repeat;
            /* background-attachment: fixed; */
            background-position: center;

        }
        body{
            width: 100vw;
            height: 100vh;
            margin: 0px;
            display: flex;
            align-items: flex-start;
        }
        #div1:hover{
            width: 75%;
            filter: drop-shadow(0 0 0.75rem black);
            z-index: 2;
        }
        #div2:hover{
            width: 75%;
            filter: drop-shadow(0 0 0.75rem black);
            z-index: 2;
        }
        #div3:hover{
            width: 75%;
            background-color: rgba(255, 0, 0, 0);
            filter: drop-shadow(0 0 0.75rem black);
        }
        #overlay3{
            background-color: black;
            opacity: 80%;
            width: 100%;
            height: 100%;
            position: absolute;
            transition: opacity 500ms ease-in-out;
        }
        #overlay3:hover{
            opacity: 10%;
        }

        #overlay2{
            background-color: black;
            opacity: 80%;
            width: 100%;
            height: 100%;
            position: absolute;
            transition: opacity 500ms ease-in-out;
        }
        #overlay2:hover{
            opacity: 10%;
        }

        #overlay1{
            background-color: black;
            opacity: 80%;
            width: 100%;
            height: 100%;
            position: absolute;
            transition: opacity 500ms ease-in-out;
        }
        #overlay1:hover{
            opacity: 10%;
        }
        h1{
            z-index: 1;
            color: white;
            font-size: 2.438rem;
            font-family: Arial, Helvetica, sans-serif;
            padding: 10px;
            background-color: rgba(16, 15, 15, 0);
            border-radius: 5px;
            
        }
        

    </style>

    <script>
        function backgroundOn(headerId){
            const element = document.getElementById(headerId)
            element.style.backgroundColor = "rgba(16, 15, 15, 1)";
            element.style.transition = "background-color 500ms ease-in-out";
        }
        function backgroundOff(headerId){
            const element = document.getElementById(headerId)
            element.style.backgroundColor = "rgba(16, 15, 15, 0)";
            element.style.transition = "background-color 500ms ease-in-out";
        }

        // function newPage(pageIndex){
        //     window.location.href = `Unit${pageIndex}.html`;
        // }
        function checkUnit(){
            if (localStorage.getItem("storedUnit") == "Nat5"){
                document.querySelector("#div1").style.backgroundImage = "url('/Nat 5 Posters/Waves, Radiation & Properties of Matter/Waves.png')";
                // document.querySelector("#div1").style.backgroundImage = "none";
                document.querySelector("#div2").style.backgroundColor = "dodgerblue";
                document.querySelector("#div3").style.backgroundColor = "hotpink";
                document.querySelector("#title1").innerText = "Waves, Radiation and Properties of Matter"
                document.querySelector("#title2").innerText = "Electricity"
                document.querySelector("#title3").innerText = "Dynamics and Space"
                // console.log(localStorage.getItem("storedUnit"));
                
            }
            else if (localStorage.getItem("storedUnit") == "Higher"){
                document.querySelector("#div1").style.backgroundImage = "url('Gravitation-and-motion.png')"
                document.querySelector("#div2").style.backgroundImage = "url('Particles-and-Waves.png')"
                document.querySelector("#div3").style.backgroundImage = "url('Electromagnetism-Colage.png')"
                document.querySelector("#title1").innerText = "Gravitation and Motion"
                document.querySelector("#title2").innerText = "Particles and Waves"
                document.querySelector("#title3").innerText = "Electromagnetism"
            }
            else {
                document.querySelector("#div1").style.backgroundColor = "#f1f1f1";
                document.querySelector("#div2").style.backgroundColor = "#f1f1f1";
                document.querySelector("#div3").style.backgroundImage = "url('AH/Electromagnetism/EMag-Collage.png')";
                // document.querySelector("#title1").innerText = "Gravitation and Motion"
                document.querySelector("#title2").innerText = "Coming Soon";
                document.querySelector("#title3").innerText = "Electromagnetism";
                // document.querySelector("#title3").innerText = "Electromagnetism"
            }
        }
        //Nat 5

        function waves(){
            localStorage.setItem("storedVar", "Waves")
            window.location.href = `Unit1.php`; 
        }
        
        function electricity(){
            localStorage.setItem("storedVar", "Electricity")
            window.location.href = `Unit1.php`;
        }
        
        function dynamics(){
            localStorage.setItem("storedVar", "Dynamics")
            window.location.href = `Unit1.php`;
        }
        
        
        
        //Higher
        
        function gravitation(){
            localStorage.setItem("storedVar", "Gravitation")
            window.location.href = `Unit1.php`; 
        }
        
        function particles(){
            localStorage.setItem("storedVar", "Particles")
            window.location.href = `Unit1.php`;
        }
        
        function electro(){
            localStorage.setItem("storedVar", "Electro")
            window.location.href = `Unit1.php`;
        }
        
        
        //Advanced Higher
        
        
        function rotationAndAstro(){
            localStorage.setItem("storedVar", "RotationAndAstro")
            window.location.href = `Unit1.php`; 
        }
        
        function quanta(){
            localStorage.setItem("storedVar", "Quanta")
            window.location.href = `Unit1.php`;
        }
        
        function AHElectro(){
            localStorage.setItem("storedVar", "AHElectro")
            window.location.href = `Unit1.php`;
        }
        document.addEventListener("DOMContentLoaded", function(){
            if (localStorage.getItem("storedUnit") == "Nat5"){
                document.getElementById("div1").addEventListener("click", waves);
                document.getElementById("div2").addEventListener("click", electricity);
                document.getElementById("div3").addEventListener("click", dynamics);
            }
            else if (localStorage.getItem("storedUnit") == "Higher"){
                document.getElementById("div1").addEventListener("click", gravitation);
                document.getElementById("div2").addEventListener("click", particles);
                document.getElementById("div3").addEventListener("click", electro);
            }
            else{
                document.getElementById("div1").addEventListener("click", rotationAndAstro);
                document.getElementById("div2").addEventListener("click", quanta);
                document.getElementById("div3").addEventListener("click", AHElectro);
            }
        })
        

        
    </script>
    <script>
        
    </script>

</head>
<body onload="checkUnit()">
    <div id="div1" onmouseover="backgroundOn('title1')" onmouseout="backgroundOff('title1')">
        <div id="overlay1"></div>
        <h1 id="title1"></h1>
    </div>
    <div id="div2" onmouseover="backgroundOn('title2')" onmouseout="backgroundOff('title2')">
        <div id="overlay2"></div>
        <h1 id="title2"></h1>
    </div>
    <div id="div3" onmouseover="backgroundOn('title3')" onmouseout="backgroundOff('title3')">
        <div id="overlay3"></div>
        <h1 id="title3"></h1>
    </div>
</body>
<script src="./main.js" type="text/javascript"></script>
</html>