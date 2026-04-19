const charmsContainer = document.querySelector("[data-charms-container]");
const charmsTemplate = document.querySelector("[data-charms-template]");
const searchInput = document.querySelector("[data-search]");

let charms = [];

searchInput.addEventListener("input", (e) => {
    const value = e.target.value.toLowerCase();
    charms.forEach(charm => {
        const isVisible = charm.name.includes(value);
        charm.element.classList.toggle("hide", !isVisible);
    })
})

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
            if (img) {
                img.src = `../Kepek/Charms/${charm.imagePath}`;
                img.alt = charm.name;
            }

            charmsContainer.append(card);

            return { name: charm.name.toLowerCase(), category: charm.category, notches: charm.notches, element: card };
        })
    })