<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Mvc-project</title>
    </head>
    <body>
        @include("layouts.nav")
        <main class="main">
            <div class="content">  
                @yield("content")
            </div>
        </main>
    </body>
    <footer class="footer">
        <p>Github Repository</p>
        <a href="https://github.com/Dundgren/mvc-proj"><i class="material-icons">folder</i></a>
    </footer>
</html>
