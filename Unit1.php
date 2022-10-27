<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./SubPage.js" type="module"></script>
    <link rel="stylesheet" href="Unit1MediaQuery.css">
    <title>Physics Posters</title>
    <style>
        img{
           max-width: 25rem;
           max-height: 25rem; 
           width: auto;
           height: auto;
        }
        .imageItem{
            list-style-type: none;
            margin-bottom: 2rem;
            background-color: white;
            border: solid black 0.2rem;
            margin-right: 1.5rem;
        }
        #imageList{
            display: grid;
            grid-template-columns: 50% 50%;
        }

        #navWrapper{
            display: flex;
            justify-content: space-around;
            background-color: black;
            margin-bottom: 4rem;  
            margin-top: 0;   
            position: sticky;   
            top: 0; 
            z-index: 5;
        }
        .navBar{
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            list-style-type: none;
            padding: 1.5rem;
            padding-right: 5rem;
            padding-left: 5rem;
            margin: 0;
            font-weight: 700;
            font-size: 1.3rem;
        }
        body{
            padding: 0;
            margin: 0;
            background-color: #f9f9f9;
        }
        li, img, h1{
            float: left;
            font-size: auto;
            overflow-wrap: break-word;
            margin: 0.6rem;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 500;
        }
        li, img{
            display: flex;
        }
        #modal{
            z-index: 4;
            position: absolute;
            left: 20%;
            top: 16%;
            display: none;
            padding: 1%;
            padding-bottom: 0.7%;
            background-color: #f1f1f1;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 0rem 0rem 0.8rem 0.2rem black;
        }
        #modalImage{
            max-width: 70rem;
            max-height: 70rem;
            height: auto;
            width: auto;
            
        }
        #sticky{
            position: sticky;
        }
        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(3px);
            z-index: 3;
        }
        .hidden{
            display: none;
        }
        p{
            margin: 0;
            font-size: 1.3rem;
            padding-right: 0.5rem;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 400;
            
            color: black;
        }
        #download{
            margin: 0;
            
        }
        a{
            display: flex;
            padding: 0.75rem;
            text-decoration: none;
        }
        a:hover{
            cursor: pointer;
            background-color: black;
            border-radius: 5px;
        }

        .underline{
            text-decoration: underline;
        }
        .navBar:hover{
            filter: invert(1);
            background-color: black;
        }

        .show{
            display: block !important; 
        }

        #comingSoonWrapper{
            display: flex;
            justify-content: center;
            
        }
        #comingSoon{
            font-size: 13rem;
            font-weight: 800;
            margin-top: 11rem;
            color:#222020;
        }

    </style>

    <script>
        function hoverStateIn(id){
            document.getElementById(`item${id}`).style.boxShadow = "0rem 0rem 0.8rem 0.2rem black";
        }
        function hoverStateOut(id){
            document.getElementById(`item${id}`).style.boxShadow = "0.5rem 0.5rem 0.75rem transparent"; 
        }
        
        function closeModal(){                
                document.getElementById("modal").style.display = "none";
                document.querySelector("#overlay").classList.add("hidden");
        }




        function openModal(imageId){
            const photoSrcArray = [
            ["Unit 1 Photos/Physics Motion Poster6.0.jpg", "Unit 1 Photos/Physics Tension and other things Poster2.0.jpg", "Unit 1 Photos/Explosions & Impulse.jpg", "Unit 1 Photos/Momentum Poster.jpg", "Unit 1 Photos/Projectiles & Gravity.jpg", "Unit 1 Photos/Special Relativity Poster 2.jpg", "Unit 1 Photos/Physics_poster_space.png", "Unit 1 Photos/The-Big-Bang-Theory.png"],
            ["Unit 2 Photos/Charges-in-E-Fields.png", "Unit 2 Photos/Electric-Fields.png", "Unit 2 Photos/Fundamental-Particles-Poster.png", "Unit 2 Photos/Interacting-Particles-Poster.png", "Unit 2 Photos/Irradiance-Poster.png", "Unit 2 Photos/Magnetic-fields-poster-(updated).png", "Unit 2 Photos/Nuclear-Physics-Poster.png", "Unit 2 Photos/Orders-of-magnitude-physics-poster.png", "Unit 2 Photos/Particle-accelerator-poster.png", "Unit 2 Photos/Refractive-Index-Poster.png", "Unit 2 Photos/Wave-Particle-Duality-Poster.png", "Unit 2 Photos/Spectra-Physics-Poster.png", "Unit 2 Photos/Total-Internal-Reflection-Poster.png", "Unit 2 Photos/Uncertainties-Physics-Poster.png", "Unit 2 Photos/Waves-&-Interference.png", "Unit 2 Photos/Work-function-Poster.png", "Unit 2 Photos/Youngs'-double-slit-experiment.png"],
            ["Unit 3 Photos/Current-and-Voltage.png", "Unit 3 Photos/Internal-Resistance.png", "Unit 3 Photos/Capacitors.png", "Unit 3 Photos/Capacitor-Graphs.png", "Unit 3 Photos/Semiconductors.png", "Unit 3 Photos/LEDs-and-Photodiodes.png"]
            ]

            document.getElementById("modal").style.display = "flex";
            document.querySelector("#overlay").classList.remove("hidden");
            
            for (let i = 0; i <= 8; i++){
                if (imageId == `img${i}` && document.querySelector("#GravitationNav").classList.contains("underline")){
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    document.getElementById("modalImage").src = photoSrcArray[0][i];
                    document.getElementById("downloadLink").href = photoSrcArray[0][i];
                    return
                }
            }
            for (let i = 0; i <= 16; i++){
                if (imageId == `img${i}` && document.querySelector("#ParticlesNav").classList.contains("underline")){
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    document.getElementById("modalImage").src = photoSrcArray[1][i];
                    document.getElementById("downloadLink").href = photoSrcArray[1][i];
                    return
                }
            }
            for (let i = 0; i <= 6; i++){
                if (imageId == `img${i}` && document.querySelector("#ElectroNav").classList.contains("underline")){
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    document.getElementById("modalImage").src = photoSrcArray[2][i];
                    document.getElementById("downloadLink").href = photoSrcArray[2][i];
                    return
                }
            }
            
        }


        function invertColor(){
            document.querySelector("#downloadText").style.filter = "invert(1)";
            document.querySelector("#download").style.filter = "invert(1)";
        }
        function normalColor(){
            document.querySelector("#downloadText").style.filter = "invert(0)";
            document.querySelector("#download").style.filter = "invert(0)";
        }

        
        function PageLoad(){
            if (localStorage.getItem("storedVar") == "Gravitation"){
                document.querySelector("#GravitationNav").classList.add("underline");
                document.querySelector("#img1").src = "Unit 1 Photos/Physics Motion Poster6.0.jpg";
                document.querySelector("#img2").src = "Unit 1 Photos/Physics Tension and other things Poster2.0.jpg";
                document.querySelector("#img3").src = "Unit 1 Photos/Explosions-&-Impulse2.png";
                document.querySelector("#img4").src = "Unit 1 Photos/Momentum Poster.jpg";
                document.querySelector("#img5").src = "Unit 1 Photos/Projectiles & Gravity.jpg";
                document.querySelector("#img6").src = "Unit 1 Photos/Special Relativity Poster 2.jpg";
                document.querySelector("#img7").src = "Unit 1 Photos/Physics_poster_space.png";
                document.querySelector("#img8").src = "Unit 1 Photos/The-Big-Bang-Theory.png";
                document.querySelector("#info1").innerHTML = "Newtons Laws, Equations of Motion, Terminal Velocity and Motion Graphs"
                document.querySelector("#info2").innerHTML = "Tension, Resultant Forces, Forces on Slopes and Lifts"
                document.querySelector("#info3").innerHTML = "Explosions, Impulse and Force-Time Graphs"
                document.querySelector("#info4").innerHTML = "Momentum, Elastic and Inelastic Collisions"
                document.querySelector("#info5").innerHTML = "Projectiles, Satillites and Gravitation"
                document.querySelector("#info6").innerHTML = "Special Relativity - Time Dilation and Length Contraction"
                document.querySelector("#info7").innerHTML = "Doppler Effect, Dark Matter and Energy, Blackbody Radiation, Redshift and Hubble's Law"
                document.querySelector("#info8").innerHTML = "The Big Bang Theory - Large Scale Homogeneity, Abundance of Light Elements and CMB"
            }
            else if (localStorage.getItem("storedVar") == "Particles"){
                document.querySelector("#ParticlesNav").classList.add("underline");
                document.querySelector("#img1").src = "Unit 2 Photos/Charges-in-E-Fields.png";
                document.querySelector("#info1").innerHTML = "Charges in E-Fields and Work Done";
                document.querySelector("#img2").src = "Unit 2 Photos/Electric-Fields.png";
                document.querySelector("#info2").innerHTML = "Electric Field Diagrams and Definition";
                document.querySelector("#img3").src = "Unit 2 Photos/Fundamental-Particles-Poster.png";
                document.querySelector("#info3").innerHTML = "Fundamental Particles and Antimatter";
                document.querySelector("#img4").src = "Unit 2 Photos/Interacting-Particles-Poster.png";
                document.querySelector("#info4").innerHTML = "Particle Interactions and Bosons";
                document.querySelector("#img5").src = "Unit 2 Photos/Irradiance-Poster.png";
                document.querySelector("#info5").innerHTML = "Irradiance - Inverse Square Law";
                document.querySelector("#img6").src = "Unit 2 Photos/Magnetic-fields-poster-(updated).png";
                document.querySelector("#info6").innerHTML = "Magnetic Fields and Right Hand Rule";
                document.querySelector("#img7").src = "Unit 2 Photos/Nuclear-Physics-Poster.png";
                document.querySelector("#info7").innerHTML = "Nuclear Physics - Fission and Fusion";
                document.querySelector("#img8").src = "Unit 2 Photos/Orders-of-magnitude-physics-poster.png";
                document.querySelector("#info8").innerHTML = "Orders of Magnitude and Examples";
                document.querySelector("#img9").src = "Unit 2 Photos/Particle-accelerator-poster.png";
                document.querySelector("#info9").innerHTML = "Particle Accelerators - Linear, Synchrotron and Cyclotron";
                document.querySelector("#img10").src = "Unit 2 Photos/Refractive-Index-Poster.png";
                document.querySelector("#info10").innerHTML = "Refractive Index and Snell's Law";
                document.querySelector("#img11").src = "Unit 2 Photos/Wave-Particle-Duality-Poster.png";
                document.querySelector("#info11").innerHTML = "Wave-Particle Duality - Work Function and Threshold Frequency";
                document.querySelector("#img12").src = "Unit 2 Photos/Spectra-Physics-Poster.png";
                document.querySelector("#info12").innerHTML = "Continuous, Line and Absorption Spectra";
                document.querySelector("#img13").src = "Unit 2 Photos/Total-Internal-Reflection-Poster.png";
                document.querySelector("#info13").innerHTML = "Total Internal Reflection - Critical Angle";
                document.querySelector("#img14").src = "Unit 2 Photos/Uncertainties-Physics-Poster.png";
                document.querySelector("#info14").innerHTML = "Uncertainties - Random, Scale Reading, Systematic and Percentage";
                document.querySelector("#img15").src = "Unit 2 Photos/Waves-&-Interference.png";
                document.querySelector("#info15").innerHTML = "Waves - Diffraction and Interference";
                document.querySelector("#img16").src = "Unit 2 Photos/Work-function-Poster.png";
                document.querySelector("#info16").innerHTML = "Work Function Equation and Diagram";
                document.querySelector("#img17").src = "Unit 2 Photos/Youngs'-double-slit-experiment.png";
                document.querySelector("#info17").innerHTML = "Young's Double Slit Experiment and Path Difference";
                for (let i = 9; i <= 17; i++){
                    document.querySelector(`#item${i}`).classList.remove("hidden");
                }
            }
            else if (localStorage.getItem("storedVar") == "Electro"){
                document.querySelector("#ElectroNav").classList.add("underline");


                document.querySelector("#img1").src = "Unit 3 Photos/Current-and-Voltage.png";
                document.querySelector("#info1").innerHTML = "AC, DC current and Peak, R.M.S Voltage";
                document.querySelector("#img2").src = "Unit 3 Photos/Internal-Resistance.png";
                document.querySelector("#info2").innerHTML = "Internal Resistance, EMF, Lost Volts and TPD";
                document.querySelector("#img3").src = "Unit 3 Photos/Capacitors.png";
                document.querySelector("#info3").innerHTML = "Capacitors, Capacitance and Energy";
                document.querySelector("#img4").src = "Unit 3 Photos/Capacitor-Graphs.png";
                document.querySelector("#info4").innerHTML = "Charging and Discharging Capacitor Graphs - Voltage and Current";
                document.querySelector("#img5").src = "Unit 3 Photos/Semiconductors.png";
                document.querySelector("#info5").innerHTML = "Semiconductors, Band Structure, N and P type and n-p Junction";
                document.querySelector("#img6").src = "Unit 3 Photos/LEDs-and-Photodiodes.png";
                document.querySelector("#info6").innerHTML = "LEDs,Photodiodes and Photovoltaic Mode ";
                for (let i = 7; i <= 8; i++){
                    document.querySelector(`#item${i}`).classList.add("hidden");
                }
            }

        }

        function changePage(pageToLoad){
            if (pageToLoad == "#GravitationNav" && document.querySelector(pageToLoad).classList.contains("underline") == false){
                document.querySelector("#notNav").classList.remove("hidden");
                document.querySelector("#GravitationNav").classList.add("underline");
                document.querySelector("#ParticlesNav").classList.remove("underline");
                document.querySelector("#ElectroNav").classList.remove("underline");

                document.querySelector("#img1").src = "Unit 1 Photos/Physics Motion Poster6.0.jpg";
                document.querySelector("#img2").src = "Unit 1 Photos/Physics Tension and other things Poster2.0.jpg";
                document.querySelector("#img3").src = "Unit 1 Photos/Explosions-&-Impulse2.png";
                document.querySelector("#img4").src = "Unit 1 Photos/Momentum Poster.jpg";
                document.querySelector("#img5").src = "Unit 1 Photos/Projectiles & Gravity.jpg";
                document.querySelector("#img6").src = "Unit 1 Photos/Special Relativity Poster 2.jpg";
                document.querySelector("#img7").src = "Unit 1 Photos/Physics_poster_space.png";
                document.querySelector("#img8").src = "Unit 1 Photos/The-Big-Bang-Theory.png";
                document.querySelector("#info1").innerHTML = "Newtons Laws, Equations of Motion, Terminal Velocity and Motion Graphs"
                document.querySelector("#info2").innerHTML = "Tension, Resultant Forces, Forces on Slopes and Lifts"
                document.querySelector("#info3").innerHTML = "Explosions, Impulse and Force-Time Graphs"
                document.querySelector("#info4").innerHTML = "Momentum, Elastic and Inelastic Collisions"
                document.querySelector("#info5").innerHTML = "Projectiles, Satillites and Gravitation"
                document.querySelector("#info6").innerHTML = "Special Relativity - Time Dilation and Length Contraction"
                document.querySelector("#info7").innerHTML = "Doppler Effect, Dark Matter and Energy, Blackbody Radiation, Redshift and Hubble's Law"
                document.querySelector("#info8").innerHTML = "The Big Bang Theory - Large Scale Homogeneity, Abundance of Light Elements and CMB"
                window.scrollTo({ top: 0});
                for (let i = 7; i <= 8; i++){
                    document.querySelector(`#item${i}`).classList.remove("hidden");
                }
                for (let i = 9; i <= 17; i++){
                    document.querySelector(`#item${i}`).classList.add("hidden");
                }
            }
            else if(pageToLoad == "#ParticlesNav" && document.querySelector(pageToLoad).classList.contains("underline") == false){
                document.querySelector("#notNav").classList.remove("hidden");
                document.querySelector("#ParticlesNav").classList.add("underline");
                document.querySelector("#GravitationNav").classList.remove("underline");
                document.querySelector("#ElectroNav").classList.remove("underline");


                document.querySelector("#img1").src = "Unit 2 Photos/Charges-in-E-Fields.png";
                document.querySelector("#info1").innerHTML = "Charges in E-Fields and Work Done";
                document.querySelector("#img2").src = "Unit 2 Photos/Electric-Fields.png";
                document.querySelector("#info2").innerHTML = "Electric Field Diagrams and Definition";
                document.querySelector("#img3").src = "Unit 2 Photos/Fundamental-Particles-Poster.png";
                document.querySelector("#info3").innerHTML = "Fundamental Particles and Antimatter";
                document.querySelector("#img4").src = "Unit 2 Photos/Interacting-Particles-Poster.png";
                document.querySelector("#info4").innerHTML = "Particle Interactions and Bosons";
                document.querySelector("#img5").src = "Unit 2 Photos/Irradiance-Poster.png";
                document.querySelector("#info5").innerHTML = "Irradiance - Inverse Square Law";
                document.querySelector("#img6").src = "Unit 2 Photos/Magnetic-fields-poster-(updated).png";
                document.querySelector("#info6").innerHTML = "Magnetic Fields and Right Hand Rule";
                document.querySelector("#img7").src = "Unit 2 Photos/Nuclear-Physics-Poster.png";
                document.querySelector("#info7").innerHTML = "Nuclear Physics - Fission and Fusion";
                document.querySelector("#img8").src = "Unit 2 Photos/Orders-of-magnitude-physics-poster.png";
                document.querySelector("#info8").innerHTML = "Orders of Magnitude and Examples";
                document.querySelector("#img9").src = "Unit 2 Photos/Particle-accelerator-poster.png";
                document.querySelector("#info9").innerHTML = "Particle Accelerators - Linear, Synchrotron and Cyclotron";
                document.querySelector("#img10").src = "Unit 2 Photos/Refractive-Index-Poster.png";
                document.querySelector("#info10").innerHTML = "Refractive Index and Snell's Law";
                document.querySelector("#img11").src = "Unit 2 Photos/Wave-Particle-Duality-Poster.png";
                document.querySelector("#info11").innerHTML = "Wave-Particle Duality - Work Function and Threshold Frequency";
                document.querySelector("#img12").src = "Unit 2 Photos/Spectra-Physics-Poster.png";
                document.querySelector("#info12").innerHTML = "Continuous, Line and Absorption Spectra";
                document.querySelector("#img13").src = "Unit 2 Photos/Total-Internal-Reflection-Poster.png";
                document.querySelector("#info13").innerHTML = "Total Internal Reflection - Critical Angle";
                document.querySelector("#img14").src = "Unit 2 Photos/Uncertainties-Physics-Poster.png";
                document.querySelector("#info14").innerHTML = "Uncertainties - Random, Scale Reading, Systematic and Percentage";
                document.querySelector("#img15").src = "Unit 2 Photos/Waves-&-Interference.png";
                document.querySelector("#info15").innerHTML = "Waves - Diffraction and Interference";
                document.querySelector("#img16").src = "Unit 2 Photos/Work-function-Poster.png";
                document.querySelector("#info16").innerHTML = "Work Function Equation and Diagram";
                document.querySelector("#img17").src = "Unit 2 Photos/Youngs'-double-slit-experiment.png";
                document.querySelector("#info17").innerHTML = "Young's Double Slit Experiment and Path Difference";

                window.scrollTo({ top: 0});
                for (let i = 9; i <= 17; i++){
                    document.querySelector(`#item${i}`).classList.remove("hidden");
                }
            }
            else if(pageToLoad == "#ElectroNav" && document.querySelector(pageToLoad).classList.contains("underline") == false){
                document.querySelector("#ElectroNav").classList.add("underline");
                document.querySelector("#GravitationNav").classList.remove("underline");
                document.querySelector("#ParticlesNav").classList.remove("underline");
                document.querySelector("#img1").src = "Unit 3 Photos/Current-and-Voltage.png";
                document.querySelector("#info1").innerHTML = "AC, DC current and Peak, R.M.S Voltage";
                document.querySelector("#img2").src = "Unit 3 Photos/Internal-Resistance.png";
                document.querySelector("#info2").innerHTML = "Internal Resistance, EMF, Lost Volts and TPD";
                document.querySelector("#img3").src = "Unit 3 Photos/Capacitors.png";
                document.querySelector("#info3").innerHTML = "Capacitors, Capacitance and Energy";
                document.querySelector("#img4").src = "Unit 3 Photos/Capacitor-Graphs.png";
                document.querySelector("#info4").innerHTML = "Charging and Discharging Capacitor Graphs - Voltage and Current";
                document.querySelector("#img5").src = "Unit 3 Photos/Semiconductors.png";
                document.querySelector("#info5").innerHTML = "Semiconductors, Band Structure, N and P type and n-p Junction";
                document.querySelector("#img6").src = "Unit 3 Photos/LEDs-and-Photodiodes.png";
                document.querySelector("#info6").innerHTML = "LEDs,Photodiodes and Photovoltaic Mode ";
                for (let i = 7; i <= 17; i++){
                    document.querySelector(`#item${i}`).classList.add("hidden");
                }
                window.scrollTo({ top: 0});
            }
        }

        function changeLeft(){
            if (document.querySelector("#GravitationNav").classList.contains("underline")){
                changePage("#ElectroNav");
                return
            }
            else if (document.querySelector("#ParticlesNav").classList.contains("underline")){
                changePage("#GravitationNav");
                return
            }
            if (document.querySelector("#ElectroNav").classList.contains("underline")){
                changePage("#ParticlesNav");
                return
            }
        }

        function changeRight(){
            if (document.querySelector("#GravitationNav").classList.contains("underline")){
                changePage("#ParticlesNav");
                return
            }
            else if (document.querySelector("#ParticlesNav").classList.contains("underline")){
                changePage("#ElectroNav");
                return
            }
            if (document.querySelector("#ElectroNav").classList.contains("underline")){
                changePage("#GravitationNav");
                return
            }
        }
        
    </script>

