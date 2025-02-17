<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Categoría</title>
</head>

<body>
    <h1>Detalles de la Categoría</h1>

    <div>
        <strong>ID:</strong> {{ $categoria->id }}<br>
        <strong>Nombre:</strong> {{ $categoria->nombre }}<br>
        <strong>Fecha de Creación:</strong> {{ $categoria->created_at }}<br>
        <strong>Última Actualización:</strong> {{ $categoria->updated_at }}<br>
    </div>

    <br>
    <a href="{{ route('categorias.index') }}">Volver al listado de categorías</a>
    <a href="{{ route('categorias.edit', $categoria) }}">Editar Categoría</a>
</body>

</html>
