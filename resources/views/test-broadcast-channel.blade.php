<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Test Broadcasting</title>
    </head>
    <body>
        <h1>Laravel Test Broadcasting</h1>
        <button id="btnStartPublicEvent">Start Public Event</button>
        <button id="btnStartPrivateEvent">Start Private Event</button>

        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            const btnStartPublicEvent = document.querySelector('#btnStartPublicEvent');
            btnStartPublicEvent.addEventListener('click', event => {
                axios.get('/execute-public-event')
            });

            const btnStartPrivateEvent = document.querySelector('#btnStartPrivateEvent');
            btnStartPrivateEvent.addEventListener('click', event => {
                axios.get('/execute-private-event')
            });
        </script>
    </body>
</html>
