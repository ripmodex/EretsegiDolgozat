function openMap(){
    const overlay = document.getElementById("mapOverlay");
    if(overlay){
        overlay.style.display="flex";
        overlay.classList.add("active");
    }
}

function closeMap(){
    const overlay = document.getElementById("mapOverlay");
    if(overlay){
        overlay.style.display="none";
        overlay.classList.remove("active");
    }
}

window.onclick=function(event){
    let overlay=document.getElementById("mapOverlay");
    if(event.target===overlay){
        overlay.style.display="none";
    }
}

function takeMap(targetId){
    console.log("takeMap called with ID:", targetId);
    const isMainPage = window.location.pathname.includes("main.php");
    console.log("Are we on main page?", isMainPage);

    if(isMainPage){
        const targetElement = document.getElementById(targetId);

        if(targetElement){
            const overlay = document.getElementById("mapOverlay");
            if(overlay){
                overlay.style.display = "none";
            }
            targetElement.scrollIntoView({behavior: 'smooth', block: 'center'});
            targetElement.style.backgroundColor = "rgba(58, 175, 255, 0.2)";
            setTimeout(() => targetElement.style.backgroundColor = "transparent", 2000);
        }
        else {
            alert("Error: Could not find ID '" + targetId + "' on this page.");
        }
    }
    else{
        const targetURL= "../Main/main.php#" + targetId;
        window.location.assign(targetURL);
    }

}

document.addEventListener("DOMContentLoaded", () => {
    const topBtn = document.getElementById("backToTop");
    const contentDiv = document.getElementById("content");
    if(topBtn && contentDiv){
        topBtn.addEventListener("click", () => {
            console.log("Back to top clicked!");
            contentDiv.scrollTo({top: 0, behavior: 'smooth'});
        });
    }
});

const mapImage=document.getElementById("mapDisplay");
const originalSrc="../Kepek/Map/main.jpg";

function changeImage(newSrc){
    mapImage.src=newSrc;
}

function resetImage(){
    mapImage.src=originalSrc;
}

function playHoverSound(){
    const sound=document.getElementById("hoverSound");
    sound.pause();
    sound.currentTime=0;
    sound.volume=0.3;
    sound.play().catch(error=>{
        console.log("Audio waiting for user interaction...");
    });
}

const preloadImages=[
    "../Kepek/Map/main.jpg",
    "../Kepek/Map/forgottenCrossroads.jpg",
    "../Kepek/Map/ancientBasin.jpg",
    "../Kepek/Map/cityofTears.jpg",
    "../Kepek/Map/crystalPeak.jpg",
    "../Kepek/Map/deepnest.jpg",
    "../Kepek/Map/dirtmouth.jpg",
    "../Kepek/Map/fogCanyon.jpg",
    "../Kepek/Map/forgottenCrossroads.jpg",
    "../Kepek/Map/fungalWastes.jpg",
    "../Kepek/Map/greenpath.jpg",
    "../Kepek/Map/howlingCliffs.jpg",
    "../Kepek/Map/kingdomsEdge.jpg",
    "../Kepek/Map/queensGardens.jpg",
    "../Kepek/Map/restingGrounds.jpg",
    "../Kepek/Map/royalWaterways.jpg",
    "../Kepek/Map/theHive.jpg",
]

preloadImages.forEach(src=>{
    const img=new Image();
    img.src=src;
})
