<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include 'conn.php';
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MESS PRACTICANTES</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
            include 'menu.php'; 
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php
                    include 'encabezado.php';
                ?>
            </div>
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!--TARJETA-->
                <div id ="Actividades" name ="Actividades" class="card shadow mb-0">
                    <div class="card border-left-primary shadow h-60 py-0">
                        <div class="card-header">
                            Detalles de Actividades
                        </div>
                        <div class="row">
                            <!-- TABLA DE Horas x Día -->
                            <div class="col-sm-6">
                                <table id="horasxdia" name="horasxdia" class="responsive table table-sm">
                                    <thead>
                                        <tr class="table-primary">
                                            <th>Id</th>
                                            <th style="width: 25%;">Fecha</th>
                                            <th style="width: 25%;">Total de Horas</th>
                                            <th style="width: 25%;">Ver Actividades</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <!-- TABLA DE ACTIVIDADES -->
                            <div class="col-sm-6">
                                <table id="DetallesAct" name="DetallesAct" class="responsive table table-sm">
                                    <thead>
                                        <tr class="table-primary">
                                            <th style="width: 25%;">Fecha</th>
                                            <th style="width: 25%;">Actividad</th>
                                            <th style="width: 25%;">Hora</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
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
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    
    <!-- Carga de jQuery (solo una vez) -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    
    <!-- Carga de Bootstrap (solo una vez) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    <!-- Carga de otros scripts (como sb-admin-2) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    
    <!-- Carga de DataTables -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    
    <!-- Carga de botones de DataTables (si los necesitas) -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    
    <!-- Carga de SweetAlert2 (si lo necesitas) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Carga del CSS de DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    
    <script type="text/javascript">
    
        $(document).ready(function () {
            
            $('#horasxdia').DataTable({
                "paging": true,
                "searching": true,
                "language": {
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ actividades",
                    "paginate": {
                        "previous": "Ant",
                        "next": "Sig"
                    }
                },
                columnDefs: [
                    {
                        targets: 0, // Índice de la columna que quieres ocultar (la primera columna tiene índice 0)
                        visible: true // Oculta la columna
                    }
                ]
            });
            $('#horasxdia').css('font-size', '11px');
            
            TablaAct();
            
            $('#DetallesAct').DataTable({
                "paging": true,
                "searching": false,
                "language": {
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ actividades",
                    "paginate": {
                        "previous": "Ant",
                        "next": "Sig"
                    }
                }
            });
            $('#DetallesAct').css('font-size', '11px');
        });
        
        //Llenar Tabla Horas X Día
        function TablaAct(){
            var usuario = getParameterByName('id');
            
            $.ajax({
                url: 'acciones_usuario.php',
                type: 'POST',
                data: { accion: 'LlenarTablaHorasxDia', usuario},
                dataType: 'json', 
                success: function(respuesta) {
                    var registros = respuesta.data;
                    
                    var table = $('#horasxdia').DataTable();
                    table.clear().draw();
                    
                        respuesta.forEach(function(Registro) {
                            var botonVer = 
                            `<button type='button' class='btn btn-sm btn-outline-warning' onclick="DetallesAct('${Registro.fecha}', '${Registro.id_usuario}')"> <i class='fas fa-fw fa-eye'></i></button>`;
                            
                            table.row.add([
                                Registro.id,
                                Registro.fecha,
                                Registro.total_hrs,
                                botonVer,
                            ]).draw(false);
                        });  
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                      icon: "warning",
                      text: "!No se pudieron cargar los registros del día!",
                    });
                }
            });
        }
        
        //Llenar Tabla Escuelas Activas
        function DetallesAct(fecha){
            var usuario = getParameterByName('id'); 
            
            $.ajax({
                url: 'acciones_usuario.php',
                type: 'POST',
                data: { accion: 'LlenarTablaAct', fecha, usuario},
                dataType: 'json', 
                success: function(respuesta) {
                    var registros = respuesta.data;
                    
                    var table = $('#DetallesAct').DataTable();
                    table.clear().draw();
                    
                        respuesta.forEach(function(Registro) {
                            
                            table.row.add([
                                Registro.fecha,
                                Registro.actividad,
                                Registro.duracion,
                            ]).draw(false);
                        });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                      icon: "warning",
                      text: "!No se pudieron cargar las actividades!",
                    });
                }
            });
        }
        
        //Obtener Id del URL
        function getParameterByName(name) {
            let url = new URL(window.location.href);
            return url.searchParams.get(name);
        }
    </script>
</body>
</html>