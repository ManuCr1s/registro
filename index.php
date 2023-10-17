<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registro de Personas</title>
   <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/datatables.min.css">
   <link rel="stylesheet" href="css/styles.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
   <div class="container-fluid">
         <div class="container">
            <div class="row my-4">
               <div class="col-md-12">
                  <h4 class="text-center">Registro de Visitantes - Municipalidad Provincial de Pasco</h4>
               </div>
            </div>

         <hr>
               <div class="row">
                  <div class="col-md-12">
                     <h6>TOTAL DE REGISTROS <span class="badge badge-secondary p-2" id="contador"></span></h6>
                  </div>
                  <div class="col-md-12">

                     <table id="register" class="display" style="width:100%">
                        <thead>
                              <tr>
                                 <th>Nombres</th>
                                 <th>Dni</th>
                                 <th>Hora Ingreso</th>
                                 <th>Institucion</th>
                                 <th>Oficina</th>
                                 <th>Hora Salida</th>
                              </tr>
                        </thead>
                        <tbody>
                        </tbody>
                     </table>

                  </div>
               </div>
         </div>
   </div>
      <script src="js/plugin/jquery.js"></script>
      <script src="js/plugin/datatables.min.js"></script>
      <script src="js/scripts/functions.js"></script>
      <script src="js/scripts/register.js"></script>
</body>
</html>