function openMap(){
    const overlay = document.getElementById("mapOverlay");
    if(overlay){
        overlay.style.display="flex";
    }
}

function closeMap(){
    const overlay = document.getElementById("mapOverlay");
    if(overlay){
        overlay.style.display="none";
    }
}

window.onclick=function(event){
    let overlay=document.getElementById("mapOverlay");
    if(event.target===overlay){
        overlay.style.display="none";
    }
}

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
    "../Kepek/Map/queensGarden.jpg",
    "../Kepek/Map/restingGrounds.jpg",
    "../Kepek/Map/royalWaterways.jpg",
    "../Kepek/Map/theHive.jpg",
]

preloadImages.forEach(src=>{
    const img=new Image();
    img.src=src;
})
