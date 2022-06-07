var tabla_negocio;

function init(){
  $("#negocio_form").on("submit",function(e){
      crud_crear_y_editar(e);	
  });
}

$(document).ready(function(){ 
  tabla_negocio=$('#negocio_data').dataTable({
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
          url: '../../controllers/ctrl_negocio.php?opcion=listar_negocios_activos',
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
  var formData = new FormData($("#negocio_form")[0]);
  $.ajax({
      url: "../../controllers/ctrl_negocio.php?opcion=crud_crear_y_editar",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function(datos){
          console.log(datos);
          $('#negocio_form')[0].reset();
          $("#modal_negocio").modal('hide');
          tabla_negocio.ajax.reload()

          swal.fire(
              'Registro!',
              'Operación realizada con exito!.',
              'success'
          )
      }
  });
}

function eliminar(negocio_id){
  swal.fire({
      title: 'Eliminar',
      text: "¿Quieres eliminar este negocio?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si',
      cancelButtonText: 'No',
      reverseButtons: true
  }).then((result) => {
      if (result.isConfirmed) {

          $.post("../../controllers/ctrl_negocio.php?opcion=eliminar_negocio",{negocio_id:negocio_id},function (data) {
          });

          $('#negocio_data').DataTable().ajax.reload();	

          swal.fire(
              'Eliminado!',
              'El registro se elimino correctamente.',
              'success'
          )
      }
  })
}

function editar(negocio_id){
    $('#mdl_titulo_negocio').html('Editar negocio:')

    $.post("../../controllers/ctrl_negocio.php?opcion=mostrar_informacion_editar",{negocio_id:negocio_id}, function(data){
        /* Transformamos los datos del controlador a tipo json */
        data = JSON.parse(data);
        $('#negocio_id').val(data.negocio_id)
        $('#negocio_nombre').val(data.negocio_nombre)
    })

    $('#modal_negocio').modal('show')
}

$(document).on("click","#btn_negocio", function(){
  $('#mdl_titulo_negocio').html('Nuevo registro')
  $('#negocio_form')[0].reset()
  $('#negocio_id').val('')
  $('#modal_negocio').modal('show')
});

init()
