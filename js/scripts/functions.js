function onlyNumbers(code){
    let variable = code.charCode;
    return variable >= 48 && variable <= 57;
}
function inputNull(input){
    return (input.length > 0)
}
function valSelect(select){
    return !(select.val() == 0);
}
function routeChange(parametro){
    return 'scripts/'+parametro+'.php';
}

function offices(selec,url){
    $.ajax({
        type:'POST',
        url:routeChange(url),
        success: function(datos_dni){
            let myData = $.parseJSON(datos_dni);
            let increment = document.createElement('option'),
            opciones = []; 
            increment.value=9999;
            increment.text='SELECCIONE OFICNA';
            opciones.push(increment);
            for (const key in myData) {
                if (myData.hasOwnProperty(key)) {
                    const opcion = document.createElement('option');
                    opcion.value = myData[key].id_oficina;
                    opcion.text = myData[key].nombre.toUpperCase();
                    opciones.push(opcion);
                }
            }
            selec.html(opciones);
            $("#preloader").hide();
        }
    });
}

function count(input,url){
    $.ajax({
        url:routeChange(url),
        type:'GET',
        dataType:'json',
        success: function(data) {
            input.html(data.numero);    
        },
    })
}

function validate(dni,nombre,oficina){
    if(!(dni.val().length == 8)) return {'status':false,'message':'Ingrese DNI valido'};
    if((nombre.val().length == 0))return {'status':false, 'message':'Ingrese nombres'};
    if(oficina.val() == 9999)return {'status':false, 'message':'Seleccione Oficina'};
   // if((start.val().length == 0))return {'status':false, 'message':'Ingrese nombres'};
   return {'status':true};
}

function calcular(id){
    let input = $('#'+id),datos;
    swal({
        title: "¿Esta seguro de registrar hora?",
        text: "Una vez registrada la hora ya nos e podra modificar",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            datos = {
                'time':input.val(),
                'id':id
            };
            $.ajax({
                type:'POST',
                url:routeChange('time'),
                data:datos,
                success:function(data){
                    console.log(data);
                    let myData = $.parseJSON(data);
                    console.log(myData);
                    if(myData.status){
                        swal(myData.message, {
                            icon: "success",
                        }).then(() => {
                            window.location.href = 'registro.php';
                        });
                    }else{
                        swal(myData.message, {
                            icon: "warning",
                        }).then(() => {
                            window.location.href = 'registro.php';
                        });
                    }
                }
            });
/*
            swal("Hora cambiada con exito", {
                icon: "success",
            });*/
        } 
      });
}
/*
function sendValues(dni,url){
    event.preventDefault();
        $.ajax({
            type:'post',
            url:url,
            data:'dni='+dni,
            success:function(dato){
                var response = $.parseJSON(datos);
                if(!response.status){
                    swal({
                        title: "Upps ah ocurrido un problema",
                        text: response.message.toUpperCase(),
                        icon: "warning",
                        buttons: "Click por favor",
                     })
                }else{
                    $('#nombre').val(response['nombres'] + ' ' + response['apellidoPaterno'] + ' ' +response['apellidoMaterno']);
                    $('#dni').val(response['numeroDocumento']);
                }
               
            }
        });    
}*/