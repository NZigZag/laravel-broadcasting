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

    <script src="{{ asset('js/room.js') }}"></script>
    <script>
        let joinToChat = document.querySelector('#joinToChat');
        let leaveTheChat = document.querySelector('#leaveTheChat');

        joinToChat.addEventListener('click', event => {
            window.Echo
                .join("room")
                .here((users) => {
                    joinToChat.hidden = true;
                    leaveTheChat.hidden = false;

                    console.log(users);
                })
                .joining((user) => {
                    console.log(user.name);
                });
        });
    </script>
</body>
</html>
