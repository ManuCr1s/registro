$(document).ready(function(){
    $("#preloader").hide();
    let form_id= $('#register'),
        dniInput = $('#dni'),
        distrito = $('#distrito'),
        provincia = $('#provincia'),
        grado = $('#gradoInstruccion'),
        nombre = $('#nombre'),
        apellido = $('#apellido'),
        fecha = $('#fNacimiento'),
        campos;
    dniInput.on("keypress", onlyNumbers);
    form_id.on('submit',function(event){
        event.preventDefault();
        $("#preloader").show();
        campos = validacionCampos(dniInput.val(),nombre.val(),apellido.val(),provincia,distrito,grado,fecha.val());
        if(!campos.success){
            swal({
                title: "Upps ah ocurrido un problema",
                text: campos.message,
                icon: "warning",
                buttons: "Click por favor",
              });
              $("#preloader").hide();    
        }else{
            let dates = $(this).serialize();
            $.ajax({
                url:'scripts/registro.php',
                type:'POST',
                data:dates,
                success:function(response){
                    var response = jQuery.parseJSON(response);
                    if(!response.status){
                        swal({
                            title: "Upps ah ocurrido un problema",
                            text: response.message.toUpperCase(),
                            icon: "warning",
                            buttons: "Click por favor",
                          })
                          .then(() => {
                            window.location.href = 'registro.php';
                          });
                    }else{
                        swal({
                            title: "¡Felicidades!",
                            text: response.message.toUpperCase(),
                            icon: "success",
                            button: "Click por favor",
                          }).then(function(){
                            window.location.href = 'registro.php';
                          });
                    } 
                    $("#preloader").hide();        
                },
                error:function(error){
                    console.log(error.response);
                }
            });
        }
      
    })
})