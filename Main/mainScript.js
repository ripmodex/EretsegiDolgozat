function openMap(){
    document.getElementById("mapOverlay").style.display="flex"
    //setTimeout(makeMapResponsive, 50);
}

function closeMap(){
    document.getElementById("mapOverlay").style.display="none";
}

window.onclick=function(event){
    let overlay=document.getElementById("mapOverlay");
    if(event.target==overlay){
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

//just for debugging, I found the right way, and I did the mapping with this, getting coords of each area
/*
document.getElementById('mapDisplay').addEventListener('click', function(e) {
    const rect = this.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    console.log("Current Pixel Coords: " + Math.round(x) + ", " + Math.round(y));
});*/

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

//I don't know if I want to use this, but I don't want to delete it to, so for now I will save it for later
/*function makeMapResponsive(){
    const img=document.getElementById("mapImage");
    const areas=map.getElementByTagName('area');

    const ratioX=img.clientWidth/img.naturalWidth;
    const ratioY=img.clientHeight/img.naturalHeight;

    area.forEach(area=>{
        if(!area.dataset.original){
            area.dataset.original=area.getAttribute('coords');
        }
        const coords=area.dataset.original.split(',');
        const scaledCoords=coords.map((c,i)=>{
            return i%2===0 ? Math.round(c*ratioX) : Math.round(c*ratioY);
        });
        area.setAttribute('coords',scaledCoords.join(','));
    });
}*/

//window.addEventListener("resize", makeMapResponsive);