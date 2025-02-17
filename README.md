# Guía Detallada para el Proyecto en Laravel

Este proyecto se enfoca en crear una aplicación web utilizando **Laravel** que interactúa con una base de datos **MySQL**, donde se manejan tres tablas principales: **Agentes**, **Categorías** y **Propiedades**. A continuación se describen los pasos para completar el ejercicio.

---

Antes de comenzar te dejo algunos atajos para escribir realizar más acciones en menos líneas:
## 🗂️ Crear Carpetas Rápidamente
Para crear las carpetas necesarias dentro de resources/views para agentes, categorias y propiedades:
```bash
mkdir resources/views/agentes resources/views/categorias resources/views/propiedades
```
## 📝 Crear Múltiples Archivos a la Vez
Para crear los archivos index.blade.php, edit.blade.php, show.blade.php y create.blade.php en cada carpeta:
```bash
touch resources/views/{agentes,categorias,propiedades}/{index,edit,show,create}.blade.php
```
---

## 1. Crear las Tablas con una Migración

Primero, se debe crear la migración para las tres tablas necesarias: **agentes**, **categorías** y **propiedades**.

### Pasos:

#### 1.1 Crea la migración para los agentes:
En tu terminal, ejecuta el siguiente comando para crear una migración para la tabla `agentes`:

```bash
php artisan make:migration crear_tabla_agentes
```
Edita el archivo de migración generado en database/migrations/ y agrega los campos correspondientes a la tabla de agentes:
```bash
Schema::create('agentes', function (Blueprint $table) {
    $table->id();
    $table->string('nombre');
    $table->string('email')->unique();
    $table->timestamps();
});
```
## 1.2 Crea la migración para las categorías:
Ejecuta el siguiente comando para crear una migración para la tabla categorías:
```bash
php artisan make:migration crear_tabla_categorias
```
En la migración correspondiente, agrega los campos:
```bash
Schema::create('categorias', function (Blueprint $table) {
    $table->id();
    $table->string('nombre');
    $table->timestamps();
});
```
## 1.3 Crea la migración para las propiedades:
Ejecuta este comando para crear la migración de la tabla propiedades:
```bash
php artisan make:migration crear_tabla_propiedades
```
En esta migración, agregarás los campos correspondientes:
```bash
Schema::create('propiedades', function (Blueprint $table) {
    $table->id();
    $table->string('nombre');
    $table->text('descripcion');
    $table->foreignId('agente_id')->constrained()->onDelete('cascade');
    $table->foreignId('categoria_id')->constrained()->onDelete('restrict');
    $table->timestamps();
});
```
## 1.4 Ejecuta las migraciones:
Después de crear las migraciones, ejecútalas con el siguiente comando:
```bash
php artisan migrate
```
## 2. Crear los Foreign Key Constraints con una Migración
Ya hemos establecido las relaciones entre las tablas en las migraciones de las tablas propiedades.

**La tabla propiedades tiene dos claves foráneas:** agente_id que hace referencia a la tabla agentes, y categoria_id que hace referencia a la tabla categorías.
**Restricciones:** Cuando un agente es eliminado, todas las propiedades asociadas a ese agente también se eliminan (onDelete('cascade')), mientras que cuando una categoría es eliminada, las propiedades asociadas no se eliminan debido a la restricción (onDelete('restrict')).
Si ya has creado las migraciones con estas relaciones, no es necesario hacer más cambios en esta fase.

---

## 3. Crear los CRUDs para Cada Una de las Tablas
Ahora que las tablas y sus relaciones están creadas, el siguiente paso es crear los CRUDs (Crear, Leer, Actualizar, Eliminar) para cada una de las tablas. Esto lo lograremos usando el comando php artisan make:controller.

### Pasos:
### 3.1 Crear el controlador para los agentes:
Ejecuta el siguiente comando para crear un controlador con todos los métodos necesarios para los agentes:
```bash
php artisan make:controller AgenteController --resource
```
Esto generará un controlador con los métodos index, create, store, edit, update, y destroy.
Rellena los métodos según sea necesario para el CRUD de agentes.
### 3.2 Crear el controlador para las categorías:
Repite el proceso para crear el controlador de categorías:
```bash
php artisan make:controller CategoriaController --resource
```
### 3.3 Crear el controlador para las propiedades:
Haz lo mismo para las propiedades:
```bash
php artisan make:controller PropiedadController --resource
```
### 3.4 Configurar las rutas en web.php:
Asegúrate de que las rutas estén correctamente definidas para los controladores creados. En routes/web.php agrega las siguientes rutas:
```bash
Route::resource('agentes', AgenteController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('propiedades', PropiedadController::class);
```
---

## 4. En el CRUD de Propiedades, Incluir Dos Selects para Agente y Categoría
En la vista resources/views/propiedades/create.blade.php (y también en edit.blade.php), agrega los campos select para elegir el agente y la categoría:
```bash
<form method="POST" action="{{ route('propiedades.store') }}">
    @csrf
    <label for="agente_id">Agente:</label>
    <select name="agente_id" id="agente_id">
        @foreach($agentes as $agente)
            <option value="{{ $agente->id }}">{{ $agente->nombre }}</option>
        @endforeach
    </select>

    <label for="categoria_id">Categoría:</label>
    <select name="categoria_id" id="categoria_id">
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
        @endforeach
    </select>

    <button type="submit">Crear Propiedad</button>
</form>
```
Asegúrate de pasar las variables $agentes y $categorias desde el controlador al mostrar la vista.

## 4.2 Controlador de Propiedades:
En el método create y edit del controlador de Propiedades, debes pasar las listas de agentes y categorías:
```bash
public function create()
{
    $agentes = Agente::all();
    $categorias = Categoria::all();
    return view('propiedades.create', compact('agentes', 'categorias'));
}
```
---

## 5. Crear una Migración para Añadir Uno o Dos Campos en Cada Tabla

Si necesitas agregar campos adicionales a las tablas, puedes crear nuevas migraciones. Aquí se muestra cómo hacerlo.

## Pasos:
## 5.1 Añadir campo a la tabla de agentes:
Ejecuta la siguiente migración para añadir un nuevo campo, por ejemplo, telefono en la tabla
```bash
php artisan make:migration agregar_telefono_a_agentes --table=agentes
```
En la migración, agrega el nuevo campo:

```bash
Schema::table('agentes', function (Blueprint $table) {
    $table->string('telefono')->nullable();
});
```
## 5.2 Ejecuta la migración:
Después de crear la migración, ejecuta el siguiente comando para aplicar los cambios a la base de datos:
```bash
php artisan migrate
```
