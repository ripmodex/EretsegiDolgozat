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

document.addEventListener('keydown', function(event){
   if(event.key === 'Escape'){
       const modal = document.getElementById("ssModal");
       if(modal.style.display === 'flex'){
           modal.style.display = 'none';
       }
   }
});

/* it is not working but i don't know if i want it to work yet, or just leave it out
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n){
    showSlides(slideIndex += n);
}

function showSlides(n){
    let slides = document.getElementsByClassName('slide');

    if(n > slides.length) {slideIndex = 1}
    if(n < 1) {slideIndex = slides.length}

    for(let i=0; i<slides.length; i++){
        slides[i].style.display = 'none';
    }

    if(slides[slideIndex-1]) {
        slides[slideIndex - 1].style.display = 'block';
    }
}
*/
