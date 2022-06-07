<div id="modal_usuario" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" id="usuario_form">
                <div class="modal-header">
                    <h4 class="modal-title" id="mdl_titulo_usuario"></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="usuario_id" name="usuario_id">

                    <div class="form-group">
                        <label class="form-label" for="usuario_nombre">Nombre:</label>
                        <input type="text" class="form-control" id="usuario_nombre" name="usuario_nombre" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="usuario_apellido">Apellido:</label>
                        <input type="text" class="form-control" id="usuario_apellido" name="usuario_apellido" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="usuario_email">Email:</label>
                        <input type="email" class="form-control" id="usuario_email" name="usuario_email" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="usuario_contrasena">Contraseña:</label>
                        <input type="password" class="form-control" id="usuario_contrasena" name="usuario_contrasena" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>&nbsp&nbsp
                    <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>