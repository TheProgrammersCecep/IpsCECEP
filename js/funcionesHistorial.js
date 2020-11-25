var dt;

function historialCitas(){
    $(".container-fluid").on("click","button#actualizar",function(){
         var datos=$("#feditarh").serialize();
         $.ajax({
            type:"get",
            url:"./php/Controladores/controladorCita.php",
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
              text: "¿Realmente desea borrar la cita con codigo : " + codigo + " ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "./php/Controladores/controladorCita.php",
                        data: {codigo: codigo, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'La Historia con codigo : ' + codigo + ' fue borrada',
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
    

    $(".container-fluid").on("click","a.editar",function(){
       var codigo = $(this).data("codigo");
       var pais, ciudad, sede, medico, servicio;
       $.ajax({
           type:"get",
           url:"./php/Controladores/controladorCita.php",
           data: {codigo: codigo, accion:'consultar'},
           dataType:"json"
           }).done(function( misCitas ) {        
                if(misCitas.respuesta === "no existe"){
                    swal({
                      type: 'error',
                      title: 'Oops...',
                      text: 'Cita no existe!!!!!'                         
                    })
                } else {
                    $("#hcod").val(misCitas.codigo);  
                    $("#hpaciente").val(misCitas.paciente);                   
                    $("#hfecha").val(misCitas.fecha);
                    $("#hhora").val(misCitas.hora);
                    $("#hdesc").val(misCitas.descripcion);
                    pais = misCitas.pais;
                    ciudad = misCitas.ciudad;
                    sede = misCitas.sede;
                    servicio = misCitas.servicio;
                    medico = misCitas.medico;
                    asesor = misCitas.asesor;
                }
           });

           $.ajax({
             type:"get",
             url:"./php/Controladores/controladorPais.php",
             data: {accion:'listar'},
             dataType:"json"
           }).done(function( resultado ) {                     
              $("#hpais option").remove();
              $.each(resultado.data, function (index, value) { 
                
                if(pais === value.pais_cod){
                  $("#hpais").append("<option selected value='" + value.pais_cod + "'>" + value.pais_nomb + "</option>")
                }else {
                  $("#hpais").append("<option value='" + value.pais_cod + "'>" + value.pais_nomb + "</option>")
                }
              });
           });  
           
           $.ajax({
            type:"get",
            url:"./php/Controladores/controladorCiudad.php",
            data: {accion:'listar'},
            dataType:"json"
          }).done(function( resultado ) {                     
             $("#hciudad option").remove();
             $.each(resultado.data, function (index, value) { 
               
               if(ciudad === value.ciudad_cod){
                 $("#hciudad").append("<option selected value='" + value.ciudad_cod + "'>" + value.ciudad_nomb + "</option>")
               }else {
                 $("#hciudad").append("<option value='" + value.ciudad_cod + "'>" + value.ciudad_nomb + "</option>")
               }
             });
          });

          $.ajax({
            type:"get",
            url:"./php/Controladores/controladorSede.php",
            data: {accion:'listar'},
            dataType:"json"
          }).done(function( resultado ) {                     
             $("#hsede option").remove();
             $.each(resultado.data, function (index, value) { 
               
               if(sede === value.sede_cod){
                 $("#hsede").append("<option selected value='" + value.sede_cod + "'>" + value.sede_nomb + "</option>")
               }else {
                 $("#hsede").append("<option value='" + value.sede_cod + "'>" + value.sede_nomb + "</option>")
               }
             });
          });

          $.ajax({
            type:"get",
            url:"./php/Controladores/controladorMedico.php",
            data: {accion:'listar'},
            dataType:"json"
          }).done(function( resultado ) {                     
             $("#hmedico option").remove();
             $.each(resultado.data, function (index, value) { 
               
               if(medico === value.medico_cod){
                 $("#hmedico").append("<option selected value='" + value.medico_cod + "'>" + value.medico_nomb + "</option>")
               }else {
                 $("#hmedico").append("<option value='" + value.medico_cod + "'>" + value.medico_nomb + "</option>")
               }
             });
          });

          $.ajax({
            type:"get",
            url:"./php/Controladores/controladorServicio.php",
            data: {accion:'listar'},
            dataType:"json"
          }).done(function( resultado ) {                     
             $("#hservicio option").remove();
             $.each(resultado.data, function (index, value) { 
               
               if(servicio === value.ser_cod){
                 $("#hservicio").append("<option selected value='" + value.ser_cod + "'>" + value.ser_nombre + "</option>")
               }else {
                 $("#hservicio").append("<option value='" + value.ser_cod + "'>" + value.ser_nombre + "</option>")
               }
             });
          });

          $.ajax({
            type:"get",
            url:"./php/Controladores/controladorAsesor.php",
            data: {accion:'listar'},
            dataType:"json"
          }).done(function( resultado ) {                     
             $("#hasesor option").remove();
             $.each(resultado.data, function (index, value) { 
               
               if(asesor === value.asesor_cod){
                 $("#hasesor").append("<option selected value='" + value.asesor_cod + "'>" + value.asesor_nomb + "</option>")
               }else {
                 $("#hasesor").append("<option value='" + value.asesor_cod + "'>" + value.asesor_nomb + "</option>")
               }
             });
          });
            
       })

}

$(document).ready(() => {
  dt = $("#tabla").DataTable({
        "language": { "url": "js/Spanish.json"},
        "ajax": "./php/Controladores/controladorCita.php?accion=listarH",
        "columns": [
            { "data": "his_cod"} ,
            { "data": "his_paciente" },
            { "data": "his_fecha" },
            { "data": "his_hora" },
            { "data": "medico_nomb" },
            { "data": "asesor_nomb" },
            { "data": "ser_nombre" },
            { "data": "descripcion" },
            { "data": "sede_nomb" },
            { "data": "his_cod",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },
            { "data": "his_cod",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-info btn-sm editar" data-toggle="modal" data-target="#editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
  });
  historialCitas();
});