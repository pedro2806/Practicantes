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
    <!-- Incluir Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
        <!-- Content starts here -->
        <div id = "content">
            <?php
                include 'encabezado.php';
            ?>
            <!-- Begin Page Content -->
            <div class = "container-fluid">
                
                <!-- Page Heading -->
                <div class = "d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class = "h3 mb-0 text-gray-800">Registrar Usuario</h1>
                </div>
                
                <!-- Content Row -->
                <div class = "row">
                    <div class = "card shadow mb-2">
                        <form id="form-nuevo-usuario" method="post" action="" enctype="multipart/form-data">
                            <div class = "card-head"><br>
                                    <!--Datos Usuario-->
                                    <div class = "row">                         
                                        <div class = "col-sm-3">
                                            <label>Nombre (s)</label>
                                            <input id="nombre" name="nombre"  class="form-control"  required></input>
                                        </div>
                                        
                                        <div class = "col-sm-3">
                                            <label>Apellidos</label>
                                            <input id="apellidos" name="apellidos"  class="form-control"  required></input>
                                        </div>
                                        
                                        <div class = "col-sm-3">
                                            <label for="correo" class="form-label">Email</label>
                                            <input id="correo" name="correo" type="email" class="form-control" placeholder="name@example.com" required></input>
                                        </div>
                                        
                                        <div class = "col-sm-3">
                                            <label for="telefono">Teléfono</label>
                                            <input type="tel" id="telefono" name="telefono" class="form-control"/>
                                        </div>
                                    </div> <br>
                                    <!--Datos Personales-->
                                    <div class = "row">
                                        <div class = "col-sm-3">
                                            <label for="curp">CURP</label>
                                            <input id="curp" name="curp" class="form-control"/>
                                        </div>

                                        <div class = "col-sm-3">
                                            <label for="rfc">RFC</label>
                                            <input id="rfc" name="rfc" class="form-control"/>
                                        </div>

                                        <div class = "col-sm-3">
                                            <label for="nss">NSS</label>
                                            <input id="nss" name="nss" class="form-control" required/>
                                        </div>
                                        
                                        <div class = "col-sm-3">
                                            <label for="sexo">Sexo</label>
                                            <select id="sexo" name="sexo" class="form-select">
                                                <option value="">Selecciona...</option>
                                                <option value="M">Masculino</option>
                                                <option value="F">Femenino</option>
                                            </select>
                                        </div>
                                    </div> <br>
                                    <!--Datos Empresa-->
                                    <div class = "row">
                                        <div class = "col-sm-3">
                                            <label>Usuario</label>
                                            <input id="usuario" name="usuario"  class="form-control"  required></input>
                                        </div>
                                        <!--CONTRASEÑA-->
                                        <div class = "col-sm-3">
                                            <label for="password">Contraseña</label>
                                            <input id="password" name="password" class="form-control" required></input>
                                        </div>
                                        
                                        <div class = "col-sm-3">
                                            <label for="id_area">Área</label>
                                            <select id="id_area" name="id_area" class="form-select" required>
                                                <option value="">Selecciona...</option>
                                            </select>
                                        </div>
                                        
                                        <div class = "col-sm-3">
                                            <label for="id_jefe">Jefe</label>
                                            <select id="id_jefe" name="id_jefe" class="form-select" required>
                                                <option value="">Selecciona...</option>
                                            </select>
                                        </div>
                                    </div> <br>
                                    <!--Datos Escuela-->
                                    <div class = "row">
                                        <div class = "col-sm-3">
                                            <label for="id_escuela">Escuela</label>
                                            <select id="id_escuela" name="id_escuela" class="form-select" required>
                                                <option value="">Selecciona...</option>
                                            </select>
                                        </div>
                                        
                                        <div class = "col-sm-3">
                                            <label>Hrs. Requeridas</label>
                                            <input type="number" id="hrs_requeridas" name="hrs_requeridas"  class="form-control" ></input>
                                        </div>
                                        
                                        <div class = "col-sm-3">
                                            <label>Inicio de Practicas/Servicio</label>
                                            <input type="date" id="inicio_p" name="inicio_p"  class="form-control" required></input>
                                        </div>
                                        
                                        <div class = "col-sm-3">
                                            <label>Fin de Practicas/Servicio</label>
                                            <input type="date" id="fin_p" name="fin_p"  class="form-control"></input>
                                        </div>
                                            <!--ROL-->
                                        <div class = "col-sm-3">
                                            <input type="hidden" id="rol" name="rol" class="form-control" value="2"/>
                                        </div>
                                            <!--ESTATUS-->
                                        <div class = "col-sm-3">
                                            <input type="hidden" id="estatus" name="estatus" class="form-control" value="1"/>
                                        </div>
                                    </div> <br>
                                    <center>
                                    <div class = "col-sm-2"><br>
                                        <button type="button" id="confirmar" class="btn btn-sm btn-outline-success" onClick = "enviarDatos()">Confirmar</button>
                                    </div>
                                    </center>
                            <br></div>
                        </form>
                    </div>
                </div>
            </div>
                    <!-- End of Main Content -->
                    <br><br><br><br>
                    <!-- Footer -->
                    <footer class = "sticky-footer bg-white">
                        <div class = "container my-auto">
                            <div class = "copyright text-center my-auto">
                                <span>Copyright &copy; MESS</span>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->
            </div>
        </div><!-- End of Content Wrapper -->
    </div><!-- End of Page Wrapper -->
    </div>
    <!-- Scroll to Top Button-->
    <a class = "scroll-to-top rounded" href = "#page-top">
        <i class = "fas fa-angle-up"></i>
    </a>
