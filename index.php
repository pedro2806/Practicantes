<!DOCTYPE html>
<html lang = "sp">

<head>

    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE = edge">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1, shrink-to-fit = no">
    <meta name = "description" content = "">
    <meta name = "author" content = "">

    <title>MESS - PRACTICANTES</title>
    
    <!-- Custom fonts for this template-->
    <link href = "vendor/fontawesome-free/css/all.min.css" rel = "stylesheet" type = "text/css">

    <!-- Custom styles for this template-->
    <link href = "css/sb-admin-2.min.css" rel = "stylesheet">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js" defer="defer"></script>

    <!-- Custom styles for this template-->
    <link href = "css/sb-admin-2.min.css" rel = "stylesheet">
    <?php
        session_start();
        include 'conn.php';
    ?>
</head>

<body class = "bg-gradient-primary">
    <div class = "container">
        <!-- Outer Row -->
        <div class = "row justify-content-center">
            <div class = "col-xl-10 col-lg-12 col-md-9">
                <div class = "card o-hidden border-0 shadow-lg my-5">
                    <div class = "card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class = "row">
                            <div class = "col-sm-6 d-none d-sm-block bg-login-image">
                                <br>
                                <center>
                                    <b>
                                        MESS<br>
                                        PRACTICANTES
                                    </b>
                                </center>
                            </div>
                            <div class = "col-sm-6">
                                <div class = "p-5">
                                    <div class = "text-center">
                                        <h1 class = "h4 text-gray-900 mb-4">Bienvenid@</h1>
                                    </div>
                                    <br>
                                        <div class = "form-group">
                                            <input type="text" class="form-control form-control-user" id="Inputusuario" name="Inputusuario" placeholder="Usuario" required> 
                                        </div>
                                        <div class = "form-group">
                                            <input type = "password" class = "form-control form-control-user" id = "InputPassword" name = "InputPassword" placeholder = "Contrase&ntilde;a" required>
                                        </div>
                                        <div class = "form-group">
                                            <div class = "custom-control custom-checkbox small">
                                                <input type = "checkbox" class = "custom-control-input" id = "customCheck">
                                                <label class = "custom-control-label" for = "customCheck">Recordar usuario y contrase&ntilde;a</label>
                                            </div>
                                        </div>
                                        <center>
                                            <button class = "btn btn-primary" type = "button" id = "btningresar" name = "btningresar" onClick = "Inicio();">Acceder</button>                                      
                                        </center>
                                        <br>
                                        <hr>
                                    <div class = "text-center">
                                        <a class = "small" href = "forgot-password">Olvide mi contrase&ntilde;a</a>
                                    </div><hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
    <script src = "vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript
    <script src = "vendor/jquery-easing/jquery.easing.min.js"></script>-->
    <!-- Custom scripts for all pages-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--Encriptador MD5-->
    <!--<script src="md5.js"></script>-->
    
    <script>
        
        //Funcion para Iniciar sesion
        function Inicio(){
            
            //OBTENEMOS VALOR SELECT
            var usuarioA = $('#Inputusuario').val();
            var passwordA = $('#InputPassword').val();
            var accion = "InicioSesion";
           
            usuario = quitarPalabrasReservadasMySQL(usuarioA);
            password = quitarPalabrasReservadasMySQL(passwordA);
            
            if ((usuario == null || usuario === "") || (password == null || password === "")){
                swal.fire("!Verifica Usuario y Contraseña!", "No dejes ningun campo vacio.", "warning");
            }
            else{
                $.ajax({
                    url: 'acciones_login.php',
                    method: 'POST',
                    dataType: 'json',
                    data:{usuario, password, accion},
                    success: function(registros) {
                        swal.fire("!Acceso Concedido!", "Se accedio correctamente.", "success");
                        registro = registros[0];
                        
                        document.cookie = "usuario=" + registro.usuario + "; expires=" + new Date(Date.now() + 99900000).toUTCString() + "; SameSite=Lax;";
                        document.cookie = "apellidos=" + registro.apellidos + "; expires=" + new Date(Date.now() + 99900000).toUTCString() + "; SameSite=Lax;";
                        document.cookie = "nombre=" + registro.nombre + "; expires=" + new Date(Date.now() + 99900000).toUTCString() + "; SameSite=Lax;";
                        document.cookie = "rol=" + registro.rol + "; expires=" + new Date(Date.now() + 99900000).toUTCString() + "; SameSite=Lax;";
                        document.cookie = "id_usuario=" + registro.id_usuario + "; expires=" + new Date(Date.now() + 99900000).toUTCString() + "; SameSite=Lax;";
                        
                        window.location.assign("inicio.php")
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        swal.fire("Algo Salio Mal!", "Intenta de Nuevo", "error");
                    }
                }); 
            }
        }
        
        function quitarPalabrasReservadasMySQL(variable) {
            //Palabras reservadas de MySQL
            const palabrasReservadas = [
                'SELECT', 'FROM', 'WHERE', 'INSERT', 'UPDATE', 'DELETE', 'JOIN', 'INNER', 'LEFT', 
                'RIGHT', 'FULL', 'CREATE', 'TABLE', 'ALTER', 'DROP', 'TRUNCATE', 'INDEX', 'AND', 
                'OR', 'NOT', 'NULL', 'IN', 'BETWEEN', 'LIKE', 'HAVING', 'GROUP', 'ORDER', 'BY',
                'LIMIT', 'DISTINCT', 'AS', 'UNION', 'ALL', 'IF', 'EXISTS', 'PRIMARY', 'KEY', 
                'FOREIGN', 'AUTO_INCREMENT', 'INT', 'VARCHAR', 'TEXT', 'DATE', 'TIMESTAMP', 'BLOB'
            ];
        
            // Convertir valor recibido  en un array
            let palabras = variable.split(/\s+/);
        
            // Filtrar las palabras que no son reservadas
            let palabrasFiltradas = palabras.filter(palabra => !palabrasReservadas.includes(palabra.toUpperCase()));
        
            // Unir el resultado nuevamente en una cadena
            return palabrasFiltradas.join(' ');
        }
        
    </script>
    
</html>
