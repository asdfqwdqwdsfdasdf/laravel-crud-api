<!DOCTYPE html>
<html>
<head><title>Tabla del {{ $numero }}</title></head>
<body>
    <h1>Tabla de multiplicar del {{ $numero }}</h1>
    <ul>
        @foreach ($tabla as $i => $resultado)
            <li>{{ $numero }} x {{ $i }} = {{ $resultado }}</li>
        @endforeach
    </ul>
</body>
</html>
