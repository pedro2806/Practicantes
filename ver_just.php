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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js" defer="defer"></script>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script  type = "module"  src = " https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js "></script>  
    <script nomodule  src  = " https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js " > </script>
    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
            </div>
            <div class = "card-body">
                <div class = "row">
                    <div  class ="col-sm-5">
                        <h2>Detalle del Justificante</h2>
                        <br>
                            <table id= "Ver_detalles" name ="Ver_detalles" class="display responsive nowrap table table-striped table-hover table-sm">    
                                <tr>
                                    <th>Solicita:</th>
                                    <th id="solicita" class="fs-4 text-primary fw-bold"></th>
                                </tr>
                                <tr>
                                    <th>Fecha de Solicitud</th>
                                    <td><label id="fecha_solicitud" name"fecha_solicitud">  </label> </td>
                                </tr>
                                <tr>
                                    <th>Descripción</th>
                                    <td><label id="descripcion" name"descripcion" ></label></td>
                                </tr>
                                <tr>
                                    <th>Fecha de Inicio</th>
                                    <td>
                                        <label id="fecha_inicio" name"fecha_inicio">  </label> 
                                    </td>
                                </tr>
                                <tr>
                                    <th>Fecha de Fin</th>
                                    <td>
                                        <label id="fecha_fin" name"fecha_fin">  </label> 
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tipo</th>
                                    <td>
                                        <label id="tipo" name"tipo">  </label> 
                                    </td>
                                </tr>
                                <tr>
                                    <th>Estado</th>
                                    <td>
                                        <label id="estado" name"estado">  </label> 
                                    </td>
                                </tr>
                            </table>
                    </div>
                    <div  class ="col-sm-3">
                        <h2>Comentarios del Jefe</h2>
                        <br>
                        <table id="Ver_comentario"  name="Ver_comentario" class="display responsive nowrap table table-striped table-hover table-sm" accept-charset="UTF-8"> 
                            <tr>
                                <td>
                                    <label id="comentarios" name="comentarios">  </label>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--ARCHIVOS-->
                    <div  class ="col-sm-3">
                        <h2>Archivos</h2>
                        <br>
                        <table  class="display responsive nowrap table table-striped table-hover table-sm">
                            <tr>
                                <td>
                                    <?php
                                    // Obtener 'id' de forma segura desde GET
                                    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
                                
                                    // Definir directorio de carga
                                    $uploadDir = "Archivos/Justificantes/$id";
                                
                                    // Verificar si el directorio existe y obtener los archivos
                                    $files = is_dir($uploadDir) ? array_diff(scandir($uploadDir), ['.', '..']) : [];
                                
                                    if (!empty($files)): ?>
                                        <div class="file-gallery">
                                            <?php foreach ($files as $file): ?>
                                                <?php
                                                $fileExt = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                                $fileUrl = htmlspecialchars("$uploadDir/$file", ENT_QUOTES, 'UTF-8');
                                
                                                // Mostrar archivos permitidos
                                                if (in_array($fileExt, ['jpg', 'jpeg', 'png', 'pdf'])): ?>
                                                    <div class="file-item">
                                                        <a href="<?= $fileUrl ?>" target="_blank">
                                                            Ver archivo: <?= htmlspecialchars($file) ?>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php else: ?>
                                        <p>No se subió ningún archivo.</p>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!--BOTONES-->
                <div class = "row">
                    <div  class ="col-sm-12">
                    <br>
                    
                    <?php
                    $id_just = $_GET['id'];
                    $estatus = $_GET['estatus'];
                    
                    // CONDICIONES para mostrar los botones según el rol
                    if(($_COOKIE['rol']== '0' || $_COOKIE['rol']=='1') & $estatus == "Pendiente"){
                        //APROBADO
                        if ($estatus === 'Pendiente') {
                            echo '
                            <div class="btn-group" role="group"  style="gap: 10px;">
                                <button id="btnAprobar" name="btnAprobar" type="button" class="btn btn-outline-success btn-sm" onclick="showModalA('."'success'".','.$id_just.')">
                                    <ion-icon name="checkmark-outline"></ion-icon>
                                    <span>Aprobar</span> 
                                </button>
                                <button id="btnNegar" name="btnNegar" type="button" class="btn btn-outline-danger btn-sm" onclick="showModalA('."'danger'".','.$id_just.')">
                                    <ion-icon name="close-outline"></ion-icon>
                                    <span>Denegar</span> 
                                </button>
                            </div>';
                        }
                    } 
                    echo '</div>';
                    ?>
                    </div>
                <!-- Modal para Aprobado -->
                <div class="modal fade" id="modalSuccess" tabindex="-1" aria-labelledby="modalSuccessLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <input type="hidden" id="id_just" name="id_just">
                                <h5 class="modal-title" id="modalSuccessLabel">Aprobado</h5>
                            </div>
                            <div class="modal-body">
                                <label for="comentarios">Comentarios:</label>
                                <textarea id="comentarios" name="comentarios" rows="2" class="form-control" required accept-charset="UTF-8"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-success" onclick="respuestaJust('Aprobado')">Confirmar</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Modal para Denegado -->
                <div class="modal fade" id="modalDanger" tabindex="-1" aria-labelledby="modalDangerLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalDangerLabel">Denegado</h5>
                            </div>
                            <div class="modal-body">
                                <label for="comentarios">Comentarios:</label>
                                <textarea id="comentariosD" name="comentariosD" rows="2" class="form-control" required=""></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-success" onclick="respuestaJust('Denegado')">Confirmar</button>
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
    <script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js" defer="defer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
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
    
    <script type="text/javascript">
    
        $(document).ready(function () {
        total_horas();
        ver_just();
        });
        
        //MOSTRAR MODAL
        function showModalA(type, id) { 
            $('#id_just').val(id);
            if (type === 'success') {
                var myModal = new bootstrap.Modal(document.getElementById('modalSuccess'));
                myModal.show();
            } else if (type === 'danger') {
                var myModal = new bootstrap.Modal(document.getElementById('modalDanger'));
                myModal.show();
            }
        }
        
        //Llenar detalles
        function ver_just() {
            var id = new URLSearchParams(window.location.search).get('id');
            
            $.ajax({
                url: 'acciones_mis_justificantes.php',
                type: 'POST',
                data: { accion: 'llenaDatosJust', id_just: id },
                dataType: 'json',
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                success: function(respuesta) {
                    var registro = respuesta[0];
                    
                        //Al ser una tabla estatica y con un solo registro, se utiliza la siguiente sintax
                        $('#solicita').text(registro.nombre + ' ' + registro.apellidos);
                        $('#fecha_solicitud').text(respuesta[0].fecha_solicitud); //Toma directamente el valor del arreglo que devuelve el JSON
                        $('#descripcion').text(registro.descripcion);// Toma el valor del arreglo que se creo "respuesta[0]"
                        $('#fecha_inicio').text(registro.fecha_inicio);
                        $('#fecha_fin').text(registro.fecha_fin);
                        $('#tipo').text(registro.tipo);
                        $('#comentarios').text(registro.comentarios);
                        $('#estado').text(registro.estatus);    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("Error en la solicitud:", jqXHR.responseText);
                    Swal.fire({
                        icon: "error",
                        text: "Error al cargar los registros. Intenta nuevamente.",
                    });
                }
            });
        }
        
        //Guardar respuesta
        function respuestaJust(estatus){
            
            var comentarios = document.getElementById('comentarios').value;
            var comentariosD = document.getElementById('comentariosD').value;
            var accion = "respuestaJust";
            var id_just = $('#id_just').val();
            
            $.ajax({
                url: 'acciones_mis_justificantes.php', 
                method: 'POST',
                async: false,
                data:{estatus, comentarios, comentariosD, accion, id_just},
                success: function() {
                    swal.fire("Se registro su respuesta","","success");
                    ver_just();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    swal.fire("Algo Salio Mal!", "Intenta de Nuevo", "error");
                }
            });  
        }
    </script>
</body>
</html>