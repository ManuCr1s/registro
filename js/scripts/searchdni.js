$(function(){
    $('#buscar').on('click', function(e){
         e.preventDefault();
         $("#preloader").show();
         let   dni = $('#dni').val(),
               url = routeChange('consulta');
         if(dni.lenght == 8){
            swal({
               title: "Upps ah ocurrido un problema",
               text: "Ingrese un numero de DNI valido",
               icon: "warning",
               buttons: "Click por favor",
            })
         }else{
            $.ajax({
               type:'POST',
               url:url,
               data:'dni='+dni,
               success: function(datos_dni){
                  let myData = $.parseJSON(datos_dni);
                  if(myData.status){
                        $('#nombre').val(myData['nombres']+' '+myData['apellidoPaterno'] + ' ' +myData['apellidoMaterno']);
                        $('#dni').val(myData['numeroDocumento']);
                  }else{
                        swal({
                           title: "Upps ah ocurrido un problema",
                           text: myData.message.toUpperCase(),
                           icon: "warning",
                           buttons: "Click por favor",
                        })
                  }
               }
      });
         }
        
         return false;
    });
 });