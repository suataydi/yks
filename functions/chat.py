# functions/chat.py
import json
import os
from flask import Flask, render_template, request, redirect, session

app = Flask(__name__)
app.secret_key = "supersecretkey"

PASSWORD = "197346"
MESSAGES_FILE = "messages.json"

if not os.path.exists(MESSAGES_FILE):
    with open(MESSAGES_FILE, "w") as f:
        json.dump([], f)

def load_messages():
    with open(MESSAGES_FILE, "r") as f:
        return json.load(f)

def save_message(username, text):
    messages = load_messages()
    messages.append({"username": username, "text": text})
    with open(MESSAGES_FILE, "w") as f:
        json.dump(messages, f)

@app.route("/chat", methods=["GET", "POST"])
def chat():
    if "username" not in session:
        return redirect("/")

    if request.method == "POST":
        message = request.form.get("message")
        if message:
            save_message(session["username"], message)

    messages = load_messages()
    return render_template("chat.html", username=session["username"], messages=messages)

# Netlify functions için doğru endpoint yönlendirmesini yapın
def handler(request):
    return app(request)
