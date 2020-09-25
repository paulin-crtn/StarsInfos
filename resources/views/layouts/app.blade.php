<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- Meta -->
        <!-- No meta description because the app does not require SEO -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Page Title -->
        <title>@yield('title') | StarsInfos</title>
        <!-- Favicons -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon.png') }}">
		<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
		<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
		<link rel="manifest" href="{{ asset('favicons/site.webmanifest') }}">
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}" >
        <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" >
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
        <!-- FontAwesome -->
        <script src="https://kit.fontawesome.com/692ebf6485.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <a href="/">
            <header>
                <img src="{{ asset('img/celebrity.svg') }}" alt="logo StarsInfos">
                <div class="app-title">
                    <h1>StarsInfos</h1>
                    <p>La base de données des superstars</p>
                </div>
            </header>
        </a>

        <main>
            @yield('content')
        </main>

        <footer>
            <p>Paulin Caratini pour HelloCSE</p>
        </footer>
    </body>
</html>
