<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>prueba</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

<style>
    .cabecera{
        background-color:red;
        color: yellow;
    }

    .cuerpo{
        background-color:blue;
        color: red;
    }

    .pie{
        background-color:yellow;
        color: green;
    }
</style>
</head>
<body>
    <div class="cabecera">
    @yield("cabecera")
    Contenido
    </div>
    <div class="cuerpo">
    @yield("cuerpo")
    Contenido
    </div>
    <div class="pie">
    @yield("pie")
    Contenido
    </div>
    </body>
</html>
