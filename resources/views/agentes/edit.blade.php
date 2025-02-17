<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Editar Agente</h1>

    <form action="{{ route('agentes.update', $agente) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre', $agente->nombre) }}" required>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $agente->email) }}" required>

        <button type="submit">Actualizar</button>
    </form>

</body>

</html>
