<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Formulario de Contacto</h2>
<form method="POST" action="/contacto">
    @csrf
    Asunto: <input type="text" name="asunto"><br>
    Mensaje: <textarea name="mensaje"></textarea><br>
    <button type="submit">Enviar</button>
</form>

</body>
</html>