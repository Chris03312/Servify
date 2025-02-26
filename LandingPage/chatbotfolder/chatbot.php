<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <title>Document</title>
</head>
<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');
    .chat-bot {
        font-family: "Poppins", serif;
        position: fixed;
        bottom: 0px;
        right: 10px;
        z-index: 9999;
    }

    .chat-icon {
        width: 40px;
        height: 40px;
        background-color: #f1f1f1;
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
            transform: translateY(-3px); 
        }
    }
    .chat-box {
        width: 350px;
        height: 450px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        position: absolute;
        bottom: 70px;
        right: 0;
        display: none;
        flex-direction: column;
        margin-right: 10px;
    }
    .chat-header{
        background-color: #007DAC;
        display: flex;
        color: #f1f1f1;
    }
    .chat-header img{
        margin: 5px 0 0 5px;
        width: 50px;
        height: 50px;
    }
    .chat-header h4{
        margin-left: 10px;
        margin-top: 20px;
        font-size: 14px;
    }
    .chat-content {
        flex-grow: 1;
        padding: 10px;
        overflow-y: auto;
        max-height: 450px;
        margin-left: -10px;
    }

    .message-container {
        display: flex;
        flex-direction: column;
    }

    .user-message {
        background-color: #007DAC;
        color: white;
        padding: 8px 12px;
        border-radius: 10px;
        align-self: flex-end;
        margin: 5px;
        max-width: 80%;
    }

    .chat-input {
        display: flex;
        flex-direction: column;
        justify-content: center; 
        align-items: center; 
        text-align: center; 
        padding: 10px;
        border-top: 1px solid #ccc;
        min-height: 200px;
    }
    

    .chat-input input {
        flex-grow: 1;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .chat-input button {
        background-color: white; 
        border: 1px solid #ccc;  
        color: black; 
        padding: 12px 12px;
        font-size: 12px;
        width: 100%;
        text-align: center;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease, color 0.3s ease;
        min-width: 300px;
        max-width: 300px;
    }

    .message-wrapper {
        display: flex;
        max-width: 80%;
    }

    .bot-wrapper {
        flex-direction: row;
        align-items: flex-start;
    }

    .user-wrapper {
        flex-direction: row-reverse; 
        align-self: flex-end;
    }

    .avatar-container {
        display: flex;
        align-items: center;
        margin: 0 10px;
    }

    .avatar {
        width: 30px;
        height: 30px;
        border-radius: 50%;
    }

    .chat-message {
        padding: 10px 15px;
        border-radius: 10px;
        max-width: 70%;
        word-wrap: break-word;
        display: flex;
        align-items: center;
        text-align: left;
        font-size: 12px;
    }

    .user-message {
        background-color: #007DAC;
        color: white;
    }

    .bot-message {
        background-color:rgb(255, 255, 255);
        color: black;
        border: 1px solid #ccc;
    }

    .faq-container{
        gap: 5px;
    }

    .faqbut:hover {
        background-color:rgb(255, 255, 255);
    }

    .chat-input p{
        margin: 0 0 5px 0; 
        padding: 0; 
        font-weight: bold; 
        font-size: 14px; 
        color: #007DAC;
        text-align: center;
        margin-bottom: 10px;
    }


    @media screen and (max-width: 768px) {
    .chat-box{
        width: 300px;
        height: 400px;
    }

    .chat-icon {
        width: 50px;
        height: 50px;
        bottom: 10px;
        right: 10px;
    }

    .chat-header h4 {
        font-size: 10px;
    }

    .chat-content {
        padding: 8px;
    }

    .chat-input {
        padding: 8px;
        min-height: 150px;
    }

    .chat-input input {
        width: 50%;
        font-size: 8px;
        padding: 0px;
    }

    .chat-input button {
        min-width: 250px;
        max-width: 250px;
        padding: 8px;
        font-size: 10px;
    }

    .chat-input p{
        margin: 0 0 5px 0; 
        font-size: 11px; 
    }

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
        <img id="chatbotpic" src="/../LandingPage/chatbotfolder/images/chatimg.png" style="height: 30px; width: 30px;" alt="Chat Icon">
        </div>
        <div class="chat-box" id="chat-box">
            <div class="chat-header">
                <img src="/../LandingPage/chatbotfolder/images/chatbot.png" alt="">
                <h4>DDPAM Chatbot</h4>
            </div>
            <!-- Chat conversation content goes here -->
            <div class="chat-content" id="chat-content">
                <div id="msgcon" class="message-container">
                    <!-- Static Bot Message -->
                    <div class="message-wrapper bot-wrapper">
                        <div class="avatar-container">
                            <img src="/../LandingPage/chatbotfolder/images/chatbot.png" alt="Bot Avatar" class="avatar">
                        </div>
                        <div class="chat-message bot-message">
                            <span class="message-text">Hey there! How can I help you today?</span>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="chat-input">
                <p id="faq-text">
                    Ask me these questions!
                </p>
                <div id="faqcon" class="faq-container" style="display: flex; flex-direction: column; width: 100%; padding: 0 2px 5px 5px; align-items: center; overflow-x: auto; overflow-y: hidden;">
                </div>
            </div>

        </div>
    </div>
<script>

    

function updateVisibleButtons() {
    const buttons = document.querySelectorAll('#faqcon button');
    let visibleCount = 0;

    buttons.forEach(button => {
        if (visibleCount < 3) {
            button.style.display = 'inline-block';
            visibleCount++;
        } else {
            button.style.display = 'none';
        }
    });
}

function handleFAQClick(id, button) {
    fetch('/../LandingPage/chatbotfolder/index.php')
    .then(response => response.json())
    .then(data => {
        const msgCon = document.getElementById('msgcon');

        const userWrapper = document.createElement('div');
        userWrapper.classList.add('message-wrapper', 'user-wrapper');

        const userAvatarContainer = document.createElement('div');
        userAvatarContainer.classList.add('avatar-container');

        const userAvatar = document.createElement('img');
        userAvatar.src = '/../LandingPage/chatbotfolder/images/user (1).png'; 
        userAvatar.classList.add('avatar');

        const usermsg = document.createElement('div');
        usermsg.classList.add('chat-message', 'user-message');
        usermsg.textContent = data.question[id];

        userAvatarContainer.appendChild(userAvatar);
        userWrapper.appendChild(userAvatarContainer);
        userWrapper.appendChild(usermsg);
        msgCon.appendChild(userWrapper);

        smoothScrollToBottom(document.getElementById('chat-content'));

        setTimeout(() => {
            const botWrapper = document.createElement('div');
            botWrapper.classList.add('message-wrapper', 'bot-wrapper');

            const botAvatarContainer = document.createElement('div');
            botAvatarContainer.classList.add('avatar-container');
            const botAvatar = document.createElement('img');
            botAvatar.src = '/../LandingPage/chatbotfolder/images/chatbot.png'; // Replace with actual path
            botAvatar.classList.add('avatar');

            const botmsg = document.createElement('div');
            botmsg.classList.add('chat-message', 'bot-message');
            botmsg.innerHTML = data.answer[id];

            botAvatarContainer.appendChild(botAvatar);
            botWrapper.appendChild(botAvatarContainer);
            botWrapper.appendChild(botmsg);
            msgCon.appendChild(botWrapper);

            smoothScrollToBottom(document.getElementById('chat-content'));
        }, 1000);

        button.remove();

        updateVisibleButtons();

        setTimeout(() => {
            if (document.querySelectorAll('#faqcon button').length === 0) {
                const faqConElement = document.getElementById('faqcon');
                if (faqConElement) {
                    faqConElement.innerHTML = `
                        <p style="text-align: center; color: #007DAC; margin: 10px 0; font-size: 12px">
                            For more questions, please contact us at 09283947182 or email us at dppam@gmail.com. 
                            You can also visit the nearest parish based on your location for assistance.
                        </p>
                    `;
                }
            }
        }, 500);
    })
    .catch(err => console.error('Something is wrong', err));
}

document.addEventListener('DOMContentLoaded', updateVisibleButtons);


        document.addEventListener("DOMContentLoaded", function() {
        const chatIcon = document.getElementById("chat-icon");
        const chatBox = document.getElementById("chat-box");
        const chatbot = document.getElementById("chatbotpic"); 
        
        chatIcon.addEventListener("click", function () {
            if (chatBox.style.display === "none" || chatBox.style.display ===""){
                chatBox.style.display ="flex";
                chatbot.src ="/../LandingPage/chatbotfolder/images/chatimgclose.png";
            } else {
                chatBox.style.display= "none";
                chatbot.src ="/../LandingPage/chatbotfolder/images/chatimg.png";
            }
        })
        });

        fetch('/../LandingPage/chatbotfolder/index.php')
        .then(response => response.json())
        .then(data => {
        const faqContainer = document.getElementById('faqcon');
        const faqText = document.getElementById('faq-text');
        let allButtons = [];

        for (let e in data.question) {
            const button = document.createElement('button');
            button.textContent = data.question[e];
            button.classList.add('faqbut');
            button.onclick = function () {
                handleFAQClick(e, this);
                button.remove();
                updateVisibleButtons();
            };
            button.style.display = 'none';
            allButtons.push(button);
            faqContainer.appendChild(button);
        }
        updateVisibleButtons();

        function updateVisibleButtons() {
            let visibleCount = 0;
            allButtons.forEach(button => {
                if (visibleCount < 3 && button.style.display === 'none') {
                    button.style.display = 'inline-block';
                    visibleCount++;
                }
            });

            if (document.querySelectorAll('.faqbut').length === 0) {
                faqText.style.display = 'none';
            }
        }
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