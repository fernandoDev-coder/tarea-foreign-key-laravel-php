<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Listado de Agentes</h1>
    <a href="{{ route('agentes.create') }}">Crear Nuevo Agente</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($agentes as $agente)
                <tr>
                    <td>{{ $agente->id }}</td>
                    <td>{{ $agente->nombre }}</td>
                    <td>{{ $agente->email }}</td>
                    <td>
                        <a href="{{ route('agentes.edit', $agente) }}">Editar</a>
                        <form action="{{ route('agentes.destroy', $agente) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
