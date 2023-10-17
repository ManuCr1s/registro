$(function(){
    $('#idForm').on('submit', function(e){
            e.preventDefault();
            $("#preloader").show();
            let     dni = $('#dni'),
                    nombres = $('#nombre'),
                    oficina = $('#oficina'),
                    start = $('#entrada'),
                    url = routeChange('dates'),
                    campos;
            campos = validate(dni,nombres,oficina,start);
            if(!(campos.status)){
                swal({
                    title: "Upps ah ocurrido un problema",
                    text: campos.message,
                    icon: "warning",
                    buttons: "Click por favor",
                 })
            }else{
                let dates = $(this).serialize();
                $.ajax({
                    type:'POST',
                    url:url,
                    data:dates,
                    success: function(datos_dni){
                        let myData = jQuery.parseJSON(datos_dni);
                        console.log(myData);
                        if(myData.status){
                            swal({
                                title: "¡Felicitaciones!",
                                text: myData.message,
                                icon: "success",
                                buttons: "Click por favor",
                             }).then(() => {
                                window.location.href = 'index.php';
                              });
                        }else{
                            swal({
                                title: "Upps ah ocurrido un problema",
                                text: myData.message,
                                icon: "warning",
                                buttons: "Click por favor",
                             }).then(() => {
                                window.location.href = 'index.php';
                              });
                        }
                    }
                });
                return false;
            }
    })
 });