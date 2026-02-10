const loginButton=document.getElementById("loginButton");
const usernameInput=document.getElementById("username");
const passwordInput=document.getElementById("password");
const popup=document.getElementById("popup");
const errorMessage=document.getElementById("errorMessage")

loginButton.addEventListener('click', function(){
    const user=usernameInput.value;
    const pass=passwordInput.value;

    if(user === "" || pass === ""){
        errorMessage.style.display='block';
    }
    else{
        errorMessage.style.display='none';
        popup.style.display='block';
        usernameInput.value='';
        passwordInput.value='';
    }
});

function closePopup(){
    popup.style.display='none';
}