</body>
    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src = "vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src = "vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src = "js/sb-admin-2.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js" defer="defer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- Incluir Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!--SWEET ALERT2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script type="text/javascript">
        $(document).ready(function () {
            cargarEscuela();
            cargarArea();
            cargarJefe();
            $('#id_area, #id_jefe, #id_escuela').select2({
                width: '100%'
            });
        });
     
        //Cargar Escuelas   
        function cargarEscuela(){
            accion = "cargarEsc";
            
            $.ajax({
                url: 'acciones_usuario.php',
                method: 'POST',
                dataType: 'json', 
                data: {accion},
                success: function(response) {
                    var escuelas = $('#id_escuela'); 
                   
                    response.forEach(function(Registro) {
                            var option = $('<option></option>').attr('value', Registro.id_escuela).text(Registro.nombre_esc);
                            escuelas.append(option);
                        }
                    )
                },
                error: function(xhr, status, error) {
                    console.error('Error al cargar las escuelas:', error);
                }
            });  
        }
        
        //Cargar Areas  
        function cargarArea(){
            accion = "cargarArea";
            
            $.ajax({
                url: 'acciones_usuario.php',
                method: 'POST',
                dataType: 'json', 
                data: {accion},
                success: function(response) {
                   var area = $('#id_area'); 
                   
                   response.forEach(function(Registro) {
                            var option = $('<option></option>').attr('value', Registro.id_area).text(Registro.AREA);
                            area.append(option);
                       }
                   )
                },
                error: function(xhr, status, error) {
                    console.error('Error al cargar las áreas:', error);
                }
            });
        }

        //Cargar Jefes|
        function cargarJefe(){
            accion = "cargarJefe";
            
            $.ajax({
                url: 'acciones_usuario.php',
                method: 'POST',
                dataType: 'json', 
                data: {accion},
                success: function(response) {
                   var jefe = $('#id_jefe'); 
                   
                   response.forEach(function(Registro) {
                            var option = $('<option></option>').attr('value', Registro.id_usuario).text(Registro.nombre);
                            jefe.append(option);
                       }
                   )
                },
                error: function(xhr, status, error) {
                    console.error('Error al cargar los jefes:', error);
                }
            });
        }
        //Guardar Usuario   
        function enviarDatos(){
            const form = document.getElementById('form-nuevo-usuario');
            const formData = new FormData(form);
            formData.append('accion', 'nuevo_usuario');

            $.ajax({
                url: 'acciones_usuario.php',
                method: 'POST',
                dataType: 'json',
                data: formData,
                processData: false,
                contentType: false,
                success: function(Registros) { /* ... */ }
            });
        }
    </script>
</html>