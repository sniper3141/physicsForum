<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/homeMediaQueries.css">
    <title>ESMS Physics Hub</title>
</head>
<body>
    <div class="mainWrapper">
        <div class="wrapper">
            <img src="Logo.png" alt="logo" id="logo">
            <h2 id="logoText1">hysics</h2>
            <h2 id="logoText2">ome</h2>

            <div id="navWrapper">
                <ul id="navUl">
                    <li id="postersLink"><a class="navli">Posters</a></li>
                    <li id="postersLink2"><a class="navli">Forum</a></li>
                    <li id="postersLink3"><a class="navli">Contact</a></li>
                </ul>
            </div>
            <h1 id="mainTitle" class="scroll">Welcome</h1>
            <p id="subTitle">to the home of ESMS Physics</p>
            <button id="posterBtn">Posters</button>
            <div id="arrowWrapper">
                <img src="arrow5.png" alt="arrow for more" id="arrow">
            </div>
        </div>
        <div class="textWrapper">
                <p style="font-size:3rem; color: black; font-family: 'arial'">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    </div>
    <script>
        var opacity = 1
        var lastScrollTop = 0;
        window.addEventListener('scroll', function(e) {
            
            const target = document.querySelector(".scroll");
            var st = window.pageYOffset || document.documentElement.scrollTop;
            if (st > lastScrollTop && opacity){
                opacity = opacity * 0.995
            }
            else if (st <= lastScrollTop && opacity <= 1.00000000001){
                opacity = opacity / 0.99
            }
            if (window.pageYOffset == 0){
                opacity = 1;
            }

            var scrolled = window.pageYOffset;
            lastScrollTop = st <= 0 ? 0 : st;
            var rate = -(scrolled * 0.15);
            target.style.transform = "translate3d(0px, "+rate+"px, 0px)";
            target.style.opacity = opacity;



            const btnTarget = document.querySelector("#posterBtn");
            var Rate = scrolled * -0.1;
            btnTarget.style.transform = "translate3d("+Rate+"px, 0px, 0px)";
            btnTarget.style.opacity = opacity;

            const subTitleTarget = document.querySelector("#subTitle");
            var subRate = scrolled * 0.075;
            subTitleTarget.style.transform = "translate3d("+subRate+"px, 0px, 0px)";
            subTitleTarget.style.opacity = opacity;

            const postersTarget1 = document.querySelector("#postersLink");
            var postRate1 = scrolled * -0.4;
            postersTarget1.style.transform = "translate3d(0px, "+postRate1+"px, 0px)";

            const postersTarget2 = document.querySelector("#postersLink2");
            var postRate2 = scrolled * -0.2;
            postersTarget2.style.transform = "translate3d(0px, "+postRate2+"px, 0px)";

            const postersTarget3 = document.querySelector("#postersLink3");
            var postRate3 = scrolled * -0.1;
            postersTarget3.style.transform = "translate3d(0px, "+postRate3+"px, 0px)";

            // const logoTarget = document.querySelector("#logo");
            // const logoTarget1 = document.querySelector("#logoText1");
            // const logoTarget2 = document.querySelector("#logoText2");
            // var logoRate = scrolled * -0.025;
            // logoTarget.style.transform = "translate3d("+logoRate+"px, 0px, 0px)";
            // logoTarget1.style.transform = "translate3d("+(-logoRate)+"px, 0px, 0px)";
            // logoTarget2.style.transform = "translate3d("+(-logoRate)+"px, 0px, 0px)";

            

        });
    </script>
</body>
</html>