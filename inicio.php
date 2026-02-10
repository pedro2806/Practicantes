<?php
    session_start();
    include 'conn.php';
    if($_COOKIE['nombre'] == ''){
        echo $_COOKIE['nombre'];
        echo $_COOKIE['apellidos'];
        echo '<script>window.location.assign("index.php")</script>';
    }
?>
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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    
</head>
<body id = "page-top">
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
                <div class = "container-fluid">
                    <!-- Content Row -->
                    <div class = "row">
                        <div class = "col-xl-12 col-lg-6">
                            <center> 
                                <img class = "sidebar-card-illustration mb-2" src="/Practicantes/img/MESS_05_Imagotipo.svg" width = "35%"/>
                            </center>
                        </div>
                    </div>
                    <div class="container">
                        <?php
                        if ($_COOKIE['rol']== 2){
                        ?>
                        <center>
                        <h1>Registrar Tiempo</h1>
                        <button type="button" class="btn btn-sm btn-outline-success" id="toggleBtn">Confirmar Hora</button>
                        <div id="logs"></div>
                        </center>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- Modal De Actividades-->
                    <div id="modalActividades" name="modalActividades" class="modal fade" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Agregar Actividades</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar" onclick="cerrarModal()">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <input type='hidden' class='form-control input-sm' name='Itemstxt' id='Itemstxt' value ='0' />
                                    <div class="row" id="divtablaOVInfo">
                                            <table id="tablaOVItems" class="table table-hover table-bordered table-condenced table-sm sm-info"
                                                style="font-size:small">
                                                
                                                <thead id="divEncabezado">
                                                    <tr>                            
                                                        <th style="text-align: center; ">Actividad</th>
                                                        <th style="text-align: center; ">Duracion</th>                            
                                                    </tr>
                                                </thead>
                                                <tbody id="divItem">
                                                </tbody>
                                            </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-outline-warning" id="ConfirmarN" onClick= "creaItems()">Agregar</button>    
                                    <button type="button" class="btn btn-sm btn-outline-success" onClick= "RecorrerItems()">Confirmar</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class = "sticky-footer bg-white">
                <div class = "container my-auto">
                    <div class = "copyright text-center my-auto">
                        <span>Copyright &copy; MESS</span>
                    </div>
                </div>
                <a class = "scroll-to-top rounded" href = "#page-top">
                <i class = "fas fa-angle-up"></i>
                </a>
            </footer>
        </div>
    </div>
    <!--SCRIPT PARA LA TABLA-->
    <script type="text/template" data-template="itemOV">
        <tr class="" id="${idTpl}">                        
            <td align='center'>
                <input type='text' class='form-control input-sm' name='${item1}' id='${item1}'/>
            </td>
            <td align='center'>
                <input type='text' class='form-control input-sm' name='${item2}' id='${item2}'/>
            </td>            
        </tr>
    </script>
    
    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src = "vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src = "vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src = "js/sb-admin-2.min.js"></script>

<script  type="text/javascript">
window.itemId = 0;
    $(document).ready(function (){
        total_horas();
        updateChequeoUI();
    });

    <?php
        $id_usuario = $_COOKIE['id_usuario'] ?? 0;
        $UltimoMovimiento = null;
        $QUsuarios2 = "SELECT movimiento FROM checador WHERE id_usuario = $id_usuario ORDER BY fecha DESC LIMIT 1";
        $res = $conn->query($QUsuarios2);
        if ($res) {
            while ($row = $res->fetch_assoc()) {
                $UltimoMovimiento = $row["movimiento"];
            }
        }
        $nr2 = $res ? mysqli_num_rows($res) : 0;
        $initialIsCheckIn = ($nr2 >= 1 && $UltimoMovimiento === "entrada") ? 'true' : 'false';
    ?>

    const toggleBtn = document.getElementById('toggleBtn');
    const logs = document.getElementById('logs');
    let isCheckIn = <?php echo $initialIsCheckIn; ?>;
    const id_usuario = <?php echo (int) $id_usuario; ?>;

    function updateChequeoUI() {
        if (!toggleBtn) {
            return;
        }
        toggleBtn.textContent = isCheckIn ? 'Registrar salida' : 'Registrar entrada';
    }

    document.addEventListener('DOMContentLoaded', () => {
        if (!toggleBtn) {
            return;
        }

        toggleBtn.addEventListener('click', () => {
            const now = new Date();
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');

            const formattedDate = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
            const timeString = now.toLocaleTimeString();
            const logEntry = document.createElement('p');
            const movimiento = isCheckIn ? 'salida' : 'entrada';

            logEntry.textContent = `${movimiento === 'salida' ? 'Salida' : 'Entrada'}: ${timeString}`;
            if (logs) {
                logs.appendChild(logEntry);
            }

            // Enviar los datos al servidor usando AJAX
            $.ajax({
                url: 'acciones_practicas.php',
                type: 'POST',
                datatype: 'json',
                data: {
                    accion: 'chequeo',
                    fRegistro: formattedDate,
                    usuario: id_usuario
                },
                success: function(response) {
                    actividades(movimiento);
                    isCheckIn = !isCheckIn;
                    updateChequeoUI();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    swal("¡Algo salio mal!", "Intenta de nuevo", "error");
                }
            });
        });
    });
    
    //ESTA FUNCION CREA LOS ITEMS
    var creaItems = function() {
        cuantosItems = parseInt($('#Itemstxt').val());
        var items = createItems(1, 'local', 'Ent', 'item', cuantosItems);
        renderItems(items);
    };
    
    // Esta funcion nos permite crear tantos items tenga la OV
    function createItems(idsItem, source, flag, pref, cuantosItems) {
        
        var items = [];
        if (source == 'local') {
            var totalItems = 1;
            idsItem = [];
            var newItemId = window.itemId + 1;
            idsItem.push(newItemId);
        }
        if ((source == 'remote') || (source == 'local' && totalItems > 0)) {
            $.each(idsItem, function(key, i) {
                var item = {};
                item['f'] = flag + '_' + source + '_' + i;
                for (var j = 1; j <= 2; j++) {
                    item[pref + j] = pref + j + '_' + i;
                }
                items.push(item);
                window.itemId = i > window.itemId ? i : window.itemId;
                
                cuantosItems = parseInt(cuantosItems) + parseInt(1);
                console.log("crea nuevo item: - " + cuantosItems + '         - Total items:  - '+ totalItems+ '    i= '+i);
                $('#Itemstxt').val(cuantosItems);
            });
        }
        return items;
    }
    
    // Funcion para renderizar el template para cada una de las actividades
    function renderItems(items) {
        var itemTpl = $('script[data-template="itemOV"]').text().split(/\$\{(.+?)\}/g);
    
        $('#divItem').append(items.map(function(item) {
            return itemTpl.map(render(item)).join('');
        }));
    }
    
    // Esta funcion nos permite poner los tokens respectivos en el template
    function render(props) {
        return function(tok, i) {
            return (i % 2) ? props[tok] : tok;
        };
    }
    
    // Funcion para recorrer los Items
    function RecorrerItems() {
        var cuantosItems = $('#Itemstxt').val();
        
        for (var j = 1; j <= cuantosItems; j++) {
            actividad = $('#item1_'+ j).val();
            duracion = $('#item2_'+ j).val();
            
            $.ajax({
                url: 'acciones_practicas.php', 
                type: 'POST',
                data: {
                    accion: 'guardar_actividad',
                    actividad, duracion
                },
                success: function(response) {
                    Swal.fire({
                        title: '¡Éxito!',
                        text: 'Datos enviados correctamente.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    });
                    
                    // Limpiar el formulario o realizar otras acciones necesarias
                    $('#modalActividades').modal('hide');
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: '¡Error!',
                        text: 'No se pudo enviar los datos.',
                        icon: 'error',
                        confirmButtonText: 'Confirmar'
                    });
                }
            });
        }
    }
       
    //BOTON DE PRUEBA MODAL
    function actividadesPrueba(){
        $('#modalActividades').modal('show');
    }
    
    //Función para abrir el modal
    function actividades(movimiento) {
        if (movimiento === "salida"){
            var modal = document.getElementById("modalActividades");
            modal.style.display = "block";
            $('#modalActividades').modal('show');
            $('#divItem').empty();
            $('#Itemstxt').val('0');
            window.itemId = 0;
            creaItems();
        } 
    }
    
    //Función para cerrar el modal
    function cerrarModal() {
        $('#modalActividades').modal('hide');
    }
    
    //Limpiar formulario
    function limpiarFormulario() {
            document.getElementById("ov").value = "";
            document.getElementById("ot").value = "";
            document.getElementById("area").selectedIndex = 0;
            document.getElementById("tipo_servicio").selectedIndex = 0; 
            document.getElementById("comentarios").value = "";
            document.getElementById("coordenadas").value = "";
        }
</script>
</body>
</html>