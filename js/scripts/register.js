$(document).ready(function(){
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
                    { data: 'salida'}
                ]
            });
        }
    }); 
});