document.addEventListener("DOMContentLoaded", function() {
    const loginButton=document.getElementById("loginButton");

    loginButton.addEventListener("click", function() {
        window.open("login.html", "_blank");
    })
})

document.addEventListener("DOMContentLoaded", function() {
    const signupButton=document.getElementById("signupButton");

    signupButton.addEventListener("click", function() {
        window.open("signup.html", "_blank");
    })
})