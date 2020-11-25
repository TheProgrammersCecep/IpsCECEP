var dt;

function gesEmpleado(){
  $(".container-fluid").on("click","button#actualizar",function(){
    var datos=$("#feditarh").serialize();
    $.ajax({
       type:"get",
       url:"./php/Controladores/controladorEmpleado.php",
       data: datos,
       dataType:"json"
     }).done(function( resultado ) {
         if(resultado.respuesta){
           swal(
               'Actualizado!',
               'Se actualizaron los datos correctamente',
               'success'
           )     
           dt.ajax.reload();
        } else {
           swal({
             type: 'error',
             title: 'Oops...',
             text: 'Ha ocurrido un error!'                         
           })
       }
   });
})

$(".container-fluid").on("click","a.borrar",function(){
   //Recupera datos del formulario
   var codigo = $(this).data("codigo");

   swal({
         title: '¿Está seguro?',
         text: "¿Realmente desea borrar el empleado con codigo : " + codigo + " ?",
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Si, Borrarlo!'
   }).then((decision) => {
           if (decision.value) {

               var request = $.ajax({
                   method: "get",
                   url: "./php/Controladores/controladorEmpleado.php",
                   data: {codigo: codigo, accion:'borrar'},
                   dataType: "json"
               })

               request.done(function( resultado ) {
                   if(resultado.respuesta == 'correcto'){
                       swal(
                           'Borrado!',
                           'La Empleado con codigo : ' + codigo + ' fue borrada',
                           'success'
                       )     
                       dt.ajax.reload();                            
                   } else {
                       swal({
                         type: 'Error',
                         title: 'Oops...',
                         text: 'Ocurrio un error!'                         
                       })
                   }
               });
                
               request.fail(function( jqXHR, textStatus ) {
                   swal({
                     type: 'Error',
                     title: 'Oops...',
                     text: 'Ocurrio un error!' + textStatus                          
                   })
               });
           }
   })

});

$(".container-fluid").on("click","button#nuevo",function(){
  $.ajax({
      type:"get",
      url:"./php/Controladores/controladorPais.php",
      data: {accion:'listar'},
      dataType:"json"
    }).done(function( resultado ) {            
       $("#epaisn option").remove()       
       $("#epaisn").append("<option selecte value=''>Seleccione un pais</option>")
       $.each(resultado.data, function (index, value) { 
         $("#epaisn").append("<option value='" + value.pais_cod + "'>" + value.pais_nomb + "</option>")
       });
    });

    $.ajax({
      type:"get",
      url:"./php/Controladores/controladorCiudad.php",
      data: {accion:'listar'},
      dataType:"json"
    }).done(function( resultado ) {            
       $("#eciudadn option").remove()       
       $("#eciudadn").append("<option selecte value=''>Seleccione una ciudad</option>")
       $.each(resultado.data, function (index, value) { 
         $("#eciudadn").append("<option value='" + value.ciudad_cod + "'>" + value.ciudad_nomb + "</option>")
       });
    });

    $.ajax({
      type:"get",
      url:"./php/Controladores/controladorSede.php",
      data: {accion:'listar'},
      dataType:"json"
    }).done(function( resultado ) {            
       $("#eseden option").remove()       
       $("#eseden").append("<option selecte value=''>Seleccione una sede</option>")
       $.each(resultado.data, function (index, value) { 
         $("#eseden").append("<option value='" + value.sede_cod + "'>" + value.sede_nomb + "</option>")
       });
    });
})


$(".container-fluid").on("click","a.editar",function(){
  var codigo = $(this).data("codigo");
  var pais, ciudad, sede;
  $.ajax({
      type:"get",
      url:"./php/Controladores/controladorEmpleado.php",
      data: {codigo: codigo, accion:'consultar'},
      dataType:"json"
      }).done(function( empleado ) {        
           if(empleado.respuesta === "no existe"){
               swal({
                 type: 'error',
                 title: 'Oops...',
                 text: 'Empleado no existe!!!!!'                         
               })
           } else {
               $("#ecodigo").val(empleado.codigo);  
               $("#eempleado").val(empleado.empleado); 
               $("#ecargo").val(empleado.cargo);
               pais = empleado.pais;
               ciudad = empleado.ciudad;
               sede = empleado.sede;
           }
      });

      $.ajax({
        type:"get",
        url:"./php/Controladores/controladorPais.php",
        data: {accion:'listar'},
        dataType:"json"
      }).done(function( resultado ) {                     
         $("#epais option").remove();
         $.each(resultado.data, function (index, value) { 
           
           if(pais === value.pais_cod){
             $("#epais").append("<option selected value='" + value.pais_cod + "'>" + value.pais_nomb + "</option>")
           }else {
             $("#epais").append("<option value='" + value.pais_cod + "'>" + value.pais_nomb + "</option>")
           }
         });
      });
      
      $.ajax({
        type:"get",
        url:"./php/Controladores/controladorCiudad.php",
        data: {accion:'listar'},
        dataType:"json"
      }).done(function( resultado ) {
        $("#eciudad option").remove();
          $.each(resultado.data, function (index, value) { 
            
            if(ciudad === value.ciudad_cod){
              $("#eciudad").append("<option selected value='" + value.ciudad_cod + "'>" + value.ciudad_nomb + "</option>")
            }else {
              $("#eciudad").append("<option value='" + value.ciudad_cod + "'>" + value.ciudad_nomb + "</option>")
            }
          });
      });

      $.ajax({
        type:"get",
        url:"./php/Controladores/controladorSede.php",
        data: {accion:'listar'},
        dataType:"json"
      }).done(function( resultado ) {
        $("#esede option").remove();
          $.each(resultado.data, function (index, value) { 
            
            if(sede === value.sede_cod){
              $("#esede").append("<option selected value='" + value.sede_cod + "'>" + value.sede_nomb + "</option>")
            }else {
              $("#esede").append("<option value='" + value.sede_cod + "'>" + value.sede_nomb + "</option>")
            }
          });
      });
  })


  $(".container-fluid").on("click","button#grabar",function(){
 
   var datos=$("#fnuevoe").serialize();
    $.ajax({
         type:"get",
         url:"./php/Controladores/controladorEmpleado.php",
         data: datos,
         dataType:"json"
       }).done(function( resultado ) {
           if(resultado.respuesta){
             swal(
                 'Grabado!!',
                 'El registro se grabó correctamente',
                 'success'
             )     
             dt.ajax.reload();
          } else {
             swal({
               type: 'error',
               title: 'Oops...',
               text: 'Something went wrong!'                         
             })
         }
     });
 });
}

$(document).ready(() => {
  dt = $("#tabla").DataTable({
        "language": { "url": "js/Spanish.json"},
        "ajax": "./php/Controladores/controladorEmpleado.php?accion=listar",
        "columns": [
            { "data": "empleado_cod"} ,
            { "data": "empleado_nomb" },
            { "data": "empleado_cargo" },
            { "data": "sede_nomb" },
            { "data": "ciudad_nomb" },
            { "data": "pais_nomb" },
            { "data": "empleado_cod",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },
            { "data": "empleado_cod",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-info btn-sm editar" data-toggle="modal" data-target="#editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
  });
  gesEmpleado();
});