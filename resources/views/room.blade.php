<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Room</title>
</head>
<body>
    <h1>Welcome to Room, {{ $user->name }}</h1>

    <button id="joinToChat">Join to chat</button>
    <button id="leaveTheChat" hidden>Leave the chat</button>

    <div class="wrapper-message" style="margin-top: 10px;" hidden>
        <textarea id="message" cols="30" rows="10"></textarea>
        <button id="send-message">Send</button>
    </div>

    <div class="list-of-messages" style="margin-top: 10px;" hidden>
        <ul>

        </ul>
    </div>

    <script src="{{ asset('js/room.js') }}"></script>
    <script>
        let joinToChat = document.querySelector('#joinToChat');
        let leaveTheChat = document.querySelector('#leaveTheChat');
        let message = document.querySelector('#message');
        let sendMessage = document.querySelector('#send-message');
        let wrapperMessage = document.querySelector('.wrapper-message');
        let listOfMessages = document.querySelector('.list-of-messages');

        leaveTheChat.addEventListener('click', (event) => {
            window.Echo.leave("room");

            joinToChat.hidden = false;
            leaveTheChat.hidden = true;
            wrapperMessage.hidden = true;
            message.value = '';
            listOfMessages.hidden = true;
        });

        joinToChat.addEventListener('click', (event) => {
            window.Echo
                .join("room")
                .here((users) => {
                    message.value = '';
                    joinToChat.hidden = true;
                    leaveTheChat.hidden = false;
                    wrapperMessage.hidden = false;
                    listOfMessages.hidden = false;

                    console.log(users);
                })
                .joining((user) => {
                    console.log('Join: ' + user.name);
                })
                .leaving((user) => {
                    console.log('Leave: ' + user.name);
                })
                .listen('.new-message-event', (e) => {
                    listOfMessages.innerHTML += `<li>${e.message}</li>`;
                    message.value = '';
                });
        });

        sendMessage.addEventListener('click', (event) => {
            axios.post('/room/send-message', {
                message: message.value,
            });
        });
    </script>
</body>
</html>
