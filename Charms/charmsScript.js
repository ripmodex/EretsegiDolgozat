function showDetails(name, desc, location, category, img, notches){
    console.log("Clicked!");
    document.getElementById("modalName").innerText = name;
    document.getElementById("modalDescription").innerText = desc;
    document.getElementById("modalLocation").innerText = "Location: " + location;
    document.getElementById("modalCategory").innerText = "Category: " + category;
    document.getElementById("modalImg").src = img;
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