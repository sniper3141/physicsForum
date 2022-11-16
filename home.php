<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home2.css">
    <link rel="stylesheet" href="css/homeMediaQueries.css">
    <title>Home of ESMS Physics</title>
</head>
<body>
    <div class="mainWrapper">
        <div class="wrapper">
            <img src="Logo2.png" alt="logo" id="logo">

            <div id="navWrapper">
                <ul id="navUl">
                    <li id="postersLink"><a class="navli" href="subjectLevel.php">Posters</a></li>
                    <li id="postersLink2"><a class="navli" href="signup.php">Forum</a></li>
                    <li id="postersLink3"><a class="navli">Contact</a></li>
                </ul>
            </div>
            <h1 id="mainTitle" class="scroll">Welcome</h1>
            <p id="subTitle">to the home of ESMS Physics</p>
            <a id="posterBtn" href="subjectLevel.php">Posters</a>
            <div id="arrowWrapper">
                <img src="arrow5.png" alt="arrow for more" id="arrow" onclick="scrollDown()">
            </div>  
            <section id="contactFormWapper">
                <div id="formInfo">
                    <h1 id="getInTouchTitle">Get in Touch</h1>
                    <p id="getInTouchInfo">Feel free to contact us if there is a problem with the website, have any cool ideas, or just for a chat.</p>
                    
                    <aside id="mailWrapper">
                        <div id="mailIcon"></div>
                        <p>Email: fillerEmail@email.com</p>
                    </aside>

                    <aside id="mailWrapper">
                        <div id="mailIcon"></div>
                        <p>Offer an improvement</p>
                    </aside>

                    <aside id="mailWrapper">
                        <div id="mailIcon"></div>
                        <p>Report a problem</p>
                    </aside>

                    <aside id="mailWrapper">
                        <div id="mailIcon"></div>
                        <p>Have a chat</p>
                    </aside>
                </div>
                <div id="contactForm">
                    <h1 id="contactTitle">Contact</h1>
                    <form>
                        <div id="formWrapper">
                            <span>First Name</span>
                            <span>Email Address</span>
                            <input type="text" id="nameInput" value="Name">
                            <input type="email" id="nameInput" value="Email">
                        </div>
                        <span>Message</span>
                        <textarea rows="13" cols="60"></textarea>
                    </form>
                </div>
            </section>
        </div>
        <div class="textWrapper">
            <p style="font-size:3rem; color: black; font-family: 'arial'">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    </div>
    <script>

        function scrollDown(){
            window.scrollBy({    
            left: 0, 
            top: window.innerHeight,
            behavior: "smooth"
        
        });
            console.log("hello");
        }



        var opacity = 1
        var lastScrollTop = 0;
        window.addEventListener('scroll', function(e) {
            console.log(window.pageYOffset);
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

            if (window.pageYOffset < 100){
                document.querySelector("#arrow").style.display = "block"
                const arrowTarget = document.querySelector("#arrow");
                var arrowRate = scrolled * 0.7;
                arrowTarget.style.transform = "translate3d(0px, "+arrowRate+"px, 0px)";
            }
            else{
                document.querySelector("#arrow").style.display = "none"
            }
            

            
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