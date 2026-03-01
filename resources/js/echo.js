import Echo from "laravel-echo";

import Pusher from "pusher-js";
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "reverb",
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? "https") === "https",
    enabledTransports: ["ws", "wss"],
});

const userId = document.getElementById("profile").dataset.id;
const conversationId = window.location.pathname.split("/conversation/")[1];
const chatContainer = document.getElementById("chat-container");

window.Echo.private(`App.Models.User.${userId}`).listen("GotMessage", (e) => {
    let conversation = document.querySelector(
        `[data-conversation='${e.conversation_id}']`,
    );
    if (conversationId && e.conversation_id == conversationId) {
        let isMine = e.sender_id === userId ? true : false;

        const message = `
            <div class="bg-indigo-800 rounded-xl ${isMine ? "rounded-br-none self-end" : "rounded-bl-none self-start"} max-w-1/2 py-2 px-4">
                    <p class="text-white">${e.body}</p>
                    <div class="flex justify-between items-center mt-2 gap-4">
                        <span class="text-white text-[8px]">${e.created_at}</span>
                        <span class="text-white text-[8px]">${e.last_read_at > e.created_at && isMine ? "read" : "sent"}</span>
                    </div>
                </div>
        `;

        chatContainer.insertAdjacentHTML("beforeend", message);
        chatContainer.scrollTo(0, chatContainer.scrollHeight);
        conversation.querySelector(`[data-element='body']`).textContent =
            e.body;
    } else {
        if (!conversation) {
            document.getElementById("chats").innerHTML = "";
            const conversationHTML = `
                <li data-conversation="${e.conversation_id}">
					<a href="/conversation/${e.conversation_id}" class="relative rounded-md px-4 py-2 text-sm font-medium border-b flex items-center gap-2 border-gray-200 text-gray-500 hover:bg-gray-100 hover:text-gray-700">
						<div>
							<img alt="" src="/storage/${e.user.profile_pic}" class="size-10 rounded-full object-cover">
						</div>
						<div class="w-9/12">
							<p class="font-bold text-gray-800">${e.user.name}</p>
							<p data-element="body" class="truncate">${e.body}</p>
						</div>
						<div class="min-w-4 h-4 p-1 bg-indigo-800 rounded-full flex justify-center items-center absolute right-4">
							<p data-element="unread" class="text-[12px] text-center text-white">1</p>
						</div>
					</a>
			    </li>
            `;
            document
                .getElementById("chats")
                .insertAdjacentHTML("afterbegin", conversationHTML);
        } else {
            conversation.querySelector(`[data-element='body']`).textContent =
                e.body;

            if (
                conversation.querySelector(`[data-element='unread']`)
                    .textContent > 0
            ) {
                conversation.querySelector(`[data-element='unread']`)
                    .textContent++;
            } else {
                conversation.querySelector(
                    `[data-element='unread']`,
                ).textContent = 1;
            }
        }
    }
});
