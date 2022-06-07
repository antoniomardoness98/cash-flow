$(document).on('click', '#btn_transaccion', function(){
  console.log("boton cliqueando");
  $.ajax({
    url: "../../controllers/ctrl_transaccion.php?opcion=realizar_transaccion",
    type: "POST",
    data: {
      transaccion_tipo: $("#transaccion_tipo").val(),
      id_negocio: $("#id_negocio").val(),
      transaccion_monto: $("#transaccion_monto").val()
    },
    success: function(datos){
      console.log(datos);
        $('#transaccion_form')[0].reset();

        swal.fire(
            'Registro!',
            'Operación realizada con exito!.',
            'success'
        )
    }
  });
})