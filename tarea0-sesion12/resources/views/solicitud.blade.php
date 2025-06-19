<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Solicitud</title>
</head>
<body>
    <h2>Solicitud de Información</h2>
    <form action="/enviar-solicitud" method="POST">
        @csrf
        Nombre: <input type="text" name="nombre"><br><br>
        Carrera: <input type="text" name="carrera"><br><br>
        Mensaje:<br>
        <textarea name="mensaje" rows="4" cols="40"></textarea><br><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
