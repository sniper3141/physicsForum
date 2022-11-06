function changeMode(){
    document.querySelector("#errorText").classList.add("hidden")
    document.querySelector("#email").style.borderColor = "#d3d3d3"
    // document.querySelector("#confirmPass").style.borderColor = "#d3d3d3";
    document.querySelector("#pass").style.borderColor = "#d3d3d3";
    
    document.querySelector(".passNotMatch").classList.add("hidden");
    document.querySelector(".passNotLong").classList.add("hidden");
    document.querySelector("#email").value = "";
    document.querySelector("#pass").value = "";
    document.querySelector("#confirmPass").value = "";
    document.querySelector(".sign-up-button").disabled = true;
    document.querySelector(".sign-up-button").style.backgroundColor = "#6b6e8b";


    if (document.querySelector(".redirect").classList.contains("signup")){
        document.querySelector("#signUpHalf").classList.remove("left");
        document.querySelector("#signUpHalf").style.left = "50%";
        document.querySelector(".redirect").classList.remove("signup");
        document.querySelector(".title").classList.remove("signup");
        document.querySelector(".form").classList.remove("signup");

        document.querySelector(".redirect").classList.add("login");
        document.querySelector(".title").classList.add("login");
        document.querySelector(".form").classList.add("login");
        document.querySelector(".redirect").innerHTML = "Don't have an account?";
        document.querySelector(".form").action = "./includes/login.inc.php";
        document.querySelector("#confirmPass").removeAttribute('required');
        document.querySelector("#welcomeInfo").innerHTML = "Login to access this physics forum";
        document.querySelector(".sign-up-button").value = "Login";
        
    }
    else if (document.querySelector(".redirect").classList.contains("login")){
        document.querySelector("#signUpHalf").classList.remove("right");
        document.querySelector("#signUpHalf").style.left = "0%";
        document.querySelector(".redirect").classList.remove("login");
        document.querySelector(".title").classList.remove("login");
        document.querySelector(".form").classList.remove("login");

        document.querySelector(".redirect").classList.add("signup");
        document.querySelector(".title").classList.add("signup");
        document.querySelector(".form").classList.add("signup");
        document.querySelector(".redirect").innerHTML = "Already a User? Login";
        document.querySelector(".form").action = "./includes/sign_up.inc.php";
        document.querySelector("#confirmPass").setAttribute('required', 'required');
        document.querySelector("#welcomeInfo").innerHTML = "Create an account to join a community of physicists";
        document.querySelector(".sign-up-button").value = "Sign Up";
        
    }

    changeContent();
}


function changeContent(){
    if (document.querySelector(".redirect").classList.contains("signup")){
        document.querySelector(".title").innerHTML = "Sign Up";
        document.querySelector(".confirmPassword").classList.remove("hidden");
        document.querySelector(".confirmPasswordText").classList.remove("hidden");
    }
    else{
        document.querySelector(".title").innerHTML = "Login";
        document.querySelector(".confirmPassword").classList.add("hidden");
        document.querySelector(".confirmPasswordText").classList.add("hidden");       
    }
    
    storePage();
}

function checkValid(){
    if (!document.querySelector(".input").value.includes("@esms.org.uk") && document.querySelector(".input").value !== ""){
        document.querySelector("#email").style.borderColor = "#EA6565";
        document.querySelector("#errorText").classList.remove("hidden");
        document.querySelector(".sign-up-button").disabled = true;
        document.querySelector(".sign-up-button").style.backgroundColor = "#6b6e8b";
    }
    else if(document.querySelector(".input").value == ""){
        document.querySelector("#email").style.borderColor = "#d3d3d3";
        document.querySelector("#errorText").classList.add("hidden");
        document.querySelector(".sign-up-button").disabled = true;
        document.querySelector(".sign-up-button").style.backgroundColor = "#6b6e8b";
    }
    else{
        document.querySelector("#email").style.borderColor = "green";
        document.querySelector("#errorText").classList.add("hidden");
        document.querySelector(".sign-up-button").disabled = true;
        document.querySelector(".sign-up-button").style.backgroundColor = "#6b6e8b";
    }

    if (document.querySelector("#email").style.borderColor == "green" && document.querySelector("#pass").style.borderColor == "#green" && document.querySelector("#confirmPass").style.borderColor == "#green"){
        document.querySelector(".sign-up-button").disabled = false;
        document.querySelector(".sign-up-button").backgroundColor = "#3E50FB";
    }
}

