//just for debugging, I found the right way, and I did the mapping with this, getting coords of each area
/*
document.getElementById('mapDisplay').addEventListener('click', function(e) {
    const rect = this.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    console.log("Current Pixel Coords: " + Math.round(x) + ", " + Math.round(y));
});*/

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