<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<style>
    .chat-bot {
        font-family: "Poppins", serif;
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999;
    }

    .chat-icon {
        width: 60px;
        height: 60px;
        background-color: #00A1E4;
        box-shadow: 0;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        transition: transform 0.3s ease, bottom 0.3s ease;
        position: absolute;
        bottom: 1rem;
        right: .5rem;
        animation: floatAnimation 1.5s ease-out infinite alternate;
    }

    @keyframes floatAnimation {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-10px);
        }
    }

    .chat-icon.open {
        bottom: 420px;
    }

    .chat-icon:hover {
        animation: none;
        box-shadow: 0 0 10px rgba(110, 245, 255, 0.5);
    }

    .chat-box {
        display: none;
        width: 300px;
        height: 400px;
        background-color: rgb(171, 210, 255);
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        animation: slideIn 0.3s ease;
        position: absolute;
        bottom: 0;
        right: 0;
        overflow-y: auto;
    }

    @keyframes slideIn {
        from {
            transform: translateY(100%);
        }

        to {
            transform: translateY(0);
        }
    }

    .chat-content {
        padding: 10px;
        height: 285px;
        max-height: 285px;
        overflow-y: auto;
        flex-grow: 1;
    }

    .chat-input {
        padding: 10px;
        display: flex;
        align-items: center;
        margin-top: 10px;
        flex-direction: column;
        box-shadow: 0 0 10px rgba(0, 0, 0, .2);
    }

    .chat-input input {
        flex: 1;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-right: 5px;
    }

    .chat-input button {
        padding: 8px 15px;
        background-color: #00A1E4;
        color: #fff;
        font-weight: bolder;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .chat-box.closing {
        animation: slideOut2 0.3s ease forwards;
    }

    @keyframes slideOut2 {
        from {
            transform: translateY(0);
        }

        to {
            transform: translateY(100%);
        }
    }

    .chat-box.opening {
        animation: slideDown2 0.3s ease forwards;
    }

    @keyframes slideDown2 {
        from {
            transform: translateY(-100%);
        }

        to {
            transform: translateY(0);
        }
    }

    .message-container {
        display: flex;
        flex-direction: column;
        overflow-x: hidden;
    }

    .chat-message {
        max-width: 70%;
        margin: 5px;
        padding: 10px;
        clear: both;
        word-wrap: break-word;
    }

    @keyframes slideInFromLeft {
        from {
            opacity: 0;
            transform: translateX(-100%);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInFromRight {
        from {
            opacity: 0;
            transform: translateX(100%);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .user-message {
        border-radius: 10px 10px 0 10px;
        align-self: flex-end;
        background-color: rgb(191, 235, 238);
        color: rgb(0, 27, 39);
        font-weight: bold;
        font-size: 15px;
        animation: slideInFromRight 0.5s ease forwards;
    }

    .bot-message {
        border-radius: 10px 10px 10px 0;
        align-self: flex-start;
        background-color: #00A1E4;
        color: white;
        font-size: 15px;
        animation: slideInFromLeft 0.5s ease forwards;
    }

    .faq-container::-webkit-scrollbar {
        height: 3px;
    }

    .faq-container::-webkit-scrollbar-track {
        background: rgb(171, 210, 255);
    }

    .faq-container::-webkit-scrollbar-thumb {
        background: #888;
    }

    .faq-container::-webkit-scrollbar-thumb:hover {
        background: #555;
        cursor: pointer;
    }

    .faqbut {
        max-height: 40px;
        width: auto;
        white-space: nowrap;
        margin: 0 5px 0 5px;
        opacity: 1;
        transition: background-color 0.3s ease, color 0.3s ease, opacity 0.5s ease;
    }

    .faqbut:hover {
        background-color: z;
        color: #183251;
    }
</style>
</head>

<body>

    <?php
    include("data.php");

    $sql = "SELECT * FROM faq";
    $result = $conn->query($sql);

    ?>

    <div class="chat-bot">
        <div class="chat-icon" id="chat-icon">
            <img id="chatbotpic" src="LandingPage/chatbotfolder/images/chatbot.png"
                onmouseenter="this.src='LandingPage/chatbotfolder/images/chatbot2.png'"
                onmouseleave="this.src='LandingPage/chatbotfolder/images/chatbot.png'"
                style="height: 50px; width: 50px; filter: invert();" alt="Chat Icon">
        </div>
        <div class="chat-box" id="chat-box">
            <!-- Chat conversation content goes here -->
            <div class="chat-content" id="chat-content">
                <div id="msgcon" class="message-container">

                </div>
            </div>

            <div class="chat-input">
                <p style="margin: 0 0 5px 0; padding: 0; font-weight: bold; font-size: 15px; color: #183251;">Ask me
                    these questions!</p>
                <div id="faqcon" class="faq-container"
                    style="display: flex; width: 100%; padding: 0 2px 5px 5px; align-items: center; overflow-x: auto; overflow-y: hidden;">

                </div>
            </div>
        </div>
    </div>
    <script>

        function handleFAQClick(id, butts) {

            fetch('LandingPage/chatbotfolder/index.php')
                .then(response => response.json())
                .then(data => console.log("Chatbot Data Loaded: ", data))
                .catch(err => console.error('Chatbot fetch error:', err))
                .then(data => {

                    const usermsg = document.createElement('div');
                    usermsg.classList.add('chat-message', 'user-message');
                    usermsg.textContent = `${data.question[id]}`;

                    const botmsg = document.createElement('div');
                    botmsg.classList.add('chat-message', 'bot-message');
                    botmsg.textContent = `${data.answer[id]}`;

                    document.getElementById('msgcon').appendChild(usermsg);

                    smoothScrollToBottom(document.getElementById('chat-content'));

                    setTimeout(() => {
                        document.getElementById('msgcon').appendChild(botmsg);
                        smoothScrollToBottom(document.getElementById('chat-content'));
                    }, 1000);
                    butts.style.opacity = '0';

                    setTimeout(() => {
                        butts.remove();
                        console.log('Remaining buttons: ', document.querySelectorAll('.faqbut').length);

                        if (document.querySelectorAll('.faqbut').length === 0) {
                            const faqConElement = document.getElementById('faqcon');

                            if (faqConElement) {
                                console.log('Updating faqcon with the message');
                                faqConElement.innerHTML = `
                <p style="text-align: center; color: #183251; margin: 0; font-size: 13px">
                    Please contact our customer support if you have any concerns!
                </p>
            `;
                            } else {
                                console.log('faqcon element not found');
                            }
                        }
                    }, 500);
                })
                .catch(err => console.error('Something is wong', err));

        }

        document.addEventListener("DOMContentLoaded", function () {
            const chatIcon = document.getElementById("chat-icon");
            const chatBox = document.getElementById("chat-box");
            const chatbot = document.getElementById("chatbotpic");

            chatIcon.addEventListener("click", function () {
                if (chatBox.style.display === "block") {
                    chatBox.style.bottom = '-20px';
                    chatBox.classList.add("closing");
                    chatbot.onmouseenter = function oo() { chatbot.src = 'LandingPage/chatbotfolder/images/chatbot2.png' };
                    chatbot.onmouseleave = function pp() { chatbot.src = 'LandingPage/chatbotfolder/images/chatbot.png' };
                    setTimeout(() => {
                        chatIcon.classList.remove("open");
                        chatbot.src = 'LandingPage/chatbotfolder/images/chatbot.png';
                    }, 200);
                    setTimeout(function () {
                        chatBox.style.display = "none";
                    }, 300);
                } else {
                    chatBox.style.bottom = '0';
                    chatBox.style.display = "block";
                    chatbot.onmouseenter = function oo() { chatbot.src = 'LandingPage/chatbotfolder/images/chatbot.png' };
                    chatbot.onmouseleave = function pp() { chatbot.src = 'LandingPage/chatbotfolder/images/chatbot2.png' };
                    chatBox.classList.remove("closing");
                    setTimeout(() => {
                        chatIcon.classList.add("open");
                        chatbot.src = 'LandingPage/chatbotfolder/images/chatbot2.png';
                    }, 200);
                }
            });

            chatBox.addEventListener("animationend", function () {
                if (!chatBox.style.display || chatBox.style.display === "block") {
                    chatBox.classList.remove("closing");
                    chatBox.style.bottom = '0';
                }
            });
        });

        fetch('LandingPage/chatbotfolder/index.php')
            .then(response => response.json())
            .then(data => {

                for (let e in data.question) document.getElementById('faqcon').insertAdjacentHTML('beforeend', `
            <button onclick="handleFAQClick('${e}', this)" class="faqbut" id="faqbut">${data.question[e]}</button>
        `);

            })
            .catch(err => console.error('Something is wrong', err));

        function smoothScrollToBottom(element) {
            // Get the current scroll position
            const startScroll = element.scrollTop;
            // Get the target scroll position (bottom of the element)
            const targetScroll = element.scrollHeight - element.clientHeight;
            // Calculate the distance to scroll
            const distance = targetScroll - startScroll;
            // Set the duration of the animation
            const duration = 500; // in milliseconds
            // Set the start time of the animation
            const startTime = performance.now();

            // Define the animation function
            function scrollAnimation(currentTime) {
                // Calculate the elapsed time since the start of the animation
                const elapsedTime = currentTime - startTime;
                // Calculate the progress of the animation (0 to 1)
                const progress = Math.min(elapsedTime / duration, 1);
                // Calculate the new scroll position based on the progress
                const newScroll = startScroll + distance * progress;
                // Scroll the element to the new position
                element.scrollTop = newScroll;

                // Continue the animation if not finished
                if (progress < 1) {
                    requestAnimationFrame(scrollAnimation);
                }
            }

            // Start the animation
            requestAnimationFrame(scrollAnimation);
        }

    </script>
</body>

</html>