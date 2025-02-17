<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Agente</title>
</head>

<body>
    <h1>Detalles del Agente</h1>

    <div>
        <strong>ID:</strong> {{ $agente->id }}<br>
        <strong>Nombre:</strong> {{ $agente->nombre }}<br>
        <strong>Email:</strong> {{ $agente->email }}<br>
        <strong>Fecha de Creación:</strong> {{ $agente->created_at }}<br>
        <strong>Última Actualización:</strong> {{ $agente->updated_at }}<br>
    </div>

    <br>
    <a href="{{ route('agentes.index') }}">Volver al listado de agentes</a>
    <a href="{{ route('agentes.edit', $agente) }}">Editar Agente</a>
</body>

</html>
