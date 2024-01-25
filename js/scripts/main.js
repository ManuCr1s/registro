$(document).ready(function(){
    offices($('#oficina'),'country');
    $('#dni').on("keypress", onlyNumbers);
    count($('#contador'),'count');
    $.ajax({
        url: 'scripts/datatable.php', 
        dataType: 'json',
        success: function(data) {    
            $('#register').DataTable({
                'response':true,    
                'data':data,
                'columns': [
                    { data: "nombre" },
                    { data: "dni" },
                    { data: "entrada" },
                    { data: "entidad" },
                    { data: "oficina" },
                    { 
                        data: 'salida',   
                        render: function(data, type, row) {
                            if (data == null && row.oficina == 'ALCALDÍA') {
                                return '<button class="btn btn-primary" onclick="calcular('+row.id+')">REGISTRAR</button>';
                            } else {
                                return data;
                            }
                        }
                    }
                ]
            });
        }
    }); 
});