function showDetails(name, desc, img, notches){
    console.log("Clicked!");
    document.getElementById("modalName").innerText = name;
    document.getElementById("modalDescription").innerText = desc;
    document.getElementById("modalImg").src = img;
    //document.getElementById("modalNotches").innerText = "Notches: " + notches;
    const notchContainer = document.getElementById("modalNotches");
    notchContainer.innerHTML = "";
    for(let i=0; i<notches; i++){
        notchContainer.innerHTML += "<img src='../Kepek/Charms/notch.png' class='notchIcon'>";
    }
    document.getElementById("charmModal").style.display = "flex";
}

function closeModal(){
    document.getElementById("charmModal").style.display = "none";
}