function openContactForm(){
    var overlay1 = document.querySelector("#contactOverlay1")
    var overlay2 = document.querySelector("#contactOverlay2")
    overlay1.style.top = "-30%";
    // overlay1.style.opacity = "1";
    // overlay2.style.opacity = "1";
    overlay2.style.bottom = "-30%";
    document.querySelector("#contactFormWapper").style.display = "flex";
    document.querySelector("body").style.overflow = "hidden";
}

function closeContactForm(){
    var overlay1 = document.querySelector("#contactOverlay1")
    var overlay2 = document.querySelector("#contactOverlay2")
    overlay1.style.top = "-100%";
    // overlay1.style.opacity = "0";
    // overlay2.style.opacity = "0";
    overlay2.style.bottom = "-100%";
    document.querySelector("#contactFormWapper").style.display = "none";
    document.querySelector("body").style.overflowY = "scroll";
}