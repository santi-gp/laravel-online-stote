<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>@yield('title', 'Tienda Online')</title>
</head>
<body>
<div class="wrapper">
        <header class="bgc-1 py-1-5 color-1">
            <div class="margin_wrapp flex-row jc-between ai-center">
                <h1>LOGO</h1>
                <nav class="f-grow3">
                    <ul class="flex-row jc-around">
                        <li><a class="color-white" href="{{ route('admin.home.index') }}">Admin - Inicio</a></li>
                        <li><a class="color-white" href="{{ route('admin.product.index') }}">Admin - Productos</a></li>
                        <li><a class="color-white" href="{{ route('home.index') }}">Volver a Inicio</a></li>
                    </ul>
                </nav>
                <img width="32" src="{{ asset('/img/undraw_profile.svg') }}" />
            </div>
        </header>
        <main>
            <div class="margin_wrapp">
                <h2 class="my-1">@yield('subtitle')</h2>
                @yield('content')
            </div>
        </main>
        <footer class="bgc-1 py-1 color-1">
            <div class="margin_wrapp">
                <p class="txt-center">
                    &copy; 2022 | Ricardo Guevara.
                </p>
            </div>
        </footer>
    </div>
    
</body>
</html>