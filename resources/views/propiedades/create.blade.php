<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Crear Nueva Propiedad</h1>

    <form action="{{ route('propiedades.store') }}" method="POST">
        @csrf
        <label>Dirección:</label>
        <input type="text" name="direccion" required>

        <label>Precio:</label>
        <input type="number" name="precio" step="0.01" required>

        <label>Agente:</label>
        <select name="agente_id" required>
            @foreach ($agentes as $agente)
                <option value="{{ $agente->id }}">{{ $agente->nombre }}</option>
            @endforeach
        </select>

        <label>Categoría:</label>
        <select name="categoria_id" required>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>

        <button type="submit">Guardar</button>
    </form>

</body>

</html>
