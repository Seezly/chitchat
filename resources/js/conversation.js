const searchForm = document.getElementById("form-search");
const searchBtn = document.getElementById("search-message");

const convoSettings = document.getElementById("convo-settings");
const convoBtn = document.getElementById("convo-btn");

if (searchBtn) {
    searchBtn.addEventListener("click", (e) => {
        searchForm.classList.toggle("max-w-0");
        searchForm.classList.toggle("max-w-64");
        searchForm.ariaHidden = "false";
    });
}

if (convoBtn) {
    convoBtn.addEventListener("click", (e) => {
        convoSettings.classList.toggle("w-0");
        convoSettings.classList.toggle("h-0");
        convoSettings.classList.toggle("w-3xs");
        convoSettings.classList.toggle("h-auto");
        convoSettings.classList.toggle("opacity-0");
    });
}
