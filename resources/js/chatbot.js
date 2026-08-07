const toggle = document.querySelector("#chat-toggle");
const chatWindow = document.querySelector("#chat-window");
const chatBody = document.querySelector("#chat-body");
const sendBtn = document.querySelector("#send-btn");
const input = document.querySelector("#chat-input");

// buka tutup chatbot
toggle.addEventListener("click", () => {
    chatWindow.style.display =
        chatWindow.style.display === "flex" ? "none" : "flex";
});

function getCurrentTime() {

    const now = new Date();

    return now.toLocaleTimeString("id-ID", {

        hour: "2-digit",

        minute: "2-digit"

    });

}

function saveChat() {

    localStorage.setItem(

        "porprov_chat",

        chatBody.innerHTML

    );

}

function loadChat() {

    const chat = localStorage.getItem(

        "porprov_chat"

    );

    if (chat) {

        chatBody.innerHTML = chat;

    }

}

// tambah bubble
function addMessage(message, sender) {

    const wrapper = document.createElement("div");

    wrapper.className = sender + "-wrapper";

    const avatar = sender === "user"
        ? "👤"
        : "👑";

    wrapper.innerHTML = `

        <div class="chat-avatar">

            ${avatar}

        </div>

        <div class="${sender}-message">

        <div>

            ${message}

        </div>

        <div class="chat-time">

            ${getCurrentTime()}

        </div>

</div>

    `;

    chatBody.appendChild(wrapper);

    chatBody.scrollTop = chatBody.scrollHeight;

    saveChat();

}

// addbot ini
function addBotResponse(data) {

    const wrapper = document.createElement("div");

    wrapper.className = "bot-wrapper";

    let html = `

        <div class="chat-avatar">
            👑
        </div>

        <div class="bot-message">

           <div>

            ${data.answer}

        </div>

        <div class="chat-time">

            ${getCurrentTime()}

        </div>

    `;

    if (data.button) {

        html += `

            <a
                class="chat-button"
                href="${data.button.url}">

                ${data.button.text}

            </a>

        `;

    }

    html += `</div>`;

    wrapper.innerHTML = html;

    chatBody.appendChild(wrapper);

    chatBody.scrollTop = chatBody.scrollHeight;

    saveChat();

}

function showTyping() {

    const wrapper = document.createElement("div");

    wrapper.className = "bot-wrapper typing-wrapper";

    wrapper.innerHTML = `

        <div class="chat-avatar">

            👑

        </div>

        <div class="typing">

            <span></span>

            <span></span>

            <span></span>

        </div>

    `;

    chatBody.appendChild(wrapper);

    chatBody.scrollTop = chatBody.scrollHeight;

    return wrapper;

}

// kirim pesan
async function sendMessage() {

    let message = input.value.trim();

    if (message === "") return;

    addMessage(message, "user");

    input.value = "";

    const typing = showTyping();

    const response = await fetch("/chatbot", {

        method: "POST",

        headers: {

            "Content-Type": "application/json",

            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .content

        },

        body: JSON.stringify({

            message: message

        })

    });

    typing.remove();

    const data = await response.json();

    addBotResponse(data);

}

sendBtn.addEventListener("click", sendMessage);

input.addEventListener("keypress", (e) => {

    if (e.key === "Enter") {

        sendMessage();

    }

});

// Muat riwayat chat saat halaman dibuka
loadChat();

if (!localStorage.getItem("porprov_chat")) {

    addBotResponse({

        answer: "Halo 👋<br>Selamat datang di Website PORPROV Jabar XV.",

        button: null

    });

}