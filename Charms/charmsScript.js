function showDetails(element){

    const name = element.dataset.name;
    const desc = element.dataset.description;
    const location = element.dataset.location;
    const category = element.dataset.category;
    const image = element.dataset.image;
    const notches = parseInt(element.dataset.notches);

    document.getElementById("modalName").innerText = name;
    document.getElementById("modalDescription").innerText = desc;
    document.getElementById("modalLocation").innerText = "Location: " + location;
    document.getElementById("modalCategory").innerText = "Category: " + category;
    const ModalImg = document.getElementById('modalImg');
    ModalImg.src = image;
    ModalImg.alt = name;
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

const categoryFilter = document.querySelector("[data-filter-category]");
const notchFilter = document.querySelector("[data-filter-notches]");

function applyFilters(){
    const searchValue = searchInput.value.toLowerCase();
    const categoryValue = categoryFilter.value;
    const notchValue = notchFilter.value;

    charms.forEach(charm => {
        const matchesSearch = charm.name.includes(searchValue);
        const matchesCategory = (categoryValue === "all" || charm.category === categoryValue);
        const matchesNotches = (notchValue === "all" || charm.notches.toString() === notchValue);

        if(matchesSearch && matchesCategory && matchesNotches){
            charm.element.classList.remove("hide");
        }
        else{
            charm.element.classList.add("hide");
        }
    });
}

searchInput.addEventListener("input", applyFilters);
categoryFilter.addEventListener("change", applyFilters);
notchFilter.addEventListener("change", applyFilters);