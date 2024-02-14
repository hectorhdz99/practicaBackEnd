<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Lista de Usuarios</h1>

        <form method="GET" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="nombre" class="form-control" placeholder="Buscar por nombre">
                </div>
                <div class="col-md-4">
                    <input type="date" name="fecha_nacimiento_desde" class="form-control"
                        placeholder="Desde fecha de nacimiento">
                </div>
                <div class="col-md-4">
                    <input type="date" name="fecha_nacimiento_hasta" class="form-control"
                        placeholder="Hasta fecha de nacimiento">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Buscar</button>
            <button type="button" class="btn btn-success mt-2" data-bs-toggle="modal"
                data-bs-target="#crearUsuarioModal">
                Agregar Nuevo Usuario
            </button>

        </form>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function () {
                location.reload();
            }, 2000); 
        </script>
        @endif
        @include('crear_usuario_modal')

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Fecha de Nacimiento</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->correo }}</td>
                    <td>{{ $usuario->fechaNacimiento }}</td>
                    <td>
                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary"
                            onclick="abrirModalActualizar('{{ $usuario->id }}', '{{ $usuario->nombre }}', '{{ $usuario->correo }}', '{{ $usuario->fechaNacimiento }}')">Modificar</button>
                    </td>
                </tr>
                @endforeach
                @include('actualizar_usuario_modal')

            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>