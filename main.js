// function callForNewPage(whichContent){
//     // console.log(whichContent)
    
//     const content = whichContent;
//     window.BeforeUnloadEvent = function(){
//         localStorage.setItem("content", content.val())
//     }
//     const variable = localStorage.getItem("content")
//     console.log(variable)
    
//     if (variable == "Gravitation"){
//         document.querySelector("link[rel=import][href='Unit1.html']").import.querySelector("#GravitationNav").classList.add("underline");
//     }
//     else if (variable == "Particles"){
//         document.querySelector("#ParticlesNav").classList.add("underline");
//     }
//     window.location.href = `Unit1.html`;
    
// };

document.getElementById("div1").addEventListener("click", gravitation);
document.getElementById("div2").addEventListener("click", particles);
document.getElementById("div3").addEventListener("click", electro);

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




