<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    <style>
        .cabecera {
        background-color : red;
        text-align : center;
        } 
        
        .cuerpo {
        background-color :blue;
        color: white;
        margin: 100px 0;

        }

        .pie {
        background-color : yellow;
        
        }
        
    </style>
    <body>
        <div class="cabecera">@yield("cabecera")</div>
        <div class="cuerpo">@yield("cuerpo")</div>
        <div class="pie">@yield("pie")</div>
    </body>
</html>