</head>
<body onload="PageLoad()">
    <!-- <main id="blur" onclick="closeModal()"> -->
        <ul id="navWrapper">
            <img src="arrow.png" class="hidden arrow" id="arrow1" onclick="changeLeft()">
            <li class="navBar" id="GravitationNav" onclick="changePage('#GravitationNav')">Unit 1 - Gravitation and motion</li>
            <li class="navBar" id="ParticlesNav" onclick="changePage('#ParticlesNav')">Unit 2 - Particles and Waves</li>
            <li class="navBar" id="ElectroNav" onclick="changePage('#ElectroNav')">Unit 3 - Electromagnetism</li>
            <img src="arrow.png" class="hidden arrow" onclick="changeRight()">
        </ul>
        <main id="notNav">
        <ul id="imageList">
            
            <li class="imageItem" id="item1" onmouseover="hoverStateIn('1')" onmouseout="hoverStateOut('1')" onclick="openModal('img0')">
                <h1 id="info1"></h1>
                <img id="img1" src="">
            </li>

            <li class="imageItem" id="item2" onmouseover="hoverStateIn('2')" onmouseout="hoverStateOut('2')" onclick="openModal('img1')">
                <h1 id="info2"></h1>
                <img id="img2" src="">
            </li>

            <li class="imageItem" id="item3" onmouseover="hoverStateIn('3')" onmouseout="hoverStateOut('3')" onclick="openModal('img2')">
                <h1 id="info3"></h1>
                <img id="img3" src="">
            </li>

            <li class="imageItem" id="item4" onmouseover="hoverStateIn('4')" onmouseout="hoverStateOut('4')" onclick="openModal('img3')">
                <h1 id="info4"></h1>
                <img id="img4" src="">
            </li>

            <li class="imageItem" id="item5" onmouseover="hoverStateIn('5')" onmouseout="hoverStateOut('5')" onclick="openModal('img4')">
                <h1 id="info5"></h1>
                <img id="img5" src="">
            </li>

            <li class="imageItem" id="item6" onmouseover="hoverStateIn('6')" onmouseout="hoverStateOut('6')" onclick="openModal('img5')">
                <h1 id="info6"></h1>
                <img id="img6" src="">
            </li>

            <li class="imageItem" id="item7" onmouseover="hoverStateIn('7')" onmouseout="hoverStateOut('7')" onclick="openModal('img6')">
                <h1 id="info7"></h1>
                <img id="img7" src="">
            </li>

            <li class="imageItem" id="item8" onmouseover="hoverStateIn('8')" onmouseout="hoverStateOut('8')" onclick="openModal('img7')">
                <h1 id="info8"></h1>
                <img id="img8" src="">
            </li>

            <li class="imageItem hidden" id="item9" onmouseover="hoverStateIn('9')" onmouseout="hoverStateOut('9')" onclick="openModal('img8')">
                <h1 id="info9"></h1>
                <img id="img9" src="">
            </li>

            <li class="imageItem hidden" id="item10" onmouseover="hoverStateIn('10')" onmouseout="hoverStateOut('10')" onclick="openModal('img9')">
                <h1 id="info10"></h1>
                <img id="img10" src="">
            </li>

            <li class="imageItem hidden" id="item11" onmouseover="hoverStateIn('11')" onmouseout="hoverStateOut('11')" onclick="openModal('img10')">
                <h1 id="info11"></h1>
                <img id="img11" src="">
            </li>

            <li class="imageItem hidden" id="item12" onmouseover="hoverStateIn('12')" onmouseout="hoverStateOut('12')" onclick="openModal('img11')">
                <h1 id="info12"></h1>
                <img id="img12" src="">
            </li>

            <li class="imageItem hidden" id="item13" onmouseover="hoverStateIn('13')" onmouseout="hoverStateOut('13')" onclick="openModal('img12')">
                <h1 id="info13"></h1>
                <img id="img13" src="">
            </li>

            <li class="imageItem hidden" id="item14" onmouseover="hoverStateIn('14')" onmouseout="hoverStateOut('14')" onclick="openModal('img13')">
                <h1 id="info14"></h1>
                <img id="img14" src="">
            </li>

            <li class="imageItem hidden" id="item15" onmouseover="hoverStateIn('15')" onmouseout="hoverStateOut('15')" onclick="openModal('img14')">
                <h1 id="info15"></h1>
                <img id="img15" src="">
            </li>

            
            <li class="imageItem hidden" id="item16" onmouseover="hoverStateIn('16')" onmouseout="hoverStateOut('16')" onclick="openModal('img15')">
                <h1 id="info16"></h1>
                <img id="img16" src="">
            </li>

            <li class="imageItem hidden" id="item17" onmouseover="hoverStateIn('17')" onmouseout="hoverStateOut('17')" onclick="openModal('img16')">
                <h1 id="info17"></h1>
                <img id="img17" src="">
            </li>
        </ul> 
        </main>
    <!-- </main> -->
    <section id="overlay" class="hidden" onclick="closeModal()">
         
    </section>
    
    <section id="modal"> 
        <img id="modalImage" src="">
        <a id="downloadLink" href='' download onmouseover="invertColor()" onmouseout="normalColor()">
            <p id="downloadText">DOWNLOAD</p>
            <img id="download" src="Download.png">
        </a>
    </section>
    
    
    <div id="div1" style="display: none;"></div>
    <div id="div2" style="display: none;"></div>
    <div id="div3" style="display: none;"></div>
</body>
<script src="./main.js"></script>
</html>