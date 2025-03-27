// Kullanıcı ve bot mesajlarını saklamak için basit bir yapı
const chatBox = document.getElementById('chat-box');
const messageInput = document.getElementById('message-input');

// Mesaj gönderme fonksiyonu
function sendMessage() {
    const message = messageInput.value;
    if (message.trim() !== "") {
        // Kullanıcı mesajı
        appendMessage(message, 'user-message');

        // Bot yanıtı
        setTimeout(() => {
            const botResponse = "Bot: " + generateBotResponse(message);
            appendMessage(botResponse, 'bot-message');
        }, 1000);
    }

    // Mesaj kutusunu temizle
    messageInput.value = '';
    chatBox.scrollTop = chatBox.scrollHeight; // En son mesaja kaydır
}

// Mesajı chatbox'a ekleyen fonksiyon
function appendMessage(message, className) {
    const messageElement = document.createElement('div');
    messageElement.classList.add('message', className);
    messageElement.innerText = message;
    chatBox.appendChild(messageElement);
}

// Basit bir bot yanıtı oluşturma fonksiyonu
function generateBotResponse(userMessage) {
    if (userMessage.toLowerCase().includes("merhaba")) {
        return "Merhaba, size nasıl yardımcı olabilirim?";
    } else if (userMessage.toLowerCase().includes("nasılsın")) {
        return "Ben bir botum, ama iyi sayılırım!";
    } else {
        return "Bunu anlayamadım, tekrar deneyin.";
    }
}
