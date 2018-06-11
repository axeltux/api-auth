<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <style>
            .active{
                text-decoration: none;
                color: green;
            }

            .error{
                color: red;
                font-size: 12px;
            }
        </style>
        <title>Mi Sitio</title>
    </head>
    <body>
    <header>
        <?php
            function activeMenu($url){
                return request()->is($url) ? 'active' : '';
            }
        ?>
        <h1>{{ request()->is('/') ? 'Estas en el Home' : 'No estas en el Home' }}</h1>
        <nav>
            <a class="{{ activeMenu('/') }}" href="{{ route('home') }}">Inicio</a>
            <a class="{{ activeMenu('mensajes/create') }}" href="{{ route('messages.create') }}">Contactos</a>
            <a class="{{ activeMenu('saludos/*') }}" href="{{ route('saludos', 'Emiliano') }}">Saludo</a>
        </nav>
    </header>
    @yield('contenido')
    <hr>
    <footer>Copyright &#169; {{ date('Y') }}</footer>
    </body>
</html>
