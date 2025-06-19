<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Califica tu nota</h2>
<form method="POST" action="/calificar">
    @csrf
    Nota (0 a 20): <input type="number" name="nota" min="0" max="20"><br>
    <button type="submit">Enviar</button>
</form>

</body>
</html>