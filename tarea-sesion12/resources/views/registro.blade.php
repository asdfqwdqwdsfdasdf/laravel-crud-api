<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Formulario de Registro</h2>
    <form action="/registro" method="POST">
        @csrf
        Nombre: <input type="text" name="nombre"><br>
        Correo: <input type="email" name="correo"><br>
        Edad: <input type="number" name="edad"><br>
        <button type="submit">Registrar</button>
    </form>

</body>
</html>