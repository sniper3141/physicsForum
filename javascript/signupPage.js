function changeMode(){
    if (document.querySelector(".redirect").classList.contains("signup")){
        document.querySelector(".redirect").classList.remove("signup");
        document.querySelector(".title").classList.remove("signup");
        document.querySelector(".form").classList.remove("signup");

        document.querySelector(".redirect").classList.add("login");
        document.querySelector(".title").classList.add("login");
        document.querySelector(".form").classList.add("login");
        document.querySelector(".redirect").innerHTML = "Don't have an account?"
        document.querySelector(".form").action = "./includes/login.inc.php";
        document.querySelector("#confirmPass").removeAttribute('required');
    }
    else if (document.querySelector(".redirect").classList.contains("login")){
        document.querySelector(".redirect").classList.remove("login");
        document.querySelector(".title").classList.remove("login");
        document.querySelector(".form").classList.remove("login");

        document.querySelector(".redirect").classList.add("signup");
        document.querySelector(".title").classList.add("signup");
        document.querySelector(".form").classList.add("signup");
        document.querySelector(".redirect").innerHTML = "Already have an account?"
        document.querySelector(".form").action = "./includes/sign_up.inc.php";
        document.querySelector("#confirmPass").setAttribute('required', 'required');
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