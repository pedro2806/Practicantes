<!DOCTYPE html>
<html lang = "sp">
<head>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE = edge">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1, shrink-to-fit = no">
    <title>MESS PRACTICANTES</title>
    
    <!-- Custom fonts for this template-->
    <link href = "vendor/fontawesome-free/css/all.min.css" rel = "stylesheet" type = "text/css">
    
    <!-- Custom styles for this template-->
    <link href = "css/sb-admin-2.min.css" rel = "stylesheet">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Incluir Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    
</head>

<body id = "page-top">
    <!-- Modal para Aprobado -->
    <div class="modal fade" id="modalSuccess" name="modalSuccess" tabindex="-1" aria-labelledby="modalSuccessLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="hidden" id="id_just" name="id_just">
                    <h5 class="modal-title" id="modalSuccessLabel">Aprobado.</h5>
                </div>
                <div class="modal-body">
                    <label for="comentarios">Comentarios:</label>
                    <textarea id="comentarios" name="comentarios" rows="2" class="form-control" required=""></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success btn-sm" onclick="respuestaJust('Aprobado')">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal para Denegado -->
    <div class="modal fade" id="modalDanger" name="modalDanger" tabindex="-1" aria-labelledby="modalDangerLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="hidden" id="id_just" name="id_just">
                    <h5 class="modal-title" id="modalDangerLabel">Denegado.</h5>
                </div>
                <div class="modal-body">
                    <label for="comentarios">Comentarios:</label>
                    <textarea id="comentariosD" name="comentariosD" rows="2" class="form-control" required=""></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success btn-sm" onclick="respuestaJust('Denegado')">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
        
    <!-- Page Wrapper -->
    <div id = "wrapper">
        <?php
            include 'menu.php';
        ?>
        <!-- Content Wrapper -->
        <div id = "content-wrapper" class = "d-flex flex-column">
            <!-- Main Content -->
            <div id = "content">
                <?php
                    include 'encabezado.php';
                ?>
                <!-- Begin Page Content -->
                <div class = "container-fluid">
                    <!-- Page Heading -->
                    <div class = "d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class = "h3 mb-0 text-gray-800">Mis Justificantes</h1>                        
                    </div>
                    <div class = "row">
                        <div class = "card shadow mb-2">
                            <div  class ="col-sm-12">                    
                                <table id ="mis_just" name ="mis_just" class="display responsive table table-striped table-hover table-sm">
                                    <thead>
                                        <br>
                                        <tr class="table-primary">
                                            <th>Usuario</th>
                                            <th>Fecha de Solicitud</th>
                                            <th>Tipo</th>
                                            <th>Periodo</th>
                                            <!--<th>Días</th>-->
                                            <th>Descripcion</th>
                                            <th>Estatus</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- Footer -->
                <footer class = "sticky-footer bg-white">
                    <div class = "container my-auto">
                        <div class = "copyright text-center my-auto">
                            <span>Copyright &copy; MESS 2024</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
                </div>
            </div>
            <!-- Scroll to Top Button-->
            <a class = "scroll-to-top rounded" href = "#page-top">
                <i class = "fas fa-angle-up"></i>
            </a>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src = "vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src = "vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src = "js/sb-admin-2.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js" defer="defer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script  type = "module"  src = " https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js "></script> 
    <script nomodule  src  = " https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js "></script>
    <!-- Incluir Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
    $(document).ready(function () {
        total_horas();
        tablaMisJust();
        $('#mis_just').DataTable();
    });
    
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
    
    //Guardar respuesta
    function respuestaJust(estatus){
        
        //OBTENEMOS VALOR SELECT
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
                Swal.fire({
                    title: "Se registró su respuesta",
                    icon: "success",
                });
                tablaMisJust();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                swal.fire("Algo Salio Mal!", "Intenta de Nuevo", "error");
            }
        });  
    }
    
    //Funcion para llenar la tabla mis justificantes
    function tablaMisJust(){
        rolUsuario = <?php echo $_COOKIE["rol"]; ?>;
        
        $.ajax({
            url: 'acciones_mis_justificantes.php',
            type: 'POST',
            data: { accion: 'llenaTablaMisJust'  },
            dataType: 'json', 
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            success: function(respuesta) {
                var registros = respuesta.data;
                
                var table = $('#mis_just').DataTable();
                table.clear().draw();
                
                    respuesta.forEach(function(Registro) {
                        
                        var periodo = contarDiasHabiles(Registro.fecha_inicio, Registro.fecha_fin);
                        
                        if (Registro.estatus === 'Pendiente') {
                            Botones = 
                                `<a class="btn btn-sm btn-outline-warning" href="ver_just.php?id=${Registro.id}"><i class="fas fa-fw fa-eye"></i></a>`;
                            
                            // Validacion para no mostrar botones si es rol 2
                            if (rolUsuario !== 2) {
                                Botones = 
                                `<button id="btnAprobar" name="btnAprobar" type="button" class="btn btn-sm btn-outline-success" onclick="showModalA('success', '${Registro.id}')"><ion-icon name="checkmark-outline"></ion-icon></button>
                                 <button id="btnNegar" name="btnNegar" type="button" class="btn btn-sm btn-outline-danger" onclick="showModalA('danger', '${Registro.id}')"><ion-icon name="close-outline"></ion-icon></button>
                                 <a class="btn btn-sm btn-outline-warning" href="ver_just.php?id=${Registro.id}&estatus=${Registro.estatus}"><i class="fas fa-fw fa-eye"></i></a>`;
                            }
                        } else {
                            Botones = 
                                `<a class="btn btn-sm btn-outline-info" href="ver_just.php?id=${Registro.id}"><i class="fas fa-fw fa-eye"></i></a>`;
                        }
                        
                        table.row.add([
                            Registro.usuario,
                            Registro.fecha_solicitud, 
                            Registro.tipo,
                            periodo,
                            Registro.descripcion,
                            Registro.estatus,
                            Botones,
                            
                        ]).draw(false);
                    });  
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                  icon: "warning",
                  text: "!No se pudieron cargar los registros!",
                });
            }
        });
    }
    
    //Funcion con PHP para contar días
    function contarDiasHabiles(fecha_inicio, fecha_fin) {
        // Convertir las fechas a objetos Date
        inicio = new Date(fecha_inicio);
        fin = new Date(fecha_fin);
        
        // Si la fecha de inicio es mayor a la de fin, intercambiarlas
        if (inicio > fin) {
            [inicio, fin] = [fin, inicio];
        }
        
        // Contador de días hábiles
        diasHabiles = 0;
        
        // Iterar sobre el rango de fechas
        while (inicio <= fin) {
            // Verificar si el día actual no es sábado (6) ni domingo (0)
            const diaSemana = inicio.getDay(); // getDay() devuelve el número del día de la semana (0 = domingo, ..., 6 = sábado)
            if (diaSemana !== 0 && diaSemana !== 6) {
                diasHabiles++;
            }
            // Avanzar un día
            inicio.setDate(inicio.getDate() + 1);
        }
        return diasHabiles;
    }
    
    </script>
</body>
</html>