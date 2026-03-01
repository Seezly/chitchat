const searchForm = document.getElementById("form-search");
const searchBtn = document.getElementById("search-message");

const convoSettings = document.getElementById("convo-settings");
const convoBtn = document.getElementById("convo-btn");

const btnSendMessage = document.getElementById("send-message");
const formSendMessage = document.getElementById("form-message");
const bodyMessage = document.getElementById("body");

const chatContainer = document.getElementById("chat-container");

const scrollToBottom = document.getElementById("bottom");
let isLoading = false;

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

if (btnSendMessage) {
    chatContainer.scrollTo(0, chatContainer.scrollHeight);

    formSendMessage.addEventListener("submit", (e) => e.preventDefault);

    btnSendMessage.addEventListener("click", (e) => {
        e.preventDefault();
        console.log("hey");
        let message = bodyMessage.value;
        let conversation = document.querySelector(
            `[data-conversation='${window.location.pathname.split("/conversation/")[1]}']`,
        );
        bodyMessage.value = "";

        fetch(formSendMessage.action, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                _token: formSendMessage.querySelector("input[name='_token']")
                    .value,
                body: message,
            }),
        })
            .then((res) => res.json())
            .then((data) => {
                if (data.success) {
                    const messageBubble = `
                        <div class="bg-indigo-800 rounded-xl rounded-br-none self-end max-w-1/2 py-2 px-4">
                            <p class="text-white">${message}</p>
                            <div class="flex justify-between items-center mt-2 gap-4">
                                <span class="text-white text-[8px]">${new Date().toISOString()}</span>
                                <span class="text-white text-[8px]">sent</span>
                            </div>
                        </div>
                    `;

                    chatContainer.insertAdjacentHTML(
                        "beforeend",
                        messageBubble,
                    );

                    chatContainer.scrollTo(0, chatContainer.scrollHeight);
                    conversation.querySelector(
                        `[data-element='body']`,
                    ).textContent = message;
                }
            });
    });
}

if (scrollToBottom) {
    chatContainer.addEventListener("scroll", () => {
        if (chatContainer.scrollTop < 500) {
            scrollToBottom.classList.remove("hidden");
        } else {
            scrollToBottom.classList.add("hidden");
        }
    });

    scrollToBottom.addEventListener("click", () =>
        chatContainer.scrollTo(0, chatContainer.scrollHeight),
    );

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting && !isLoading) {
                    loadMore(entry.target);
                }
            });
        },
        {
            root: chatContainer,
            rootMargin: "200px",
            scrollMargin: "0px",
            threshold: 0.1,
        },
    );

    function loadMore(trigger) {
        const nextPageUrl = trigger.dataset.nextPage;

        if (!nextPageUrl) return;

        isLoading = true;

        fetch(nextPageUrl, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => response.text())
            .then((html) => {
                trigger.remove();

                chatContainer.insertAdjacentHTML("afterbegin", html);

                const newTrigger = chatContainer.querySelector(".load-trigger");
                if (newTrigger) {
                    observer.observe(newTrigger);
                }

                isLoading = false;
            })
            .catch((error) => {
                console.error("Error loading more:", error);
                isLoading = false;
            });
    }

    // Start observing initial trigger
    document.addEventListener("DOMContentLoaded", () => {
        const initialTrigger = document.querySelector(".load-trigger");
        if (initialTrigger) {
            observer.observe(initialTrigger);
        }
    });
}
