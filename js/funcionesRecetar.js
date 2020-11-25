var dt;
var can=1;

function recetar_medic(){ 
  $(".container-fluid").on("click","button#crear",function(){
    var datos=$("#recetarMedic").serialize();
    console.log(datos);
    $.ajax({
         type:"get",
         url:"./php/Controladores/controladorMedic.php",
         data: datos,
         dataType:"json"
       }).done(function( resultado ) {
           if(resultado.respuesta){
             swal(
                 'Registrado',
                 'La formula con los medicamentos se ha creado',
                 'success'
             )     
             //location.reload();
          } else {
             swal({
               type: 'error',
               title: 'Oops...',
               text: 'Ocurrio un error en el servidor!'                         
             })
         }
     });
  });


  $(".container-fluid").on("click","div#nuevomedic",function(){
    
    if(can<4) {
      can++;
      dt='rmedic' + can;
      dt2='canm' + can;
      $("#medicamento").append(
        $("<tbody>").append(
          $("<tr>").append(
            $("<td>").append(
              "<select class='custom-select' id='" + dt + "' name='" + dt + "'>"
            ),
            $("<td>").append(
              "<input type='text' class='form-control' id='" + dt2 + "' name='" + dt2 + "'/>"
            )
          )
        )
      )

      $("#cantidad").val(can);

      $.ajax({
        type:"get",
        url:"./php/Controladores/controladorMedic.php",
        data: {accion:'listar'},
        dataType:"json"
      }).done(function( resultado ) {                     
        $("#" + dt + "option").remove();
        $("#" + dt).append("<option selecte value=''>Seleccione un medicamento</option>")
        $.each(resultado.data, function (index, value) { 
          $("#" + dt).append("<option value='" + value.medic_nomb + "'>" + value.medic_nomb + "</option>")
        });
      });
    }

  });

  /*
  $(".container-fluid").on("click","button#crear",function(){
    console.log("aqui");
    var datos=$("#form-creacion").serialize();
      $.ajax({
          type:"get",
          url:"./php/Controladores/controladorCita.php",
          data: datos,
          dataType:"json"
        }).done(function( resultado ) {
            if(resultado.respuesta){
              console.log("todo bien");
              swal(
                  'Cita Registrada!!',
                  'Se creo la cita correctamente',
                  'success'
              )     
              //dt.ajax.reload();
            } else {
              swal({
                type: 'error',
                title: 'Oops...',
                text: 'Ocurrio un error!'                         
              })
          }
      });
  });*/


}

$(document).ready(() => {
  $("#cantidad").val(can);

  $.ajax({
    type:"get",
    url:"./php/Controladores/controladorMedic.php",
    data: {accion:'listar'},
    dataType:"json"
  }).done(function( resultado ) {                     
     $("#rmedic1 option").remove();
     $("#rmedic1").append("<option selecte value=''>Seleccione un medicamento</option>")
     $.each(resultado.data, function (index, value) { 
      $("#rmedic1").append("<option value='" + value.medic_nomb + "'>" + value.medic_nomb + "</option>")
    });
  });

  recetar_medic();
});

  
  

  