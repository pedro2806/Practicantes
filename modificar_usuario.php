<!DOCTYPE html>
<html lang="sp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MESS PRACTICANTES</title>

    <link href = "vendor/fontawesome-free/css/all.min.css" rel = "stylesheet" type = "text/css">
    <link href = "css/sb-admin-2.min.css" rel = "stylesheet">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js" defer="defer"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
        session_start();
        include 'conn.php';
        include 'menu.php';
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
            
                <?php 
                    include 'encabezado.php';
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>                        
                    </div>
                    <!-- Tabla Usuarios -->
                    <div class="row">
                        <div class = "card shadow mb-2">
                            <table id="usuarios" name="usuarios" class="display responsive table table-striped table-hover table-sm"><br>
                                <thead>
                                    <tr class="table-info">
                                        <th>Nombre (s)</th>
                                        <th>Apellidos</th>
                                        <th>Área</th>
                                        <th>Escuela</th>
                                        <th>Correo</th>
                                        <th>Telefono</th>
                                        <th>Tiempo Cumplido</th>
                                        <th>Detalles Horas</th>
                                        <th>Editar Usuario</th>
                                        <th>Eliminar Usuario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div><br><br>   
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
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modificar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> 
                    <!-- Formulario -->
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-3">
                            <input type="hidden" id="accion" name="accion" value="modificar_us">
                            <input type="hidden" id="id_usuario" name="id_usuario" value="">
                            
                            <label for="nombre_us">Usuario:</label><br>
                            <input type="text" name="nombre" id="nombre" value="" required class="form-control">
                        </div>
                        <div class="col-sm-3">
                            <label for="apellidos">Apellidos:</label><br>
                            <input type="text" name="apellidos" id="apellidos" required class="form-control">
                        </div>
                        <div class="col-sm-3">
                            <label for="telefono">Telefono:</label><br>
                            <input name="telefono" id="telefono" required class="form-control">
                        </div>
                    </div> <br>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-3">
                            <label for="id_escuela">Escuela:</label><br>
                            <select id="id_escuela" name="id_escuela" class="form-select">
                                <option value="">Selecciona...</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="correo">Correo:</label><br>
                            <input name="correo" id="correo" required class="form-control">
                        </div>
                    </div>
                    <br><hr><br>
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-3">
                            <label for="id_area">Área</label><br>
                            <select id="id_area" name="id_area" class="form-select">
                                <option value="">Selecciona...</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="id_jefe">Jefe:</label><br>
                            <select id="id_jefe" name="id_jefe" class="form-select" required>
                                <option value="">Selecciona...</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="fin_periodo">Fin Periodo</label><br>
                            <input type="date" name="fin_periodo" id="fin_periodo" required class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-center"><br>
                            <button type="button" name="submit" class="btn btn-sm btn-outline-success" onClick="GuardarCambios()">Confirmar</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
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
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
	<!-- Incluir Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Incluir Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function () {
            InfoUs();
            $('#staticBackdrop2').on('shown.bs.modal', function () {
                var selects = $('#id_area, #id_escuela, #id_jefe');
                selects.each(function () {
                    if ($(this).data('select2')) {
                        $(this).select2('destroy');
                    }
                });
                selects.select2({
                    width: '100%',
                    dropdownParent: $('#staticBackdrop2')
                });
            });
        });
        
        //Guardar cambios usuario
        function GuardarCambios(){
            var usuario = $('#id_usuario').val();
            var nombre = $('#nombre').val();
            var apellidos = $('#apellidos').val();
            var id_area = $('#id_area').val();
            var id_escuela = $('#id_escuela').val();
            var id_jefe = $('#id_jefe').val();
            var correo = $('#correo').val();
            var telefono = $('#telefono').val();
            var accion = "guardarC";
            
            $.ajax({
                url: 'acciones_usuario.php',
                method: 'POST',
                //async: false,
                dataType: 'json',
                data:{usuario, nombre, apellidos, id_area, id_escuela, id_jefe, correo, telefono, accion},
                success: function() {
                    swal.fire("Se aplicaron los cambios","","success");
                    InfoUs()
                    $('#staticBackdrop2').modal('hide');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    swal.fire("Algo Salio Mal!", "Intenta de Nuevo", "error");
                }
            });
           
        }
        
        //Llenar Tabla Usuario
        function InfoUs(){
            $.ajax({
                url: 'acciones_usuario.php',
                type: 'POST',
                data: { accion: 'LlenarTablaUs'},
                dataType: 'json',
                success: function(registros) {
                    var table = $('#usuarios').DataTable();
                    table.clear().draw();
                    
                    registros.forEach(function(Registro) {
                        botonVer =
                    `<a class="btn btn-sm btn-outline-warning" href="detalles_horas.php?id=${Registro.id_usuario}"><i class="fas fa-fw fa-eye"></i></a>`;
                        botonEdit = 
                    `<button type='button' class='btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#staticBackdrop2' id= 'ModalModificar_us' onclick="LlenarModal('${Registro.id_usuario}')"><i class='fas fa-fw fa-pen'></i></button>`;
                        botonElim =
                    `<button type='button' class='btn btn-sm btn-outline-danger' onClick = "baja_usuario('${Registro.id_usuario}')"><i class = 'fas fa-fw fa-trash'></i></button>`;
                     
                        table.row.add([
                            Registro.nombre,
                            Registro.apellidos,
                            Registro.id_area,
                            Registro.id_escuela,
                            Registro.correo,
                            Registro.telefono,
                            Registro.hrs_completas,
                            botonVer,
                            botonEdit,
                            botonElim,
                        ]).draw(false);
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        icon: "error",
                        text: "No se pudieron obtener los datos.",
                    });
                }
            });
        }
        
        //Borrar Usuario
        function baja_usuario(id_usuario){
            Swal.fire({
              title: "¿Estas seguro de eliminar este usuario?",
              text: "¡No podras deshacer el cambio!",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Confirmar"
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                    url: 'acciones_usuario.php',
                    type: 'POST',
                    data: { accion: 'baja_usuario', usuario: id_usuario },
                    dataType: 'json',
                    async: false,
                    success: function(respuesta) {
                        InfoUs()
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                            icon: "error",
                            text: "No se pudo dar de baja al usuario.",
                        });
                    }
                });
                Swal.fire({
                  title: "¡Usuario Eliminado!",
                  text: "Se elimino correctamente.",
                  icon: "success"
                });
              }
            }); 
        }
        
        //Modificar Usuario
        function LlenarModal(id_usuario){
            $.ajax({
                url: 'acciones_usuario.php',
                type: 'POST',
                data: { accion: 'LlenarModal', usuario: id_usuario},
                dataType: 'json',
                success: function(registros) {
                    
                    registros.forEach(function(Registro) {
                        $('#id_usuario').val(Registro.id_usuario);
                        $('#nombre').val(Registro.nombre);
                        $('#apellidos').val(Registro.apellidos);
                        $('#correo').val(Registro.correo);
                        $('#telefono').val(Registro.telefono);
                        $('#fin_periodo').val(Registro.fin_periodo || '');
                        cargarArea(Registro.id_area);
                        cargarEscuela(Registro.id_escuela);
                        cargarJefe(Registro.id_jefe);
                    });
                    InfoUs()
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('Error al obtener los datos:');
                }
            });
        }
        
        //Cargar Areas  
        function cargarArea(selectedId){
            accion = "cargarArea";
            
            $.ajax({
                url: 'acciones_usuario.php',
                method: 'POST',
                dataType: 'json', 
                data: {accion},
                success: function(response) {
                   var area = $('#id_area');
                   area.empty().append('<option value="">Selecciona...</option>');
                   
                    response.forEach(function(Registro) {
                        var option = $('<option></option>').attr('value', Registro.id_area).text(Registro.AREA);
                        area.append(option);
                   });
                   if (selectedId) {
                        area.val(String(selectedId));
                   }
                },
                error: function(xhr, status, error) {
                    console.error('Error al cargar las áreas:', error);
                }
            });
        }
        
        //Cargar Escuelas   
        function cargarEscuela(selectedId){
            accion = "cargarEsc";
            
            $.ajax({
                url: 'acciones_usuario.php',
                method: 'POST',
                dataType: 'json', 
                data: {accion},
                success: function(response) {
                    var escuelas = $('#id_escuela');
                    escuelas.empty().append('<option value="">Selecciona...</option>');
                   
                    response.forEach(function(Registro) {
                        var option = $('<option></option>').attr('value', Registro.id_escuela).text(Registro.nombre_esc);
                        escuelas.append(option);
                    });
                    if (selectedId) {
                        escuelas.val(String(selectedId));
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error al cargar las escuelas:', error);
                }
            });  
        }

        //Cargar Jefes
        function cargarJefe(selectedId){
            accion = "cargarJefe";

            $.ajax({
                url: 'acciones_usuario.php',
                method: 'POST',
                dataType: 'json',
                data: {accion},
                success: function(response) {
                    var jefe = $('#id_jefe');
                    jefe.empty().append('<option value="">Selecciona...</option>');

                    response.forEach(function(Registro) {
                        var option = $('<option></option>').attr('value', Registro.id_usuario).text(Registro.nombre);
                        jefe.append(option);
                    });
                    if (selectedId) {
                        jefe.val(String(selectedId));
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error al cargar los jefes:', error);
                }
            });
        }
    </script>
</body>
</html>