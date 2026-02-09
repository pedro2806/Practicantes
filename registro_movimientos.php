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
    <link href = "css/sb-admin-2.min.css" rel = "stylesheet">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js" defer="defer"></script>
    <link href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
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
                    include 'encabezado.php';
                ?>
                <!-- Begin Page Content -->
                <div class = "container-fluid">
                    <div class="container">
                    <h1>Entradas y Salidas</h1>
                    <br>
                        <table id= "Horas" name="Horas"class="table">
                            <thead>
                                <tr>
                                    <th>Hora de Entrada</th>
                                    <th>Hora de Salida</th>
                                    <th>Usuario</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
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
    <!-- Core plugin JavaScript-->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    
    <!--Para utilizar Moment.js-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>-->
    
    
    <script src = "vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src = "vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src = "js/sb-admin-2.min.js"></script>
    
    <script>
    
    $(document).ready(function () {
        //Aplica la libreria a la tabla
        llenaTablaHoras();
        total_horas();
        
        $('#Horas').DataTable({
            /*columnDefs: [
            {
                targets: 0,  // Índice de la columna que tiene las fechas
                visible: false,  // Muestra la columna sólo si lo necesitas, pero puede seguir ordenando
                render: function (data, type, row) {
                    if (type === 'display' || type === 'filter') {
                        // Parsear la fecha
                        var date = new Date(data);
                         var formattedDate = ('0' + date.getDate()).slice(-2) + '/' +
                        ('0' + (date.getMonth() + 1)).slice(-2) + '/' +
                        date.getFullYear() + ' ' + 
                        ('0' + date.getHours()).slice(-2) + ':' +
                        ('0' + date.getMinutes()).slice(-2);
                        
                        return formattedDate;
                    } else if (type === 'sort') {
                        // Usar moment.js para convertir correctamente a un formato ISO para ordenar
                        return moment(data, 'DD/MM/YYYY HH:mm').toISOString();
                    }
                    
                    return data;
                }
            }
        ]  */  
        });
        
    });
    
    function llenaTablaHoras() {
        var id_usuario = <?php echo $_COOKIE['id_usuario']; ?>;
            $.ajax({
                url: 'acciones_practicas.php',
                type: 'POST',
                data: { accion: 'llenaTablaHorario',
                        usuario: id_usuario
                      },
                dataType: 'json', //TIPO DE DATO JSON
                success: function(registros) {
                    
                    var table = $('#Horas').DataTable();
                    
                    table.clear().draw();
                    
                    registros.forEach(function(Registro) { //EL valor que se recibe
                        table.row.add([
                            //Registro.fecha,
                            Registro.primera_entrada,
                            Registro.ultima_salida,
                            Registro.nombre
                            ]).draw(false);
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    //console.error('Error al obtener los registros:', textStatus, errorThrown);
                }
            });
    }
    
    </script>
</body>
</html>