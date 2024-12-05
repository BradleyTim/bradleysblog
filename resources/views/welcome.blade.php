<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bradley's World</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                *, *::before, *::after {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }

                body {
                    background: white; 
                    color: #000;

                    display: flex;
                    flex-direction: column;
                    flex: auto 1 auto;
                    min-height: 100vh;

                    font-family: 'figtree', sans; 
                }

                nav ul {
                    display: flex;
                    gap: 1rem;
                }

                a {
                    color: #000;
                    text-decoration: none;
                }

                nav li {
                    list-style: none;
                }

                nav {
                    display: flex;
                    justify-content: space-between;
                    max-width: 80%;
                    margin-inline: auto;
                    padding-block: 1.5rem;
                }
            </style>
        @endif
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <header>
            <nav>
                <div>
                    Bradley
                </div>
                <ul>
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <a href="/about">About</a>
                    </li>
                    <li>
                        <a href="/Contact">Contact</a>
                    </li>
                    <li>
                        <a href="/work">Work</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>Bradley's World</main>
        <footer>Copyright &copy; 2024</footer>
    </body>
</html>
