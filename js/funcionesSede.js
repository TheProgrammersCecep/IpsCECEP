var dt;

function gesSede(){
    $(".container-fluid").on("click","button#actualizar",function(){
         var datos=$("#feditarh").serialize();
         $.ajax({
            type:"get",
            url:"./php/Controladores/controladorSede.php",
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
              text: "¿Realmente desea borrar la sede con codigo : " + codigo + " ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "./php/Controladores/controladorSede.php",
                        data: {codigo: codigo, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'La Ciudad con codigo : ' + codigo + ' fue borrada',
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
            $("#spaise option").remove()       
            $("#spaise").append("<option selecte value=''>Seleccione un pais</option>")
            $.each(resultado.data, function (index, value) { 
              $("#spaise").append("<option value='" + value.pais_cod + "'>" + value.pais_nomb + "</option>")
            });
         });

         $.ajax({
          type:"get",
          url:"./php/Controladores/controladorCiudad.php",
          data: {accion:'listar'},
          dataType:"json"
        }).done(function( resultado ) {            
           $("#sciudade option").remove()       
           $("#sciudade").append("<option selecte value=''>Seleccione un pais</option>")
           $.each(resultado.data, function (index, value) { 
             $("#sciudade").append("<option value='" + value.ciudad_cod + "'>" + value.ciudad_nomb + "</option>")
           });
        });
  })
    

    $(".container-fluid").on("click","a.editar",function(){
       var codigo = $(this).data("codigo");
       var pais, sede, sede;
       $.ajax({
           type:"get",
           url:"./php/Controladores/controladorSede.php",
           data: {codigo: codigo, accion:'consultar'},
           dataType:"json"
           }).done(function( sede ) {        
                if(sede.respuesta === "no existe"){
                    swal({
                      type: 'error',
                      title: 'Oops...',
                      text: 'Ciudad no existe!!!!!'                         
                    })
                } else {
                    $("#scodigo").val(sede.codigo);  
                    $("#ssede").val(sede.sede); 
                    $("#sdir").val(sede.dir);                  
                    $("#sciudad").val(sede.ciudad);
                    $("#spais").val(sede.pais);
                    pais = sede.pais;
                    ciudad = sede.ciudad;
                }
           });

           $.ajax({
             type:"get",
             url:"./php/Controladores/controladorPais.php",
             data: {accion:'listar'},
             dataType:"json"
           }).done(function( resultado ) {                     
              $("#spais option").remove();
              $.each(resultado.data, function (index, value) { 
                
                if(pais === value.pais_cod){
                  $("#spais").append("<option selected value='" + value.pais_cod + "'>" + value.pais_nomb + "</option>")
                }else {
                  $("#spais").append("<option value='" + value.pais_cod + "'>" + value.pais_nomb + "</option>")
                }
              });
           }); 
           
           $.ajax({
            type:"get",
            url:"./php/Controladores/controladorCiudad.php",
            data: {accion:'listar'},
            dataType:"json"
          }).done(function( resultado ) {
            $("#sciudad option").remove();
              $.each(resultado.data, function (index, value) { 
                
                if(ciudad === value.ciudad_cod){
                  $("#sciudad").append("<option selected value='" + value.ciudad_cod + "'>" + value.ciudad_nomb + "</option>")
                }else {
                  $("#sciudad").append("<option value='" + value.ciudad_cod + "'>" + value.ciudad_nomb + "</option>")
                }
              });
          });
       })


       $(".container-fluid").on("click","button#grabar",function(){
      
        var datos=$("#fnuevos").serialize();
         $.ajax({
              type:"get",
              url:"./php/Controladores/controladorSede.php",
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
        "ajax": "./php/Controladores/controladorSede.php?accion=listar",
        "columns": [
            { "data": "sede_cod"} ,
            { "data": "sede_nomb" },
            { "data": "sede_dir" },
            { "data": "ciudad_nomb" },
            { "data": "pais_nomb" },
            { "data": "sede_cod",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },
            { "data": "sede_cod",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-info btn-sm editar" data-toggle="modal" data-target="#editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
  });
  gesSede();
});