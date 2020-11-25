var dt;

function gesServicio(){
    $(".container-fluid").on("click","button#actualizar",function(){
         var datos=$("#feditarp").serialize();
         $.ajax({
            type:"get",
            url:"./php/Controladores/controladorServicio.php",
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
              text: "¿Realmente desea borrar el servicio con codigo : " + codigo + " ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "./php/Controladores/controladorServicio.php",
                        data: {codigo: codigo, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'El servicio con codigo : ' + codigo + ' fue borrado',
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

    $(".container-fluid").on("click","button#grabar",function(){
      
      var datos=$("#fnuevop").serialize();
       $.ajax({
            type:"get",
            url:"./php/Controladores/controladorServicio.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
              if(resultado.respuesta){
                swal(
                    'Grabado!!',
                    'El registro el servicio correctamente',
                    'success'
                )     
                dt.ajax.reload();
             } else {
                swal({
                  type: 'error',
                  title: 'Oops...',
                  text: 'Ocurrio un error!'                         
                })
            }
        });
    });
    

    $(".container-fluid").on("click","a.editar",function(){
       var codigo = $(this).data("codigo");
       $.ajax({
           type:"get",
           url:"./php/Controladores/controladorServicio.php",
           data: {codigo: codigo, accion:'consultar'},
           dataType:"json"
           }).done(function( servicio ) {    
                if(servicio.respuesta === "no existe"){
                    swal({
                      type: 'error',
                      title: 'Oops...',
                      text: 'El servicio no existe!!!!!'                         
                    })
                } else {
                    console.log(servicio);
                    $("#scodigo").val(servicio.codigo);  
                    $("#sservicio").val(servicio.servicio);
                    $("#sdesc").val(servicio.descripcion);
                }
          });
      })

}

$(document).ready(() => {
  dt = $("#tabla").DataTable({
        "language": { "url": "js/Spanish.json"},
        "ajax": "./php/Controladores/controladorServicio.php?accion=listar",
        "columns": [
            { "data": "ser_cod"} ,
            { "data": "ser_nombre" },
            { "data": "ser_descripcion" },
            { "data": "ser_cod",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },
            { "data": "ser_cod",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-info btn-sm editar" data-toggle="modal" data-target="#editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
  });
  gesServicio();
});