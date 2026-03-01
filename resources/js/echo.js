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

window.Echo.private(`App.Models.User.${userId}`).listen("GotMessage", (e) => {
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
    }
});
