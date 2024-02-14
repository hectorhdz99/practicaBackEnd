<div class="modal fade" id="actualizarUsuarioModal" tabindex="-1" aria-labelledby="actualizarUsuarioModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="actualizarUsuarioModalLabel">Modificar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formularioActualizarUsuario" method="POST" action="{{ route('usuarios.update', ':id') }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="correo" name="correo">
                    </div>
                    <div class="mb-3">
                        <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento">
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function abrirModalActualizar(id, nombre, correo, fechaNacimiento) {
        var modal = new bootstrap.Modal(document.getElementById('actualizarUsuarioModal'));

        document.getElementById('nombre').value = nombre;
        document.getElementById('correo').value = correo;
        document.getElementById('fechaNacimiento').value = fechaNacimiento;

        var form = document.getElementById('formularioActualizarUsuario');
        form.action = form.action.replace(':id', id);

        modal.show();
    }
</script>

