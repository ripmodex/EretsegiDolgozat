document.addEventListener("DOMContentLoaded", function() {
    const loginButton=document.getElementById("loginButton");

    loginButton.addEventListener("click", function() {
        window.open("login.html", "_blank");
    })
})