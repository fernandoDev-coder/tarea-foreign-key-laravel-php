<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Listado de Propiedades</h1>
    <a href="{{ route('propiedades.create') }}">Crear Nueva Propiedad</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Dirección</th>
                <th>Precio</th>
                <th>Agente</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($propiedades as $propiedad)
                <tr>
                    <td>{{ $propiedad->id }}</td>
                    <td>{{ $propiedad->direccion }}</td>
                    <td>{{ $propiedad->precio }} €</td>
                    <td>{{ $propiedad->agente->nombre ?? 'Sin agente' }}</td>
                    <td>{{ $propiedad->categoria->nombre ?? 'Sin categoría' }}</td>
                    <td>
                        <a href="{{ route('propiedades.edit', $propiedad) }}">Editar</a>
                        <form action="{{ route('propiedades.destroy', $propiedad) }}" method="POST"
                            style="display:inline">
                            @csrf @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('¿Seguro que deseas eliminar esta propiedad?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
