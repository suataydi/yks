const socket = io("http://localhost:5000");

const chatBox = document.getElementById('chat-box');
const messageInput = document.getElementById('message-input');

// Mesaj gönderme fonksiyonu
function sendMessage() {
    const message = messageInput.value;
    if (message.trim() !== "") {
        // Kullanıcı mesajı
        socket.emit("send_message", message);
        appendMessage(message, 'user-message');
    }
    messageInput.value = ''; // Mesaj kutusunu temizle
    chatBox.scrollTop = chatBox.scrollHeight; // En son mesaja kaydır
}

// Sohbete yeni bir mesaj ekleme
function appendMessage(message, className) {
    const messageElement = document.createElement('div');
    messageElement.classList.add('message', className);
    messageElement.innerText = message;
    chatBox.appendChild(messageElement);
}

// Sunucudan gelen mesajı dinleme
socket.on("receive_message", (message) => {
    appendMessage(message, 'other-user-message');
});
