<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home2.css">
    <link rel="stylesheet" href="css/homeMediaQueries.css">
    <link href="https://fonts.cdnfonts.com/css/azo-sans" rel="stylesheet">
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
                    <li id="postersLink3"><a class="navli" onclick="openContactForm()">Contact</a></li>
                </ul>
            </div>
            <h1 id="mainTitle" class="scroll">Welcome</h1>
            <p id="subTitle">to the home of ESMS Physics</p>
            <a id="posterBtn" href="subjectLevel.php">Posters</a>
            <div id="arrowWrapper">
                <img src="arrow5.png" alt="arrow for more" id="arrow" onclick="scrollDown()">
            </div>
            <div id="contactOverlay1" onclick="closeContactForm()"></div>
            <div id="contactOverlay2" onclick="closeContactForm()"></div>
            <section id="contactFormWapper" style="display: none">
                <div id="formInfo">
                    <h1 id="getInTouchTitle">Get in Touch</h1>
                    <p id="getInTouchInfo">Feel free to contact us if there is a problem with the website, have any cool ideas, or just for a chat.</p>
                    
                    <aside id="mailWrapper">
                        <div id="mailIcon"></div>
                        <p>Email: pupilportal@outlook.com</p>
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
                    <img src="close.png" alt="close button" id="closeBtn" onclick="closeContactForm()">
                    <h1 id="contactTitle">Contact</h1>
                    <form action="contactForm.php" method="POST">
                        <div id="formWrapper">
                            <span>First Name</span>
                            <span>Email Address</span>
                            <input type="text" id="nameInput" name="name" placeholder="Name" required onfocus="removeValue('#nameInput')" onfocusout="addValue('Name', '#nameInput')">
                            <input type="email" id="emailInput" name="mail" placeholder="Email" required onfocus="removeValue('#emailInput')" onfocusout="addValue('Email', '#emailInput')">
                            
                        </div>
                        <span id="message">Message</span>
                        <textarea rows="13" id="textArea" name="message" cols="60" required></textarea>
                        <input type="submit" name="submit" id="contactSubmit" value="Send">
                        <?php
                            if (isset($_GET['mailSent'])){
                                echo "<div id='contactConfirmation'>Your message has been sent!</div>";
                            }
                        ?>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <div id="textWrapperMain">
            <div class="textWrapper">
                <h1 id="resource">This is a resource for<br>school <div class="red">students</div></h1>
            </div>
            <div id="textWrapper2">
                <h1 id="madeBy">Made by Students</h1>
            </div>
            <div id="scroll"></div>
            <div id="horizontalScroll">
                <div id="textWrapper3">
                    <h1 id="studying">Are you sick of studying <div class="red">alone</div><br> in your room?</h1>
                </div>
                <div id="textWrapper4">
                    <h1 id="community">If so, join a <div class="red">community</div> of<br> likeminded people</h1>
                </div>
            </div>
            <div id="textWrapper5" style="display: none">
                <h1>With question forums...</h1>
            </div>

        </div>
    <script>
        const container = document.querySelector("#horizontalScroll");
        let scrollLine = document.querySelector("#scroll");
        var counter = 1;
        container.addEventListener("wheel", (e) => {
            if (window.pageYOffset == 2883){
                scrollLine.style.display = "flex";
                scrollLine.style.top = "399.5vh";
                if (e.deltaY == 100 && counter < 13){
                    document.querySelector("body").style.overflowY = "hidden";
                    counter += 1;
                }
                if (scrollLine.style.width == "0px" && e.deltaY != 100){
                    document.querySelector("body").style.overflowY = "auto";
                    return;
                }
                else if (scrollLine.style.width == `${window.innerWidth}px`){
                    const body = document.querySelector("body")
                    body.style.overflowY = "auto";
                    document.querySelector(".mainWrapper").style.display = "none";
                    document.querySelector(".textWrapper").style.display = "none";
                    document.querySelector("#textWrapper2").style.display = "none";
                    document.querySelector("#horizontalScroll").style.top = "0";
                    document.querySelector("#textWrapper5").style.top = "100vh";
                    scrollLine.style.top = "99.5vh";
                    document.querySelector("body").style.overflowY = "auto";
                    document.querySelector("#horizontalScroll").style.display = "flex";
                                     
                    window.scrollTo(0, 0);
                    return;
                }
                

                if (e.deltaY == -100){
                    counter -=1;
                }
                else if (e.deltaY == 100){
                    document.querySelector("body").style.overflowY = "hidden";
                }
                

                e.preventDefault();
                container.scrollLeft += e.deltaY / 3 ;
                scrollLine.style.width = container.scrollLeft + "px";
            }
            if (window.pageYOffset == 0 && document.querySelector(".mainWrapper").style.display == "none"){
                document.querySelector("#textWrapper5").style.display = "flex"; 
                document.querySelector("body").style.overflowY = "hidden";
                if (scrollLine.style.width == `${window.innerWidth}px` && e.deltaY == -100){
                    document.querySelector("body").style.overflowY = "hidden";
                    scrollLine.style.display = "flex";

                }
                else if(e.deltaY == 100 && scrollLine.style.width == `${window.innerWidth}px`){
                    document.querySelector("body").style.overflowY = "auto";
                    scrollLine.style.display = "none"; 
                    return;
                }

                if (scrollLine.style.width == "0px" && e.deltaY == -100){
                    document.querySelector("body").style.overflowY = "auto";
                    document.querySelector("#textWrapper5").style.display = "none"; 
                    document.querySelector("#horizontalScroll").style.top = "300vh";
                    document.querySelector(".mainWrapper").style.display = "block";
                    document.querySelector(".textWrapper").style.display = "flex";
                    document.querySelector("#textWrapper2").style.display = "flex";
                    window.scrollTo({left: 0, top: 2883, behaviour: "instant"}); 
                }
                e.preventDefault();
                container.scrollLeft += e.deltaY / 3 ;
                scrollLine.style.width = container.scrollLeft + "px";
            }
        })





        function scrollDown(){
            window.scrollBy({    
            left: 0, 
            top: window.innerHeight,
            behavior: "smooth"
        
        });
        }



        var opacity = 1
        var lastScrollTop = 0;
        var textOpacity = 0.1
        window.addEventListener('scroll', function(e) {


            // console.log(window.pageYOffset);
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
            

            if (window.pageYOffset > 500){
                const resourceTarget = document.querySelector("#resource");
                if (st > lastScrollTop && textOpacity <= 1.00000000001){
                    textOpacity = textOpacity / 0.95;
                }
                else if (st <= lastScrollTop && pageYOffset < 961){
                    textOpacity = textOpacity * 0.98;
                }
                if (window.pageYOffset > 961){
                    textOpacity = 1;
                }
                
                resourceTarget.style.opacity = textOpacity;
            }
            

            lastScrollTop = st <= 0 ? 0 : st;
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
<script src="javascript/home.js"></script>
</html>