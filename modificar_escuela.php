<!DOCTYPE html>
<html lang="sp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modificar Escuela</title>

    <link href = "vendor/fontawesome-free/css/all.min.css" rel = "stylesheet" type = "text/css">
    <link href = "https://fonts.googleapis.com/css?family = Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel = "stylesheet">
    <link href = "css/sb-admin-2.min.css" rel = "stylesheet">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
        session_start();
        include 'menu.php';
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
            
                <?php include 'encabezado.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Modificar Escuela</h1>                        
                    </div>
                    <?php             
                    include 'conn.php';
                        $id_escuela = $_GET['id_escuela'];
                    ?>
                    <div class="card shadow mb-2">
                        <div class="card-body">
                            <form action="acciones_escuela.php" method="post">
                                <div class="row">
                                    <!--NOMBRE-->
                                    <div class = "col-sm-4">
                                        <label for="nombre_esc">Nombre:</label>
                                        <input id="nombre_esc" name="nombre_esc" class="form-control" required>
                                    </div> 
                                    <!--DIRECCION-->
                                    <div class = "col-sm-4">
                                        <label for="direccion">Direcci&oacute;n:</label>
                                        <input id="direccion" name="direccion" class="form-control" required>
                                    </div>
                                    <!--DOCENTE-->
                                    <div class = "col-sm-4">
                                        <label for="maestro">Docente:</label>
                                        <input id="maestro" name="maestro" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--TELEFONO-->
                                    <div class = "col-sm-4">
                                        <label for="tel_escuela">Tel&eacute;fono:</label>
                                        <input id="tel_escuela" name="tel_escuela" class="form-control" required>
                                    </div>
                                    <!--CORREO-->
                                    <div class = "col-sm-4">
                                        <label for="correo_esc">Correo:</label>
                                        <input id="correo_esc" name="correo_esc" class="form-control" required>
                                    </div>
                                    <!--HORAS REQUERIDAS-->
                                    <div class = "col-sm-4">
                                        <label for="hrs_requeridas">Horas Requeridas:</label>
                                        <input id="hrs_requeridas" name="hrs_requeridas" class="form-control" required>
                                    </div>
                                </div>
                                <br>
                                    <center>
                                        <button type="button" class="btn btn-sm btn-outline-success" onclick="modificar()">Confirmar</button>
                                    </center>
                            </form>
                        </div>   
                    </div>
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; MESS</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</body>

    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src = "vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src = "vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src = "js/sb-admin-2.min.js"></script>    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>    
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
	<!-- Incluir Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Incluir Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <script type="text/javascript">
    
        $(document).ready(function () {
            InfoEscuela();
        });
        
        //Traer infor de la escuela
        function InfoEscuela() {
            var id_escuela = new URLSearchParams(window.location.search).get('id_escuela'); 
        
            $.ajax({
                url: 'acciones_escuela.php',
                type: 'POST',
                data: { accion: 'InfoEsc', id_escuela: id_escuela }, 
                dataType: 'json',
                success: function(respuesta) {
        
                    if (respuesta.length > 0) {
                        var registro = respuesta[0]; 
        
                        // Asignar valores a los inputs del formulario
                        $('#nombre_esc').val(registro.nombre);
                        $('#direccion').val(registro.direccion);
                        $('#maestro').val(registro.maestro);
                        $('#tel_escuela').val(registro.tel_escuela);
                        $('#correo_esc').val(registro.correo);
                        $('#hrs_requeridas').val(registro.hrs_requeridas);
                    } else {
                        Swal.fire({
                            icon: "error",
                            text: "No se encontraron datos para la escuela seleccionada.",
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        icon: "error",
                        text: "Error al cargar las escuelas. Intenta nuevamente.",
                    });
                }
            });
        }
        
        //Guardar cambios
        function modificar() {
            // Obtener los valores de los inputs
            var id_escuela = new URLSearchParams(window.location.search).get('id_escuela');
            var nombre_esc = $('#nombre_esc').val();
            var direccion = $('#direccion').val();
            var maestro = $('#maestro').val();
            var tel_escuela = $('#tel_escuela').val();
            var correo_esc = $('#correo_esc').val();
            var hrs_requeridas = $('#hrs_requeridas').val();
        
            $.ajax({
                url: 'acciones_escuela.php',
                type: 'POST',
                data: {accion: 'modificar', id_escuela, nombre_esc, direccion, maestro, tel_escuela, correo_esc, hrs_requeridas},
                dataType: 'json',
                success: function(respuesta) {
                    Swal.fire({
                        icon: "success",
                        text: "Escuela modificada correctamente.",
                    }).then(() => {
                        window.location.href = 'https://messbook.com.mx/Practicantes/escuelas.php';
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        icon: "error",
                        text: "Ocurrió un error al realizar la solicitud. Intenta nuevamente.",
                    });
                }
            });
        }
    </script>
</body>
</html>