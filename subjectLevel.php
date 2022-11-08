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
            background-color: #D9514EFF;
            transition: width 500ms ease-in-out;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #div2{
            width: 33.333%;
            height: 100%;
            /* background-image: url("Particles-and-Waves.png"); */
            background-color: #2A2B2DFF;
            background-position: center;
            transition: width 500ms ease-in-out;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            

        }
        #div3{
            width: 33.333%;
            height: 100%;
            transition: width 500ms ease-in-out;
            /* background-image: url("Electromagnetism-Colage.png"); */
            background-color: #2DA8D8FF;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;

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
            /* background-color: rgba(255, 0, 0, 0); */
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
            font-size: 2.2rem;
            font-family: Arial, Helvetica, sans-serif;
            padding: 10px;
            background-color: rgba(16, 15, 15, 0);
            border-radius: 5px;
            
        }
        
        #center{
            text-align: center;
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
    </script>
    <script>
        
    </script>

</head>
<body>
    <div id="div1" onmouseover="backgroundOn('Grav')" onmouseout="backgroundOff('Grav')" onclick="toUnits('Nat5')">
        <div id="overlay1"></div>
        <h1 id="Grav">National 5 Physics</h1>
    </div>
    <div id="div2" onmouseover="backgroundOn('Part')" onmouseout="backgroundOff('Part')" onclick="toUnits('Higher')">
        <div id="overlay2"></div>
        <h1 id="Part">Higher Physics</h1>
    </div>
    <div id="div3" onmouseover="backgroundOn('Elec')" onmouseout="backgroundOff('Elec')" onclick="toUnits('AH')">
        <div id="overlay3"></div>
        <h1 id="Elec">Advanced Higher<br><div id="center">Physisc<div></h1>
    </div>
</body>
<script src="./javascript/subjectLevel.js" type="text/javascript"></script>
</html>