function validPass(){
    if (document.querySelector(".sign-up-button").value !== "Login"){

        if(document.querySelector("#pass").value.length < 8 && document.querySelector("#pass").value !== ""){
            document.querySelector("#pass").style.borderColor = "#EA6565";
            document.querySelector(".passNotMatch").classList.add("hidden");
            document.querySelector("#confirmPass").style.borderColor = "#d3d3d3";
            document.querySelector(".passNotLong").classList.remove("hidden");
            document.querySelector(".sign-up-button").disabled = true;
            document.querySelector(".sign-up-button").style.backgroundColor = "#6b6e8b";
        }
        else if(document.querySelector("#pass").value == "" || document.querySelector("#confirmPass").value == "" ){
            document.querySelector("#pass").style.borderColor = "#d3d3d3";
            document.querySelector(".passNotLong").classList.add("hidden");
            document.querySelector("#confirmPass").style.borderColor = "#d3d3d3";
            document.querySelector(".passNotMatch").classList.add("hidden");
            document.querySelector(".sign-up-button").disabled = true;
            document.querySelector(".sign-up-button").style.backgroundColor = "#6b6e8b";
        }
        else if (document.querySelector("#pass").value !== document.querySelector("#confirmPass").value && document.querySelector("#pass").value !== "" && document.querySelector("#confirmPass").value !== ""){
            document.querySelector("#pass").style.borderColor = "#EA6565";
            document.querySelector("#confirmPass").style.borderColor = "#EA6565";
            document.querySelector(".passNotLong").classList.add("hidden");
            document.querySelector(".passNotMatch").classList.remove("hidden");
            document.querySelector(".sign-up-button").disabled = true;
            document.querySelector(".sign-up-button").style.backgroundColor = "#6b6e8b";
        }

        else if(document.querySelector("#pass").value !== "" && document.querySelector("#confirmPass").value !== ""){
            document.querySelector("#pass").style.borderColor = "green";
            document.querySelector("#confirmPass").style.borderColor = "green";
            document.querySelector(".passNotMatch").classList.add("hidden");
            document.querySelector(".passNotLong").classList.add("hidden");
            document.querySelector(".sign-up-button").disabled = true;
            document.querySelector(".sign-up-button").style.backgroundColor = "#6b6e8b";
        }
        if (document.querySelector("#email").style.borderColor == "green" && document.querySelector("#pass").style.borderColor == "green" && document.querySelector("#confirmPass").style.borderColor == "green"){
            document.querySelector(".sign-up-button").disabled = false;
            document.querySelector(".sign-up-button").style.backgroundColor = "#3E50FB";
        }
    }
    else{
        if (document.querySelector("#pass").value.length < 8 && document.querySelector("#pass").value !== ""){
            document.querySelector("#pass").style.borderColor = "#EA6565";
            document.querySelector(".passNotLong").classList.remove("hidden");
            document.querySelector(".sign-up-button").disabled = true;
            document.querySelector(".sign-up-button").style.backgroundColor = "#6b6e8b";
            
        }
        else if(document.querySelector("#pass").value.length >= 8){
            document.querySelector("#pass").style.borderColor = "green";
            document.querySelector(".passNotLong").classList.add("hidden");
            document.querySelector(".sign-up-button").disabled = true;
            document.querySelector(".sign-up-button").style.backgroundColor = "#6b6e8b";
        }
        else{
            document.querySelector("#pass").style.borderColor = "#d3d3d3";
            document.querySelector(".passNotLong").classList.add("hidden");
            document.querySelector(".sign-up-button").disabled = true;
            document.querySelector(".sign-up-button").style.backgroundColor = "#6b6e8b";
        }
        if (document.querySelector("#email").style.borderColor == "green" && document.querySelector("#pass").style.borderColor == "green"){
            document.querySelector(".sign-up-button").disabled = false;
            document.querySelector(".sign-up-button").style.backgroundColor = "#3E50FB";
        }
    }
}

