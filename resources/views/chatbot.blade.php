<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>OpenAI Chatbot</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .chatbot-container {
            width: 400px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .chatbot-header {
            background-color: #007bff;
            color: #fff;
            padding: 15px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

        .chatbot-body {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
            border-bottom: 1px solid #ddd;
        }

        .chatbot-footer {
            padding: 15px;
            background-color: #f9f9f9;
            display: flex;
            gap: 10px;
        }

        #userMessage {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: none;
            font-size: 14px;
        }

        #sendBtn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        #sendBtn:hover {
            background-color: #0056b3;
        }

        .message {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }

        .message.user {
            align-items: flex-end;
        }

        .message.bot {
            align-items: flex-start;
        }

        .message-content {
            max-width: 70%;
            padding: 10px;
            border-radius: 10px;
            font-size: 14px;
        }

        .message.user .message-content {
            background-color: #007bff;
            color: #fff;
        }

        .message.bot .message-content {
            background-color: #f1f1f1;
            color: #333;
        }

        .message-timestamp {
            font-size: 12px;
            color: #888;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="chatbot-container">
        <!-- Chatbot Header -->
        <div class="chatbot-header">
            OpenAI Chatbot
        </div>

        <!-- Chat History -->
        <div class="chatbot-body" id="chatLog">
            <!-- Chat messages will be dynamically added here -->
        </div>

        <!-- Chat Input -->
        <div class="chatbot-footer">
            <textarea id="userMessage" rows="1" placeholder="Type your message..."></textarea>
            <button id="sendBtn">Send</button>
        </div>
    </div>

    <script>
        document.getElementById('sendBtn').addEventListener('click', async () => {
            const message = document.getElementById('userMessage').value.trim();

            if (!message) return; // Don't send empty messages

            // Clear the input
            document.getElementById('userMessage').value = '';

            // Add user message to the chat log
            const chatLog = document.getElementById('chatLog');
            const userMessageElement = document.createElement('div');
            userMessageElement.classList.add('message', 'user');
            userMessageElement.innerHTML = `
                <div class="message-content">${message}</div>
                <div class="message-timestamp">${new Date().toLocaleTimeString()}</div>
            `;
            chatLog.appendChild(userMessageElement);

            try {
                // Make a POST request to the chatbot route
                const response = await fetch('/sendchat', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ message: message })
                });

                // Check if the response is OK (status 200-299)
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }

                // Parse the JSON response
                const data = await response.json();

                // Display the chatbot's reply
                if (data.reply) {
                    const botMessageElement = document.createElement('div');
                    botMessageElement.classList.add('message', 'bot');
                    botMessageElement.innerHTML = `
                        <div class="message-content">${data.reply}</div>
                        <div class="message-timestamp">${new Date().toLocaleTimeString()}</div>
                    `;
                    chatLog.appendChild(botMessageElement);
                } else if (data.error) {
                    const errorMessageElement = document.createElement('div');
                    errorMessageElement.classList.add('message', 'bot');
                    errorMessageElement.innerHTML = `
                        <div class="message-content" style="color: red;">Error: ${data.error}</div>
                    `;
                    chatLog.appendChild(errorMessageElement);
                }
            } catch (error) {
                // If there's any fetch or parsing error, show it in the chat
                const errorMessageElement = document.createElement('div');
                errorMessageElement.classList.add('message', 'bot');
                errorMessageElement.innerHTML = `
                    <div class="message-content" style="color: red;">Exception: ${error}</div>
                `;
                chatLog.appendChild(errorMessageElement);
            }

            // Scroll to the bottom of the chat log
            chatLog.scrollTop = chatLog.scrollHeight;
        });
    </script>
</body>
</html>
