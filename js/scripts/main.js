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
                            if (data == null) {
                                return '<div class="row"><input type="time" id="'+row.id+'" class="form-control col-md-9"/><button class="btn btn-primary col-md-3" onclick="calcular('+row.id+')">▼</button>';
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