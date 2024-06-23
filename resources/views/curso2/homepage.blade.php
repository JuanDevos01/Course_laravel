<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Lavarel 11</title>
</head>
<body>
    <div class="max-w-4x1 mx-auto px-4">
    <h1>
        Bienvenidos a la pagina principal
    </h1>
    <x-alert2 type='danger' class="mb-6">
        <x-slot name="title">
            Titulo alert!
        </x-slot>
        Contenido de la alerta
    </x-alert2>
    <h1>Hola mundo</h1>
</div>
</body>
</html>