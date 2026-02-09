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
                        <form action="acciones_practicas.php" method="POST" enctype="multipart/form-data">                        
                            <div class = "card-head"><br>
                                <form method="post" action=""><br>
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
                                            <input id="correo" name="correo" type="email" class="form-control" placeholder="name@example.com">
                                        </div>
                                        
                                        <div class = "col-sm-3">
                                            <label for="telefono">Teléfono</label>
                                            <input type="tel" id="telefono" name="telefono" class="form-control"/>
                                        </div>
                                    </div> <br>
                                    <div class = "row">
                                        <div class = "col-sm-3">
                                            <label for="id_escuela">Escuela</label>
                                            <select id="id_escuela" name="id_escuela" class="form-select" required>
                                                <option value="">Selecciona...</option>
                                            </select>
                                        </div>
                                        
                                        <div class = "col-sm-3">
                                            <label>Hrs. Requeridas</label>
                                            <input type="number" id="hrs_requeridas" name="hrs_requeridas"  class="form-control"  required></input>
                                        </div>
                                        
                                        <div class = "col-sm-3">
                                            <label>Inicio de Practicas/Servicio</label>
                                            <input type="date" id="inicio_p" name="inicio_p"  class="form-control" required></input>
                                        </div>
                                        
                                        <div class = "col-sm-3">
                                            <label>Fin de Practicas/Servicio</label>
                                            <input type="date" id="fin_p" name="fin_p"  class="form-control"  required></input>
                                        </div>
                                    </div> <br>
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
                                            <label for="rol">Rol</label>
                                            <select id="rol" name="rol" class="form-select" required>
                                                <option value="">Selecciona...</option>
                                                <option value="2">Practicante/Servicio Social</option>
                                                <option value="1">Jefe de Área</option>
                                                <option value="0">Administrador</option>
                                            </select>
                                        </div>
                                            <!--ESTATUS-->
                                        <div class = "col-sm-3">
                                            <input type="hidden" id="estatus" name="estatus" class="form-control" value="1"/>
                                        </div>
                                    </div> 
                                    <center>
                                    <div class = "col-sm-2"><br>
                                        <button type="button" id="confirmar" class="btn btn-sm btn-outline-success" onClick = "enviarDatos()">Confirmar</button>
                                    </div>
                                    </center>
                                </form><br>
                            </div>
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
                            var option = $('<option></option>').attr('value', Registro.id_area).text(Registro.CDAREA);
                            area.append(option);
                       }
                   )
                },
                error: function(xhr, status, error) {
                    console.error('Error al cargar las áreas:', error);
                }
            });
        }
    
        //Guardar Usuario   
        function enviarDatos(){
            var nombre = $('#nombre').val();
            var apellidos = $('#apellidos').val();
            var correo = $('#correo').val();
            var telefono = $('#telefono').val();
            var id_escuela = $('#id_escuela').val();
            var hrs_requeridas = $('#hrs_requeridas').val();
            var inicio_p = $('#inicio_p').val();
            var fin_p = $('#fin_p').val();
            var usuario =$('#usuario').val();
            var password = $('#password').val();
            var id_area = $('#id_area').val();
            var rol = $('#rol').val();
            var accion = "nuevo_usuario";
            
            $.ajax({
                url: 'acciones_usuario.php',
                method: 'POST',
                async: false,
                dataType: 'json',
                data:{accion, nombre, apellidos, correo, telefono, id_escuela , hrs_requeridas, inicio_p, fin_p, usuario, password, id_area, rol},
                success: function(Registros) {
                    if (Registros == '1') {
                        Swal.fire({
                        title: '¡Éxito!',
                        text: 'Se registro al usuario.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    });
                        window.location.assign("modificar_usuario.php");
                    }
                },error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                        title: '¡Error!',
                        text: 'No se pudo registrar a usuario.',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    });;
                }
            });
        }
    </script>
</html>