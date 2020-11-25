function crer_cita(){ 
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
  });


}

$(document).ready(function(){
    var current = 1,current_step,next_step,steps;
    steps = $("fieldset").length;

    $(".next").click(function(){
      current_step = $(this).parent();
      next_step = $(this).parent().next();
      next_step.show();
      current_step.hide();
      setProgressBar(++current);
    });
    $(".previous").click(function(){
      current_step = $(this).parent();
      next_step = $(this).parent().prev();
      next_step.show();
      current_step.hide();
      setProgressBar(--current);
    });
    setProgressBar(current);
    // Change progress bar action
    function setProgressBar(curStep){
      var percent = parseFloat(100 / steps) * curStep;
      percent = percent.toFixed();
      $(".progress-bar")
        .css("width",percent+"%")
        .html(percent+"%");   
    }

    $.ajax({
      type:"get",
      url:"./php/Controladores/controladorPais.php",
      data: {accion:'listar'},
      dataType:"json"
    }).done(function( resultado ) {                     
       $("#hpais option").remove();
       $("#hpais").append("<option selecte value=''>Seleccione un pais</option>")
       $.each(resultado.data, function (index, value) { 
        $("#hpais").append("<option value='" + value.pais_cod + "'>" + value.pais_nomb + "</option>")
      });
    });    

    $.ajax({
      type:"get",
      url:"./php/Controladores/controladorCiudad.php",
      data: {accion:'listar'},
      dataType:"json"
    }).done(function( resultado ) {                     
       $("#hciudad option").remove();
       $("#hciudad").append("<option selecte value=''>Seleccione una ciudad</option>")
       $.each(resultado.data, function (index, value) { 
        $("#hciudad").append("<option value='" + value.ciudad_cod + "'>" + value.ciudad_nomb + "</option>")
      });
    });  
    
    $.ajax({
      type:"get",
      url:"./php/Controladores/controladorSede.php",
      data: {accion:'listar'},
      dataType:"json"
    }).done(function( resultado ) {                     
       $("#hsede option").remove();
       $("#hsede").append("<option selecte value=''>Seleccione una sede</option>")
       $.each(resultado.data, function (index, value) { 
        $("#hsede").append("<option value='" + value.sede_cod + "'>" + value.sede_nomb + "</option>")
      });
    });  

    $.ajax({
      type:"get",
      url:"./php/Controladores/controladorMedico.php",
      data: {accion:'listar'},
      dataType:"json"
    }).done(function( resultado ) {                     
       $("#hmedico option").remove();
       $("#hmedico").append("<option selecte value=''>Seleccione un medico</option>")
       $.each(resultado.data, function (index, value) { 
        $("#hmedico").append("<option value='" + value.medico_cod + "'>" + value.medico_nomb + "</option>")
      });
    }); 

    $.ajax({
      type:"get",
      url:"./php/Controladores/controladorServicio.php",
      data: {accion:'listar'},
      dataType:"json"
    }).done(function( resultado ) {                     
       $("#hservicio option").remove();
       $("#hservicio").append("<option selecte value=''>Seleccione un servicio</option>")
       $.each(resultado.data, function (index, value) { 
        $("#hservicio").append("<option value='" + value.ser_cod + "'>" + value.ser_nombre + "</option>")
      });
    }); 

  });

$(document).ready(() => {
crer_cita();
    $("#contenido").off("click","button#grabar");
});

  
  

  