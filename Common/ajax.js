//i dont know, it is not working, i will stick to it, and not do it like this, if it is not necessary
function loadPage(page){

    fetch(page)
        .then(res => res.text())
        .then(data => {
                document.getElementById('content').innerHTML = data;
                history.pushState(null, "", page);
        })
        .catch(err => {
            console.log(err);
            document.getElementById("content").innerHTML = "Error loading page.";
        });
}

document.addEventListener("DOMContentLoaded", () => {

    document.querySelectorAll(".navLink").forEach(link => {
        link.addEventListener("click", function(e) {
            e.preventDefault();

            let page = this.getAttribute("href") || this.dataset.href;

            if(page && page !== "#"){
                loadPage(page);
            }
        });
    });
});