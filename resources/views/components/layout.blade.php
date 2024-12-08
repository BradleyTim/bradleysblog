<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bradley Tim</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> 

        {{-- styles.css  --}}
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
            </style>
        @endif
    </head>
    <body class="stack">
        <header>
            <nav class="container">
                <div>
                    <a  href="/" class="{{ request()->is('/') ? 'active' : ''}} logo">Bradley</a>
                </div>
                <ul>
                    <li>
                        <a href="/" class="{{ request()->is('/') ? 'active' : ''}} logo">Home</a>
                    </li>
                    <li>
                        <a href="/about" class="{{ request()->is('about') ? 'active' : ''}} logo">About</a>
                    </li>
                    <li>
                        <a href="/contact" class="{{ request()->is('contact') ? 'active' : ''}} logo">Contact</a>
                    </li>
                    <li>
                        <a href="/blog" class="{{ request()->is('blog') ? 'active' : ''}} logo">Blog</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            {{ $slot }}
        </main>
        <footer>
            <section class="container">
                <p>Copyright &copy; 2024</p>
            </section>
        </footer>
    </body>
</html>
