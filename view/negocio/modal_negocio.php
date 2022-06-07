<div id="modal_negocio" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" id="negocio_form">
                <div class="modal-header">
                    <h4 class="modal-title" id="mdl_titulo_negocio"></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="negocio_id" name="negocio_id">

                    <div class="form-group">
                        <label class="form-label" for="negocio_nombre">Nombre:</label>
                        <input type="text" class="form-control" id="negocio_nombre" name="negocio_nombre" required>
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
