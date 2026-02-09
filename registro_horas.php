<!DOCTYPE html>
<html lang = "sp">
<head>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE = edge">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1, shrink-to-fit = no">
    <meta name = "description" content = "">
    <meta name = "author" content = "">

    <title>MESS PRACTICANTES</title>

    <!-- Custom fonts for this template-->
    <link href = "vendor/fontawesome-free/css/all.min.css" rel = "stylesheet" type = "text/css">
    <link href = "https://fonts.googleapis.com/css?family = Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel = "stylesheet">

    <!-- Custom styles for this template-->
    <link href = "css/sb-admin-2.min.css" rel = "stylesheet">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js" defer="defer"></script>
</head>
<body id = "page-top">
    <!-- Page Wrapper -->
    <div id = "wrapper">
        <?php
            session_start();
            include 'menu.php';
        ?>
        <!-- Content Wrapper -->
        <div id = "content-wrapper" class = "d-flex flex-column">
            <!-- Main Content -->
            <div id = "content">
                <?php
                    include 'conn.php';
                    include 'encabezado.php';
                ?>
                <!-- Begin Page Content -->
                <div class = "container-fluid">
                    <!-- Page Heading -->
                    <div class = "d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class = "h3 mb-0 text-gray-800">Agregar horario</h1>                        
                    </div>
                    <!-- Content Row -->
                    <div class = "row">
                        <!-- Content Row -->
                        <div class = "card shadow mb-2">
                            
                            <!--Formulario Registro Horario-->
                            <div class = "card-body"><br>
                                    <div class = "row">                         
                                        <div class = "col-sm-2">
                                            <label for="usuario">Usuario</label>
                                            <select id="usuario" name="usuario" class="form-select"  required>
                                                <option value="">Sin Asignar</option>
                                            </select>
                                        </div>
                                        <div class = "col-sm-2">
                                            <label for="dia">Día</label>
                                            <select id="dia" name="dia" class="form-select" required>
                                                <option value="">Selecciona...</option>
                                                <option value="Lunes">Lunes</option>
                                                <option value="Martes">Martes</option>
                                                <option value="Miercoles">Miercoles</option>
                                                <option value="Jueves">Jueves</option>
                                                <option value="Viernes">Viernes</option>
                                            </select>
                                        </div>
                                        <div class = "col-sm-2">
                                            <label for="entrada">Entrada:</label>
                                            <input type="time" id="entrada" name="entrada" class="form-control">
                                        </div>
                                        <div class = "col-sm-2">
                                            <label for="salida">Salida:</label>
                                            <input type="time" id="salida" name="salida" class="form-control">
                                        </div>
                                        <div class = "col-sm-2">
                                            <label>Home Office</label>
                                            <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="homeoffice" name="homeoffice" value="1" class="form-check-input">
                                        </div>
                                        <div class = "col-sm-2">
                                            <label> </label><br>
                                            <input type="button" id="confirmar" class="btn btn-sm btn-outline-success" value="Confirmar" onClick = "registroHorario()">
                                        </div>
                                    </div>
                            </div>
                            <br><br>
                            
                            <!--Tabla "Horario"-->
                            <table id ="horario" name ="horario" class="display responsive table table-striped table-hover table-sm">
                                <thead>
                                    <tr class="table-info">
                                        <th>Practicante</th>
                                        <th>Día</th>
                                        <th>Entrada</th>
                                        <th>Salida</th>
                                        <th>Horas Completas</th>
                                        <th>Home Office</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <br><hr><br>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer class = "sticky-footer bg-white">
                <div class = "container my-auto">
                    <div class = "copyright text-center my-auto">
                        <span>Copyright &copy; MESS</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js" defer="defer"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <!--<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>-->
    <script src = "vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src = "vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src = "js/sb-admin-2.min.js"></script>    
    
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            //Aplica la libreria a la tabla
            $('#horario').DataTable();
            total_horas();
            cargarUsuarios();
            datosTablaHorario();
        });
    
    //Registro Horario
    function registroHorario(){
        
        //OBTENEMOS VALOR SELECT
        var usuario = $('#usuario').val();
        var dia = $('#dia').val();
        var entrada = $('#entrada').val();
        var salida = $('#salida').val();
        var home_office = $('#homeoffice').is(':checked') ? 1 : 0;
        var accion = "creaHorario";
        
        $.ajax({
            url: 'acciones_registro_horas.php',
            method: 'POST',
            async: false,
            dataType: 'text',
            data:{usuario, dia, entrada, salida, home_office, accion},
            success: function(validacion) {
                
                // Maneja las respuestas según lo devuelto por el servidor
                if (validacion === "Existe") {
                    Swal.fire("Advertencia", "Ya existe un horario registrado para este usuario y día.", "warning");
                    
                } else if (validacion === "NoExiste") {
                    Swal.fire("Éxito", "Horario registrado correctamente.", "success");
                    
                } else if (validacion === "NoSeGuardo") {
                    Swal.fire("Error", "Hubo un error al guardar el horario.", "error");
                    
                } else {
                    Swal.fire("Error", "Respuesta inesperada del servidor: " + validacion, "error");
                }
                datosTablaHorario();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Algo Salio Mal!", "Ya existe un horario para este día.", "error");
            }
        });  
    }
    
    //OBTENER datos de la tabla
    function datosTablaHorario(){
        rol = <?php echo $_COOKIE["rol"]; ?>;
        
        $.ajax({
            url: 'acciones_registro_horas.php',
            type: 'POST',
            data: { accion: 'datosTablaHorario'  },
            dataType: 'json', 
            success: function(respuesta) {

                var table = $('#horario').DataTable();
                table.clear().draw();
                
                    respuesta.forEach(function(Registro) {
                        var homeOfficeStatus = (Registro.home_office == 1) ? 'Valido' : 'No Valido';
                        
                        table.row.add([
                            Registro.usuario,
                            Registro.dia, 
                            Registro.entrada,
                            Registro.salida,
                            Registro.horas_completas,
                            homeOfficeStatus
                            
                        ]).draw(false);
                    });  
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                  icon: "warning",
                  text: "!No se pudieron cargar los horarios!",
                });
            }
        });
    }
    
    //Validacion para mostrar usuarios de la misma area
    function cargarUsuarios() {
        accion = "cargarUsuarios";
        
        $.ajax({
            url: 'acciones_registro_horas.php',
            method: 'POST',
            dataType: 'json', 
            data: { accion},
            success: function(response) {
               var usuarios = $('#usuario'); 
               
               response.forEach(function(Registro) {
                        var option = $('<option></option>').attr('value', Registro.id_usuario).text(Registro.usuario);
                        usuarios.append(option);
                   }
               )
            },
            error: function(xhr, status, error) {
                console.error('Error al cargar usuarios:', error);
            }
        });
    }

    </script>
</body>
</html>