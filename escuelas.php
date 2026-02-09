<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
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
<body id="page-top">
    <div id="wrapper">
        <?php
        session_start();
        include 'menu.php';
        ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php
                include 'conn.php';
                include 'encabezado.php';
                ?>
                <div class="container-fluid">
                    <!--BOTON AGREGAR ESCUELA-->
                    <div class = "row">
                        <div class="btn" role="group">
                            <button id="btnAgregar" name="btnAgregar" type="button" class="btn btn-sm btn-outline-success" onclick="showModalAgregar()">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                <i>Agregar Escuela</i> 
                            </button>
                        </div>
                    </div>
                    
                    <!--TABLA ESCUELAS ALTA-->
                    <div class = "d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class = "h3 mb-0 text-gray-800">Escuelas Activas</h1>                        
                    </div>
                    <div class = "card shadow mb-2">
                        <div  class ="col-sm-12">
                            <table id="escuelas" class="display responsive table table-striped table-hover table-sm"><br>
                            <thead>
                                <tr class="table-info">
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Dirección</th>
                                    <th>Maestro Responsable</th>
                                    <th>Tel. Escuela</th>
                                    <th>Correo Escuela</th>
                                    <th>Hrs. Requeridas</th>
                                    <th>Editar Esc.</th>
                                    <th>Dar Baja Esc.</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                        </div>
                    </div><br>

                    <!--TABLA ESCUELAS BAJA-->
                    <div class = "d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class = "h3 mb-0 text-gray-800">Escuelas Inactivas</h1>                        
                    </div>
                    <div class = "card shadow mb-2">
                        <div  class ="col-sm-12">
                            <table id="escuelas_baja" class="display responsive table table-striped table-hover table-sm"><br>
                            <thead>
                                <tr class="table-info">
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Dirección</th>
                                    <th>Maestro Responsable</th>
                                    <th>Tel. Escuela</th>
                                    <th>Correo Escuela</th>
                                    <th>Hrs. Requeridas</th>
                                    <th>Editar Esc.</th>
                                    <th>Dar Alta Esc.</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
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
</body>

    <!-- Modal para Agregar Escuela -->
    <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="modalAgregar">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registrar Escuela</h5>
                </div>
                <div class="modal-body">
                    <form method="post"><br>
                        <div class = "row">
                            <div class = "col-sm-3">
                                <label for="nombre_esc">Nombre de la Escuela</label>
                                <input type="text" id="nombre_esc" name="nombre_esc" class="form-control" maxlength= "50" required>
                            </div>
                            <div class = "col-sm-3">
                                <label for="direccion">Dirección</label>
                                <input type="text" id="direccion" name="direccion" class="form-control" maxlength= "110" required>
                            </div>
                            <div class = "col-sm-3">
                                <label for="correo_esc">Correo</label>
                                <input type="text" id="correo_esc" name="correo_esc" class="form-control" maxlength= "50" required>
                            </div><br>
                        </div>
                        <div class = "row">
                            <div class = "col-sm-2">
                                <label for="maestro">Maestro</label>
                                <input type="text" id="maestro" name="maestro" class="form-control" maxlength= "50" required>
                            </div>
                            <div class = "col-sm-2">
                                <label for="tel_escuela">Telefono</label>
                                <input type="phone" id="tel_escuela" name="tel_escuela" class="form-control" maxlength= "12" required>
                            </div>
                            <div class = "col-sm-2">
                                <label for="hrs_requeridas">Horas Requeridas</label>
                                <input type="numeric" id="hrs_requeridas" name="hrs_requeridas" class="form-control" maxlength= "3" required>
                            </div>
                        </div><br><br>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-outline-success" onclick="AgregarEsc()">Confirmar</button>
                    </div>
                </div>
            </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- Incluir Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
    $(document).ready(function () {
        $('#escuelas').DataTable();
        $('#escuelas_baja').DataTable();
        TablaEscAct();
        TablaEscBaja();
    });
    
    //MOSTRAR MODAL
    function showModalAgregar(){
            var myModal = new bootstrap.Modal(document.getElementById('modalAgregar'));
            myModal.show();
    }
    
    //Agregar Escuela
    function AgregarEsc(){
        var nombre_esc = $('#nombre_esc').val();
        var direccion = $('#direccion').val();
        var maestro = $('#maestro').val();
        var tel_escuela = $('#tel_escuela').val();
        var correo_esc = $('#correo_esc').val();
        var hrs_requeridas = $('#hrs_requeridas').val();
        var accion = "AgregarEsc";
        
        $.ajax({
            url: 'acciones_escuela.php',
            method: 'POST',
            async: false,
            dataType: 'json',
            data:{nombre_esc, direccion, maestro, tel_escuela, correo_esc, hrs_requeridas, accion},
            success: function() {
                swal.fire("Se registro la escuela","","success");
                window.location.assign("escuelas.php");
                TablaEscAct();
                TablaEscBaja();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                swal.fire("Algo Salio Mal!", "Intenta de Nuevo", "error");
            }
        });  
    }
    
    //Llenar Tabla Escuelas Activas
    function TablaEscAct(){
        
        $.ajax({
            url: 'acciones_escuela.php',
            type: 'POST',
            data: { accion: 'TablaEscAct'  },
            dataType: 'json', 
            success: function(respuesta) {
                var registros = respuesta.data;
                
                var table = $('#escuelas').DataTable();
                table.clear().draw();
                
                    respuesta.forEach(function(Registro) {
                        
                        Boton_Edit = 
                            `<a href='modificar_escuela.php?id_escuela=${Registro.id_esc}' class='btn btn-outline-primary'><i class='fas fa-fw fa-pen'></i>`;
                             
                        Boton_B =
                            `<button type='submit' class='btn btn-sm btn-outline-danger' onclick="baja_estatus('${Registro.id_esc}')"> <i class='fas fa-fw fa-trash'></i></button>`;

                        table.row.add([
                            Registro.id_esc,
                            Registro.nombre_esc, 
                            Registro.direccion,
                            Registro.maestro,
                            Registro.tel_esc,
                            Registro.correo,
                            Registro.hrs_req,
                            Boton_Edit,
                            Boton_B,
                        ]).draw(false);
                    });  
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                  icon: "warning",
                  text: "!No se pudieron cargar las escuelas!",
                });
            }
        });
    }
    
    //Llenar Tabla Escuelas Baja
    function TablaEscBaja(){
        
        $.ajax({
            url: 'acciones_escuela.php',
            type: 'POST',
            data: { accion: 'TablaEscBaja'  },
            dataType: 'json', 
            success: function(respuesta) {
                var registros = respuesta.data;
                
                var table = $('#escuelas_baja').DataTable();
                table.clear().draw();
                
                    respuesta.forEach(function(Registro) {
                        
                        Boton_Edit = 
                            `<a href='modificar_escuela.php?id_escuela=${Registro.id_esc}' class='btn btn-outline-primary'><i class='fas fa-fw fa-pen'></i>`;
                             
                        Boton_B =
                            `<button type='submit' class='btn btn-sm btn-outline-danger' onclick="alta_estatus('${Registro.id_esc}')"> <i class='fas fa-fw fa-trash'></i></button>`;

                        table.row.add([
                            Registro.id_esc,
                            Registro.nombre_esc, 
                            Registro.direccion,
                            Registro.maestro,
                            Registro.tel_esc,
                            Registro.correo,
                            Registro.hrs_req,
                            Boton_Edit,
                            Boton_B,
                        ]).draw(false);
                    });  
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                  icon: "warning",
                  text: "!No se pudieron cargar las escuelas!",
                });
            }
        });
    }
    
    //Dar de baja Escuela
    function baja_estatus(id_esc){
        
        $.ajax({
            url: 'acciones_escuela.php',
            type: 'POST',
            data: { accion: 'baja_estatus', id_escuela: id_esc },
            dataType: 'json',
            async: false,
            success: function(respuesta) {
                if (respuesta.success) {
                    Swal.fire({
                        icon: "success",
                        text: "Se dio de baja la escuela.",
                    });
                    TablaEscAct(); 
                    TablaEscBaja();
                } else {
                    Swal.fire({
                        icon: "error",
                        text: "No se pudo dar de baja la escuela.",
                    });
                }
            },
        });  
    }
    
    //Dar de Alta Escuela
    function alta_estatus(id_esc){
        
        $.ajax({
            url: 'acciones_escuela.php',
            type: 'POST',
            data: { accion: 'alta_estatus', id_escuela: id_esc },
            dataType: 'json',
            async: false,
            success: function(respuesta) {
                if (respuesta.success) {
                    Swal.fire({
                        icon: "success",
                        text: "Se dio de alta la escuela.",
                    });
                    TablaEscAct(); 
                    TablaEscBaja(); 
                    
                } else {
                    Swal.fire({
                        icon: "error",
                        text: "No se pudo dar de alta la escuela.",
                    });
                }
            },
        });  
    }
    
</script>
</html>