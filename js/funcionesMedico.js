var dt;

function gesMedico(){
  $(".container-fluid").on("click","button#actualizar",function(){
    var datos=$("#feditarh").serialize();
    $.ajax({
       type:"get",
       url:"./php/Controladores/controladorMedico.php",
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
         text: "¿Realmente desea borrar el medico con codigo : " + codigo + " ?",
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Si, Borrarlo!'
   }).then((decision) => {
           if (decision.value) {

               var request = $.ajax({
                   method: "get",
                   url: "./php/Controladores/controladorMedico.php",
                   data: {codigo: codigo, accion:'borrar'},
                   dataType: "json"
               })

               request.done(function( resultado ) {
                   if(resultado.respuesta == 'correcto'){
                       swal(
                           'Borrado!',
                           'El Medico con codigo : ' + codigo + ' fue borrado',
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
       $("#mpaisn option").remove()       
       $("#mpaisn").append("<option selecte value=''>Seleccione un pais</option>")
       $.each(resultado.data, function (index, value) { 
         $("#mpaisn").append("<option value='" + value.pais_cod + "'>" + value.pais_nomb + "</option>")
       });
    });

    $.ajax({
      type:"get",
      url:"./php/Controladores/controladorCiudad.php",
      data: {accion:'listar'},
      dataType:"json"
    }).done(function( resultado ) {            
       $("#mciudadn option").remove()       
       $("#mciudadn").append("<option selecte value=''>Seleccione una ciudad</option>")
       $.each(resultado.data, function (index, value) { 
         $("#mciudadn").append("<option value='" + value.ciudad_cod + "'>" + value.ciudad_nomb + "</option>")
       });
    });

    $.ajax({
      type:"get",
      url:"./php/Controladores/controladorSede.php",
      data: {accion:'listar'},
      dataType:"json"
    }).done(function( resultado ) {            
       $("#mseden option").remove()       
       $("#mseden").append("<option selecte value=''>Seleccione una sede</option>")
       $.each(resultado.data, function (index, value) { 
         $("#mseden").append("<option value='" + value.sede_cod + "'>" + value.sede_nomb + "</option>")
       });
    });
})


$(".container-fluid").on("click","a.editar",function(){
  var codigo = $(this).data("codigo");
  var pais, ciudad, sede;
  $.ajax({
      type:"get",
      url:"./php/Controladores/controladorMedico.php",
      data: {codigo: codigo, accion:'consultar'},
      dataType:"json"
      }).done(function( medico ) {        
           if(medico.respuesta === "no existe"){
               swal({
                 type: 'error',
                 title: 'Oops...',
                 text: 'Medico no existe!!!!!'                         
               })
           } else {
               $("#mcodigo").val(medico.codigo);  
               $("#mmedico").val(medico.medico); 
               pais = medico.pais;
               ciudad = medico.ciudad;
               sede = medico.sede;
           }
      });

      $.ajax({
        type:"get",
        url:"./php/Controladores/controladorPais.php",
        data: {accion:'listar'},
        dataType:"json"
      }).done(function( resultado ) {                     
         $("#mpais option").remove();
         $.each(resultado.data, function (index, value) { 
           
           if(pais === value.pais_cod){
             $("#mpais").append("<option selected value='" + value.pais_cod + "'>" + value.pais_nomb + "</option>")
           }else {
             $("#mpais").append("<option value='" + value.pais_cod + "'>" + value.pais_nomb + "</option>")
           }
         });
      });
      
      $.ajax({
        type:"get",
        url:"./php/Controladores/controladorCiudad.php",
        data: {accion:'listar'},
        dataType:"json"
      }).done(function( resultado ) {
        $("#mciudad option").remove();
          $.each(resultado.data, function (index, value) { 
            
            if(ciudad === value.ciudad_cod){
              $("#mciudad").append("<option selected value='" + value.ciudad_cod + "'>" + value.ciudad_nomb + "</option>")
            }else {
              $("#mciudad").append("<option value='" + value.ciudad_cod + "'>" + value.ciudad_nomb + "</option>")
            }
          });
      });

      $.ajax({
        type:"get",
        url:"./php/Controladores/controladorSede.php",
        data: {accion:'listar'},
        dataType:"json"
      }).done(function( resultado ) {
        $("#msede option").remove();
          $.each(resultado.data, function (index, value) { 
            
            if(sede === value.sede_cod){
              $("#msede").append("<option selected value='" + value.sede_cod + "'>" + value.sede_nomb + "</option>")
            }else {
              $("#msede").append("<option value='" + value.sede_cod + "'>" + value.sede_nomb + "</option>")
            }
          });
      });
  })


  $(".container-fluid").on("click","button#grabar",function(){
 
   var datos=$("#fnuevom").serialize();
    $.ajax({
         type:"get",
         url:"./php/Controladores/controladorMedico.php",
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
        "ajax": "./php/Controladores/controladorMedico.php?accion=listar",
        "columns": [
            { "data": "medico_cod"} ,
            { "data": "medico_nomb" },
            { "data": "sede_nomb" },
            { "data": "ciudad_nomb" },
            { "data": "pais_nomb" },
            { "data": "medico_cod",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },
            { "data": "medico_cod",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-info btn-sm editar" data-toggle="modal" data-target="#editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
  });
  gesMedico();
});