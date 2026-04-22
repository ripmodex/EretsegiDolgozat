const areaSearchInput = document.querySelector("[data-search-area]");
const resultsDropdown = document.getElementById("searchResults");

const areaData = Array.from(document.querySelectorAll("[data-area-item]")).map(card => {
    return{
        name: card.dataset.name, id: card.id, element: card
    };
});

areaSearchInput.addEventListener("input", (e) => {
    const value = e.target.value.toLowerCase();
    resultsDropdown.innerHTML = "";

    if(value.length > 0){
        const filtered = areaData.filter(area => area.name.includes(value));

        if(filtered.length > 0){
            resultsDropdown.style.display = "block";
            filtered.forEach(area => {
                const div = document.createElement("div");
                div.classList.add("searchResultItem");
                div.innerText = area.name.charAt(0).toUpperCase() + area.name.slice(1);

                div.onclick = () => {
                    const target = document.getElementById(area.id);
                    target.scrollIntoView({behavior: 'smooth', block: "center"});

                    target.style.backgroundColor = "rgba(58, 175, 255, 0.2)";
                    setTimeout(() => target.style.backgroundColor = "transparent", 2000);

                    resultsDropdown.style.display = "none";
                    areaSearchInput.value = "";
                };
                resultsDropdown.appendChild(div);
            });
        }
        else{
            resultsDropdown.style.display = "none";
        }
    }
    else{
        resultsDropdown.style.display = "none";
    }
});

document.addEventListener("click", (e) => {
    if(!e.target.closest(".searchBox")) {
        resultsDropdown.style.display = "none";
    }
});

let selectedIndex = -1;

areaSearchInput.addEventListener("keydown", (e) => {
    const items = resultsDropdown.querySelectorAll(".searchResultItem");

    if(items.length === 0) return;

    if(e.key === "ArrowDown"){
        e.preventDefault();
        selectedIndex = (selectedIndex + 1) % items.length;
        updateSelection(items);
    }
    else if(e.key === "ArrowUp"){
        e.preventDefault()
        selectedIndex = (selectedIndex - 1 + items.length) % items.length;
        updateSelection(items);
    }
    else if(e.key === "Enter"){
        e.preventDefault();
        if(selectedIndex > -1){
            items[selectedIndex].click();
        }
    }
});

function updateSelection(items){
    items.forEach(item => item.classList.remove("selected"));

    if(selectedIndex > -1){
        items[selectedIndex].classList.add("selected");
        items[selectedIndex].scrollIntoView({block: 'nearest'})
    }
}

areaSearchInput.addEventListener("input", () => {
    selectedIndex = -1;
});
