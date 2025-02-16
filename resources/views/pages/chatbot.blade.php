@extends('layout.app') {{-- Extend the same layout as the menu view --}}

@section('content')
{{-- image --}}
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_5.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center mb-5">
                    <h1 class="mb-2 bread">Assistant</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span>
                        <span>Assistant <i class="fa fa-chevron-right"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>
{{-- assistant div --}}
    <section class="ftco-section " style="background-image: url('images/about.jpg');">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">GrilledTaste</span>
                    <h2 class="mb-4">Chat with Us</h2>
                </div>
            </div>

            <!-- Chatbot Container -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="chatbot-container">
                        <!-- Chatbot Header -->
                        <div class="chatbot-header">
                            AI Assistant
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
                </div>
            </div>
        </div>
    </section>

    <style>


        body {background-color: #313131;}


        /* Chatbot Styles */
        .chatbot-container {
            width: 100%;
            background-color:  #222;
            border-radius: 10px;
            box-shadow: 0 10px 60px rgba(80, 0, 0, 0.5);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .chatbot-header {
            background-color: #ff0000;
            color: #1b1010;
            padding: 5px;
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            font-family: 'Dancing Script', cursive;

        }

        .chatbot-body {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
            border-bottom: 1px solid #ddd;
            max-height: 400px;
            min-height: 100px;
            background-color: #111;
        }

        .chatbot-footer {
            padding: 15px;
            background-color: #222;
            display: flex;
            gap: 10px;
        }

        #userMessage {
            flex: 1;
            padding: 10px;
            border: 1px solid #ff0000;
            border-radius: 5px;
            resize: none;
            background-color: #444;
            font-size: 14px;
            color: white;
        }

        #sendBtn {
             padding: 10px 20px;
             background-color:#ff0000;
             color: #fff;
             border: none;
             border-radius: 5px;
             cursor: pointer;
             font-size: 14px;
        }

        #sendBtn:hover {
            background-color: #cc0000;
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
            background-color: #ff0000;
            color: #fff;
        }

        .message.bot .message-content {
            background-color: #f1f1f1;
            color: #333;
        }

        .message-timestamp {
            font-size: 12px;
            color: #aaa;
            margin-top: 5px;
        }
    </style>

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
@endsection
