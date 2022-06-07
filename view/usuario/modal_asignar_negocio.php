<div id="modal_negocio" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="#" id="negocio_form">
        <div class="modal-header">
          <h4 class="modal-title">Asignar negocios</h4>
          </div>
            <div class="modal-body">
              <input type="hidden" id="usuario_id" name="usuario_id">

              <div class="form-group">
                <label for="id_negocio">Seleccione negocios</label>
                <br>
                <?php
                  require_once("../../models/Negocio.php");
                  $negocio = new Negocio();
                  $datos = $negocio->todos_los_negocios();  
                ?>
                <select name="id_negocio" id="id_negocio" class="custom-select col-md-5">
                  <?php 
                  foreach($datos as $negocios): ?>
                    <option value="<?php echo $negocios['negocio_id'] ?>"><?php echo $negocios['negocio_nombre'] ?>  </option>
                  <?php endforeach ?>
                </select>
                <br>
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