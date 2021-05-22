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
        <div class="header">
        <p class="logo">&#x2685</p>
        <p class="title">
            <a href="{{ URL::to('/') }}">Mvc-project</a>
        </p>
        <p class="logo">&#x2680</p>
        </div>
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
