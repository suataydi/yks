document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');
    const chatForm = document.getElementById('chatForm');
    const messagesContainer = document.getElementById('messages');
    const usernameSpan = document.getElementById('username-span');
    const errorMessage = document.getElementById('error-message');

    // Giriş formunu işleme
    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            fetch('/functions/login', {
                method: 'POST',
                body: JSON.stringify({ username, password }),
                headers: { 'Content-Type': 'application/json' }
            })
            .then(response => response.json())
            .then(data => {
                if (data.message === 'Başarıyla giriş yapıldı') {
                    localStorage.setItem('username', username);
                    window.location.href = '/chat';
                } else {
                    errorMessage.innerHTML = 'Hatalı giriş! Tekrar deneyin.';
                }
            });
        });
    }

    // Sohbet formunu işleme
    if (chatForm) {
        const username = localStorage.getItem('username');
        if (username) {
            usernameSpan.textContent = username;
        }

        chatForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const message = document.getElementById('message').value;

            fetch('/functions/chat', {
                method: 'POST',
                body: JSON.stringify({ username, message }),
                headers: { 'Content-Type': 'application/json' }
            })
            .then(response => response.json())
            .then(data => {
                const newMessage = document.createElement('p');
                newMessage.textContent = `${data.username}: ${data.text}`;
                messagesContainer.appendChild(newMessage);
                document.getElementById('message').value = '';
            });
        });
    }
});
