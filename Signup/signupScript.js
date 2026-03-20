const form = document.querySelector('#signup');
const emailInput = document.querySelector('#email');

form.addEventListener('submit', async (event) => {
    event.preventDefault();

    /*document.querySelectorAll(".error-text").forEach(el =>{
        el.textContent="";
        el.classList.remove("errorActive");
    });*/

    const allErrors = document.querySelectorAll(".error-text");
    allErrors.forEach(span => {
        span.textContent = "";
        span.classList.remove("errorActive");
    });

    let isValid=true;

    const username=document.querySelector("#username").value;
    if(username.trim()===""){
        showError("usernameError", "Username is required");
        isValid=false;
    }

    const password=document.querySelector("#password").value;
    const passwordAgain=document.querySelector("#passwordAgain").value;
    const passwordError=document.querySelector("passwordError");
    if(password.length<8){
        showError("passwordError", "Password must be at least 8 characters");
        isValid=false;
    }
    else if(!/[a-z]/i.test(password)){
        showError("passwordError", "Password must contain at least one character");
        isValid=false;
    }
    else if(!/[0-9]/.test(password)){
        showError("passwordError", "Password must contain at least one number");
        isValid=false;
    }

    if(/*isValid &&*/ password !== passwordAgain){
        showError("passwordAgainError", "Password must match");
        isValid=false;
    }

    const email=document.querySelector("#email");
    if(!email.value.includes("@")){
        showError("emailError", "Please enter a valid email");
        isValid=false;
    }
    else{
        const isAvaible= await checkEmailAvailability(emailInput.value);
        if(!isAvaible){
            showError("emailError", "Email is already taken");
            isValid=false;
        }
    }

    if(isValid){
        form.submit();
    }
});

document.querySelector("#password").addEventListener("input", function() {
    const errorSpan = document.getElementById("passwordError");

    const val = this.value;
    const hasLength = val.length >=8;
    const hasLetter = /[a-z]/i.test(val);
    const hasNumber = /[0-9]/.test(val);

    if(hasLength && hasLetter && hasNumber){
        errorSpan.textContent="";
        errorSpan.classList.remove("errorActive");
    }
});

document.querySelector("#passwordAgain").addEventListener("input", (e) => {
    const pass = document.querySelector("#password").value;
    const errorSpan = document.getElementById("passwordAgainError");

    if(e.target.value === pass){
        errorSpan.textContent="";
        errorSpan.classList.remove("errorActive");
    }
});

document.querySelector("#email").addEventListener("input", async function() {
   const errorSpan = document.getElementById("emailError");
   const emailValue = this.value;

   const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

   if(emailPattern.test(emailValue)){
       const isAvaible = await checkEmailAvailability(emailValue);

       if(isAvaible){
           errorSpan.textContent="";
           errorSpan.classList.remove("errorActive");
       }
       else{
           errorSpan.textContent="Please enter a valid email";
           errorSpan.classList.add("errorActive");
       }
   }
   else{
       this.style.borderColor="";
   }
});

function showError(id, message){
    const el = document.getElementById(id);
    if(el) {
        el.textContent = message;
        el.classList.add("errorActive");
    }
}

async function checkEmailAvailability(email){
    try{
        const response = await fetch("../Signup/validateEmail.php?email="+encodeURIComponent(email));
        const json = await response.json();
        return json.available;
    }
    catch(error){
        console.error("Check failed", error);
        return false;
    }
}