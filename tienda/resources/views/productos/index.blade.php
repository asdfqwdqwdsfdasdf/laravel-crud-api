<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <!-- Incluir el CDN de Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold text-center mb-6">Lista de Productos</h1>

        <div class="flex justify-end mb-4">
            <a href="{{ route('productos.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Agregar Producto</a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 border-l-4 border-green-500 rounded">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <table class="min-w-full table-auto border-collapse bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Nombre</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Precio</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Stock</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $producto->nombre }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $producto->precio }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $producto->stock }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800 flex space-x-4">
                            <a href="{{ route('productos.edit', $producto->idproducto) }}" class="text-blue-500 hover:text-blue-600">Editar</a>
                            <form action="{{ route('productos.destroy', $producto->idproducto) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
