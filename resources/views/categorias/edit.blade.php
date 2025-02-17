<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Editar Categoría</h1>

    <form action="{{ route('categorias.update', $categoria) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre', $categoria->nombre) }}" required>

        <label>Descripción:</label>
        <textarea name="descripcion">{{ old('descripcion', $categoria->descripcion) }}</textarea>

        <button type="submit">Actualizar</button>
    </form>

</body>

</html>
