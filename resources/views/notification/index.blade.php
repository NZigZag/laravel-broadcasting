<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notifications</title>
</head>
<body>
    <section>
        <h1>Welcome to Notifications, {{ $user->name }}</h1>

        <button id="btnNotifyUsers">Notify users</button>
    </section>

    <script src="{{ asset('js/notification.js') }}"></script>
    <script>
        let broadcastUserNotification = window.Echo.private(`users.{{ $user->id }}`);
        broadcastUserNotification.notification((notification) => {
            console.log(notification);
        });

        let btnNotifyUsers = document.querySelector('#btnNotifyUsers');

        btnNotifyUsers.addEventListener('click', (event) => {
            axios.get('/notifications/send-users-notifications');
        });
    </script>
</body>
</html>
