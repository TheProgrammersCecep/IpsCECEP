function usuario(){    
    $("#login-form").on('submit',function(e){    
        e.preventDefault();
        var datos = $(this).serialize();
        //console.log(datos)
        $.ajax({
            type:"post",
            url:"./php/Controladores/controladorUsuario.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
            if(resultado.respuesta == "existe"){
                location.href ="./index-panel.php";
            }
            else{
                swal({
                    position: 'center',
                    type: 'error',
                    title: 'Usuario y/o contraseña incorrecta',
                    showConfirmButton: false,
                    timer: 1500
                }),
                function() {
                    $("#usuario").focus().select();
                };                
              }
        });
    })

    $("#register-form").on('submit',function(e){    
        e.preventDefault();
        var datos = $(this).serialize();
        console.log(datos)
        $.ajax({
            type:"post",
            url:"./Controlador/controladorUsuario.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {

            if(resultado.respuesta == "creado"){
                
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'Usuario registrado correctamente',
                    showConfirmButton: false
                });

                location.href = "index-panel.php";

            }

        });
    })


}
