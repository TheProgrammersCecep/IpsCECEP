var dt;

function gesCiudad(){
    $(".container-fluid").on("click","button#actualizar",function(){
         var datos=$("#feditarh").serialize();
         $.ajax({
            type:"get",
            url:"./php/Controladores/controladorCiudad.php",
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
              text: "¿Realmente desea borrar la ciudad con codigo : " + codigo + " ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "./php/Controladores/controladorCiudad.php",
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
            $("#cpaise option").remove()       
            $("#cpaise").append("<option selecte value=''>Seleccione un pais</option>")
            $.each(resultado.data, function (index, value) { 
              $("#cpaise").append("<option value='" + value.pais_cod + "'>" + value.pais_nomb + "</option>")
            });
         });
  })
    

    $(".container-fluid").on("click","a.editar",function(){
       var codigo = $(this).data("codigo");
       var pais, ciudad, sede;
       $.ajax({
           type:"get",
           url:"./php/Controladores/controladorCiudad.php",
           data: {codigo: codigo, accion:'consultar'},
           dataType:"json"
           }).done(function( ciudad ) {        
                if(ciudad.respuesta === "no existe"){
                    swal({
                      type: 'error',
                      title: 'Oops...',
                      text: 'Ciudad no existe!!!!!'                         
                    })
                } else {
                    $("#ccodigo").val(ciudad.codigo);  
                    $("#cciudad").val(ciudad.ciudad);                   
                    $("#cpais").val(ciudad.pais);
                    pais = ciudad.pais;
                }
           });

           $.ajax({
             type:"get",
             url:"./php/Controladores/controladorPais.php",
             data: {accion:'listar'},
             dataType:"json"
           }).done(function( resultado ) {                     
              $("#cpais option").remove();
              $.each(resultado.data, function (index, value) { 
                
                if(pais === value.pais_cod){
                  $("#cpais").append("<option selected value='" + value.pais_cod + "'>" + value.pais_nomb + "</option>")
                }else {
                  $("#cpais").append("<option value='" + value.pais_cod + "'>" + value.pais_nomb + "</option>")
                }
              });
           });  
       })


       $(".container-fluid").on("click","button#grabar",function(){
      
        var datos=$("#fnuevoc").serialize();
         $.ajax({
              type:"get",
              url:"./php/Controladores/controladorCiudad.php",
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
        "ajax": "./php/Controladores/controladorCiudad.php?accion=listar",
        "columns": [
            { "data": "ciudad_cod"} ,
            { "data": "ciudad_nomb" },
            { "data": "pais_nomb" },
            { "data": "ciudad_cod",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },
            { "data": "ciudad_cod",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-info btn-sm editar" data-toggle="modal" data-target="#editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
  });
  gesCiudad();
});