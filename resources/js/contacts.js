const searchInput = document.getElementById("search-friend");
const searchText = document.getElementById("search-query");
const friendContainer = document.getElementById("friend-container");

const btnResponseFriend = document.querySelectorAll(
    "button[data-target='friend_response']",
);

function debounce(func, timeout = 200) {
    let timer;
    return (...args) => {
        clearTimeout(timer);
        timer = setTimeout(() => {
            func.apply(this, args);
        }, timeout);
    };
}

if (searchInput) {
    searchInput.addEventListener(
        "keyup",
        debounce(() => {
            fetch(`/contacts/search?q=${searchInput.value}`)
                .then((res) => res.json())
                .then((data) => {
                    if (!data.success) {
                        return;
                    }

                    friendContainer.innerHTML = "";

                    if (data.data.data.length < 1) {
                        searchText.textContent = `Search for: "${searchInput.value}"`;
                        friendContainer.insertAdjacentHTML(
                            "afterbegin",
                            `
                                <p class="mb-4 text-xl font-bold text-gray-800">Sorry, we couldn't find any users by that email or username.</p>
                            `,
                        );
                        return;
                    }

                    searchText.textContent = `Search for: "${searchInput.value}"`;

                    data.data.data.forEach((user) => {
                        friendContainer.insertAdjacentHTML(
                            "beforeend",
                            `
                            <div data-id="${user.id}" class="w-[45%] border-b border-gray-400 px-4 py-2 flex justify-between items-center mb-4">
                                <div class="w-4/6 flex gap-4 justify-start items-center">
                                    <img class="size-10 rounded-full object-cover" src="/storage/${user.profile_pic}" alt="">
                                    <p class="text-gray-800 font-medium truncate w-10/12">${user.name}</p>
                                </div>
                                <form action="/contacts" method="POST">
                                    <input type="hidden" name="_token" value="${document.querySelector("meta[name='csrf-token']").getAttribute("content")}" autocomplete="off">
                                    <input type="hidden" name="_id" value="${user.id}" />
                                    <button type="submit" class="rounded-full bg-indigo-800 hover:bg-indigo-900 cursor-pointer group">
                                        <p class="text-white py-2 px-4 flex justify-center align-center gap-2">Add <svg xmlns="http://www.w3.org/2000/svg" class="self-center fill-white size-4 transform group-hover:scale-[1.2] transition duration-200" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M280 88C280 57.1 254.9 32 224 32C193.1 32 168 57.1 168 88C168 118.9 193.1 144 224 144C254.9 144 280 118.9 280 88zM304 300.7L341 350.6C353.8 333.1 369.5 317.9 387.3 305.6L331.1 229.9C306 196 266.3 176 224 176C181.7 176 142 196 116.8 229.9L46.3 324.9C35.8 339.1 38.7 359.1 52.9 369.7C67.1 380.3 87.1 377.3 97.7 363.1L144 300.7L144 576C144 593.7 158.3 608 176 608C193.7 608 208 593.7 208 576L208 416C208 407.2 215.2 400 224 400C232.8 400 240 407.2 240 416L240 576C240 593.7 254.3 608 272 608C289.7 608 304 593.7 304 576L304 300.7zM496 608C575.5 608 640 543.5 640 464C640 384.5 575.5 320 496 320C416.5 320 352 384.5 352 464C352 543.5 416.5 608 496 608zM512 400L512 448L560 448C568.8 448 576 455.2 576 464C576 472.8 568.8 480 560 480L512 480L512 528C512 536.8 504.8 544 496 544C487.2 544 480 536.8 480 528L480 480L432 480C423.2 480 416 472.8 416 464C416 455.2 423.2 448 432 448L480 448L480 400C480 391.2 487.2 384 496 384C504.8 384 512 391.2 512 400z"/></svg></p>
                                    </button>
                                </form>
                            </div>
                        `,
                        );
                    });

                    document
                        .querySelectorAll(
                            "form[action='/contacts'] button[type='submit']",
                        )
                        .forEach((btn, i) => {
                            btn.addEventListener("click", (e) => {
                                e.preventDefault();

                                fetch("/contacts", {
                                    method: "POST",
                                    headers: {
                                        "Content-Type": "application/json",
                                    },
                                    body: JSON.stringify({
                                        _token: document
                                            .querySelector(
                                                "meta[name='csrf-token']",
                                            )
                                            .getAttribute("content"),
                                        _id: btn.parentElement.querySelector(
                                            "input[name='_id']",
                                        ).value,
                                    }),
                                })
                                    .then((res) => res.json())
                                    .then((data) => {
                                        if (data.success) {
                                            btn.parentElement.parentElement.remove();
                                        }
                                    });
                            });
                        });
                });
        }),
    );
}

if (btnResponseFriend) {
    btnResponseFriend.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            e.preventDefault();
            const form = btn.parentNode;
            const responseInput = form.querySelector("input[name='_response']");

            responseInput.value = btn.dataset.action;

            form.submit();
        });
    });
}
