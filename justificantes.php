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
            <!-- Main Content -->
            <div id = "content" class="mb-0">
                <?php
                    include 'encabezado.php';
                ?>
                <!-- Begin Page Content -->
                <div class = "container-fluid"> 
                    <!-- Page Heading -->
                    <div class = "d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class = "h3 mb-0 text-gray-800">Justificantes</h1>
                    </div>
                </div>
                <!-- FORMULARIO JUSTIFICANTES -->
                <div class="container-fluid">
                    <div id="form_justificantes" name="form_justificantes" class="card shadow mb-0">
                        <div class="card border-left-primary shadow h-60 py-0">
                            
                            <div class="card-body">
                                <form action="acciones_justificante.php" method="POST" enctype="multipart/form-data">                        
                                    <div class = "card-head"><br></div>
                                    <div class = "row">
                                        <div class = "col-sm-1"></div>
                                        <div class = "col-sm-3">
                                            <label>Fecha de Inicio</label>
                                            <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" required>
                                        </div>
                                        <div class = "col-sm-3">
                                            <label>Fecha de Regreso</label>
                                            <input type="date" id="fecha_fin" name="fecha_fin" class="form-control" required>
                                        </div>
                                        <div class = "col-sm-3">
                                            <label for="tipo">Categoria</label>
                                            <select id="tipo" name="tipo" class="form-select" required>
                                                <option value="">Selecciona...</option>
                                                <option value="Escolar">Escolar</option>
                                                <option value="Medica">Medica</option>
                                                <option value="Familiar">Familiar</option>
                                                <option value="Otro">Otro</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class = "row">
                                        <div class = "col-sm-1"></div>
                                        <div class = "col-sm-4">
                                            <label>Descripcion</label>
                                            <textarea id="descripcion" name="descripcion" rows="2" class="form-control" required></textarea>
                                        </div>
                                        <div class = "col-sm-4">
                                            <label>Subir Archivo</label>
                                            <i class="fa fa-file" aria-hidden="true"></i>
                                            <div id="fileContainer">
                                                <input type="file" name="archivo[]" id="archivo" accept=".pdf,.jpg,.jpeg,.png" class="form-control">
                                            </div>
                                        </div>
                                    </div> 
                                    <br><hr>
                                    <div class = "row">
                                        <div class = "col-sm-4">
                                            <input id="accion" name="accion" type="hidden" value="nuevo">
                                        </div>
                                        <div class = "col-sm-4">
                                            <center>
                                                <button type="submit" class="btn btn-outline-success btn-sm">Confirmar</button>
                                            </center><br>
                                        </div>
                                    </div>
                                </form>    
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
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
    
    <script type="text/javascript">
        $(document).ready(function() {
        total_horas();
        });
    </script>
</html>