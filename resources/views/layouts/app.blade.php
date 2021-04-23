<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <title>Mvc-app</title>
    </head>
    <body>
        @include("layouts.nav")
        @yield("content")
    </body>
    <footer>
        <p>This is a footer!</p>
    </footer>
</html>
