<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Propiedad</title>
</head>

<body>
    <h1>Detalles de la Propiedad</h1>

    <div>
        <strong>ID:</strong> {{ $propiedad->id }}<br>
        <strong>Nombre:</strong> {{ $propiedad->nombre }}<br>
        <strong>Descripción:</strong> {{ $propiedad->descripcion }}<br>
        <strong>Precio:</strong> ${{ number_format($propiedad->precio, 2) }}<br>
        <strong>Agente:</strong> {{ $propiedad->agente->nombre }}<br>
        <strong>Categoría:</strong> {{ $propiedad->categoria->nombre }}<br>
        <strong>Fecha de Creación:</strong> {{ $propiedad->created_at }}<br>
        <strong>Última Actualización:</strong> {{ $propiedad->updated_at }}<br>
    </div>

    <br>
    <a href="{{ route('propiedades.index') }}">Volver al listado de propiedades</a>
    <a href="{{ route('propiedades.edit', $propiedad) }}">Editar Propiedad</a>
</body>

</html>
