var tabla_usuario;

function init(){
  $("#usuario_form").on("submit",function(e){
      crud_crear_y_editar(e);	
  });
}

$(document).ready(function(){ 
  tabla_usuario=$('#usuario_data').dataTable({
  "aProcessing": true,//Activamos el procesamiento del datatables
    "aServerSide": true,//Paginación y filtrado realizados por el servidor
    dom: 'Bfrtip',//Definimos los elementos del control de tabla
    buttons: [
              'copyHtml5',
              'excelHtml5',
              'csvHtml5',
              'pdf'
          ],
      "ajax":{
          url: '../../controllers/ctrl_usuario.php?opcion=listar_usuarios_activos',
          type : "get",
          dataType : "json",
          error: function(e){
              console.log(e.responseText);	
          }
      },
  "bDestroy": true,
  "responsive": true,
  "bInfo":true,
  "iDisplayLength": 10,//Por cada 10 registros hace una paginación
    "order": [[ 0, "asc" ]],//Ordenar (columna,orden)
    "language": {
          "sProcessing":     "Procesando...",
          "sLengthMenu":     "Mostrar _MENU_ registros",
          "sZeroRecords":    "No se encontraron resultados",
          "sEmptyTable":     "Ningún dato disponible en esta tabla",
          "sInfo":           "Mostrando un total de _TOTAL_ registros",
          "sInfoEmpty":      "Mostrando un total de 0 registros",
          "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix":    "",
          "sSearch":         "Buscar:",
          "sUrl":            "",
          "sInfoThousands":  ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
              "sFirst":    "Primero",
              "sLast":     "Último",
              "sNext":     "Siguiente",
              "sPrevious": "Anterior"
          },
          "oAria": {
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
  }
}).DataTable();

})

function crud_crear_y_editar(e){
  e.preventDefault();
  var formData = new FormData($("#usuario_form")[0]);
  $.ajax({
      url: "../../controllers/ctrl_usuario.php?opcion=crud_crear_y_editar",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function(datos){
          console.log(datos);
          $('#usuario_form')[0].reset();
          $("#modal_usuario").modal('hide');
          tabla_usuario.ajax.reload()

          swal.fire(
              'Registro!',
              'Operación realizada con exito!.',
              'success'
          )
      }
  });
}

function eliminar(usuario_id){
  swal.fire({
      title: 'Eliminar',
      text: "¿Quieres eliminar este usuario?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si',
      cancelButtonText: 'No',
      reverseButtons: true
  }).then((result) => {
      if (result.isConfirmed) {

          $.post("../../controllers/ctrl_usuario.php?opcion=eliminar_usuario",{usuario_id:usuario_id},function (data) {
          });

          $('#usuario_data').DataTable().ajax.reload();	

          swal.fire(
              'Eliminado!',
              'El registro se elimino correctamente.',
              'success'
          )
      }
  })
}

function editar(usuario_id){
    $('#mdl_titulo_usuario').html('Editar usuario:')

    $.post("../../controllers/ctrl_usuario.php?opcion=mostrar_informacion_editar",{usuario_id:usuario_id}, function(data){
        /* Transformamos los datos del controlador a tipo json */
        data = JSON.parse(data);
        $('#usuario_id').val(data.usuario_id)
        $('#usuario_nombre').val(data.usuario_nombre)
        $('#usuario_apellido').val(data.usuario_apellido)
        $('#usuario_email').val(data.usuario_email)
        $('#usuario_contrasena').val(data.usuario_contrasena)
    })

    $('#modal_usuario').modal('show')
}

function asignar(usuario_id){
    $('#modal_negocio').modal('show')
    $('#negocio_form').submit(function(e){
        e.preventDefault()
        $.ajax({
          url: "../../controllers/ctrl_usuario.php?opcion=asignar_negocio",
          type: "POST",
          data: {
            usuario_id: usuario_id,
            id_negocio: $("#id_negocio").val()
          },
          success: function(datos){
            console.log(datos);
              $('#negocio_form')[0].reset();
              $("#modal_negocio").modal('hide');

              swal.fire(
                  'Registro!',
                  'Operación realizada con exito!.',
                  'success'
              )
          }
        });
    })
}

$(document).on("click","#btn_usuario", function(){
  $('#mdl_titulo_usuario').html('Nuevo registro')
  $('#usuario_form')[0].reset()
  $('#usuario_id').val('')
  $('#modal_usuario').modal('show')
});

init()
