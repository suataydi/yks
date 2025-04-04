// password.js
const correctPassword = "197346";

function checkPassword() {
  const userInput = document.getElementById("passwordInput").value;
  const overlay = document.getElementById("passwordOverlay");
  const errorMsg = document.getElementById("errorMsg");

  if (userInput === correctPassword) {
    overlay.classList.add("fadeOut");
    setTimeout(function() {
      overlay.style.display = "none";
    }, 1000);
  } else {
    errorMsg.style.display = "block";
    overlay.classList.add("shake");
    setTimeout(function() {
      overlay.classList.remove("shake");
    }, 500);
  }
}
