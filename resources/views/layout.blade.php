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

            .enlaceboton {
                font-family: verdana, arial, sans-serif;
                font-size: 10pt;
                font-weight: bold;
                padding: 4px;
                background-color: #ffffcc;
                color: #666666;
                text-decoration: none;
            }

            .enlaceboton:link,
            .enlaceboton:visited {
                border-top: 1px solid #cccccc;
                border-bottom: 2px solid #666666;
                border-left: 1px solid #cccccc;
                border-right: 2px solid #666666;
            }

            .enlaceboton:hover {
                border-bottom: 1px solid #cccccc;
                border-top: 2px solid #666666;
                border-right: 1px solid #cccccc;
                border-left: 2px solid #666666;
            }

            .boton {
                color: #fff !important;
                font-size: 20px;
                font-weight: 500;
                padding: 0.5em 1.2em;
                background: #318aac;
                border: 2px solid;
                border-color: #318aac;
                position: relative;
            }
            .boton:before {
                content:"";
                position: absolute;
                top: 0px;
                left: 0px;
                width: 0px;
                height: 100%;
                background: rgba(255, 255, 255, 0.1);
                transition: all 1s ease;
            }
            .boton:hover:before {
                width: 100%;
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
        {{--<h1>{{ request()->is('/') ? 'Estas en el Home' : 'No estas en el Home' }}</h1>--}}
        <nav>
            <a class="{{ activeMenu('/') }}" href="{{ route('home') }}">Inicio</a>
            <a class="{{ activeMenu('saludos/*') }}" href="{{ route('saludos', 'Emiliano') }}">Saludo</a>
            <a class="{{ activeMenu('mensajes/create') }}" href="{{ route('messages.create') }}">Contactos</a>
            <a class="{{ activeMenu('mensajes') }}" href="{{ route('messages.index') }}">Mensajes</a>
        </nav>
    </header>
    @yield('contenido')
    <hr>
    <footer>Copyright &#169; {{ date('Y') }}</footer>
    </body>
</html>
