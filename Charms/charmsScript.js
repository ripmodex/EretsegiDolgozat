document.addEventListener("DOMContentLoaded", () => {
    const charmsContainer = document.querySelector("[data-charms-container]");
    const charmsTemplate = document.querySelector("[data-charms-template]");
    const searchInput = document.querySelector("[data-search]");
    const categoryFilter = document.querySelector("[data-filter-category]");
    const notchFilter = document.querySelector("[data-filter-notches]");

    let charms = [];

    function applyFilters(){
        const searchValue = searchInput.value.toLowerCase();
        const categoryValue = categoryFilter.value;
        const notchValue = notchFilter.value;

        charms.forEach(charm => {
            const matchesSearch = charm.name.includes(searchValue);
            const matchesCategory = (categoryValue === "all" || charm.category === categoryValue);
            const matchesNotches = (notchValue === "all" || charm.notches.toString() === notchValue);

            charm.element.classList.toggle("hide", !(matchesSearch && matchesCategory && matchesNotches));
        });
    }
    //the search function
    fetch("../Search/searchCharmsAPI.php")
        .then(res => res.json())
        .then(data => {
            charms = data.map(charm => {
                const card = charmsTemplate.content.cloneNode(true).children[0];

                card.dataset.name = charm.name;
                card.dataset.description = charm.description;
                card.dataset.location = charm.location;
                card.dataset.category = charm.category;
                card.dataset.image = `../Kepek/Charms/${charm.imagePath}`;
                card.dataset.notches = charm.notches;

                const img = card.querySelector("[data-card-img]");
                if(img){
                    img.src = `../Kepek/Charms/${charm.imagePath}`;
                    img.alt = charm.name;
                }

                charmsContainer.append(card);
                return { name: charm.name.toLowerCase(), category: charm.category, notches: charm.notches, element: card };
            });
        });

    searchInput.addEventListener("input", applyFilters);
    categoryFilter.addEventListener("change", applyFilters);
    notchFilter.addEventListener("change", applyFilters);
});

window.showDetails = function(element){
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

    const modalImg = document.getElementById("modalImg");
    modalImg.src = image;
    modalImg.alt = name;

    const notchContainer = document.getElementById("modalNotches");
    let notchHTML = "";
    for(let i = 0; i < notches; i++){
        notchHTML += "<img src='../Kepek/Charms/notch.png' class='notchIcon'>";
    }
    notchContainer.innerHTML = notchHTML;

    document.getElementById("charmModal").style.display = "flex";
}

window.closeModal = function(){
    document.getElementById("charmModal").style.display = "none";
}