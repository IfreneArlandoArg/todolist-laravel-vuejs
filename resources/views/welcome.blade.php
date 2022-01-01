<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body>
        <div id="app">
            <app></app>
        </div>

        </!-- mix is for recompiling the code every time a change happens in resource/js/app.js and put it in public/js -->
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
