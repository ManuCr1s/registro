<!DOCTYPE html>
<html lang="es">
<head>
<title>Registro de Personas</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/datatables.min.css">
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
      <div class="container">
         <div class="container-fluid">
               <form id="idForm">

                     <div class="form-row">
                        <div class="form-group col-md-6 pr-5 py-3">
                              <h4>Visitante</h4>
                              <label for="inputEmail4">Documento de Identidad</label>
                              <div class="d-flex">
                                    <input type="text" class="form-control input-form"  name="dni" id="dni" placeholder="Documento Identidad" maxlength="8">
                                    <button class="btn btn-primary ml-3" id="buscar"><i class="fas fa-user"></i> </button>
                              </div>
                              <div class="d-block my-4">
                                    <label for="inputEmail4">Nombres y Apellidos</label>
                                    <input type="text" class="form-control input-form" id="nombre" name="nombre" placeholder="Nombres y Apellidos">
                              </div>
                         
                        </div>
                        <div class="form-group col-md-6 pr-5 py-3">
                              <h4>Visita</h4>
                              <div class="d-block">
                                    <label for="inputPassword4">Oficina de Destino</label>
                                    <select class="form-control" name="oficina" id="oficina">
                                       <option value="9999" selected>Seleccione Oficina</option>
                                    </select>
                              </div>
                              <div class="d-block my-4">
                                    <label for="inputEmail4">Institucion de Procedencia</label>
                                    <input type="text" class="form-control input-form" id="procedencia" name="procedencia" placeholder="Institucion Procedencia">
                              </div>
                        </div>
                     </div>
                     <div class="form-row">
                        <div class="form-group col-md-6">
                              <input  class="p-2 ml-2" type="submit" value="Enviar Datos">
                        </div>
                     </div>
               </form>  
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
                                 <th>Ingreso Alcaldia</th>
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
      <script src="js/plugin/sweetalert.min.js"></script>
      <script src="js/scripts/functions.js"></script>
      <script src="js/scripts/main.js"></script>
      <script src="js/scripts/searchdni.js"></script>
      <script src="js/scripts/sendData.js"></script>
</body>
</html>