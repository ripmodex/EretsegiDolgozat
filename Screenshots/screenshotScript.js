const dataElement = document.getElementById("phpData");
const slides = JSON.parse(dataElement.getAttribute("dataScreenshots"));
let currentIndex = 0;

function runSlideshow(){
    if(slides.length === 0) return;
    const img = document.getElementById("slideImg");
    const title = document.getElementById("slideTitle");

    img.src = "../Kepek/Screenshots/" + slides[currentIndex].imagePath;
    title.innerText = slides[currentIndex].title;

    currentIndex = (currentIndex + 1) % slides.length;
    setTimeout(runSlideshow, 5000);
}
window.onload = runSlideshow;

function openSSModal(data){
    document.getElementById("modalSSImg").src = "../Kepek/Screenshots/" + data.imagePath;
    document.getElementById("modalSSTitle").innerText = data.title;
    document.getElementById("modalSSCaption").innerText = data.caption;
    document.getElementById("ssModal").style.display = "flex";
}

