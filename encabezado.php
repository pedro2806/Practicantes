<!-- Topbar -->
<nav class = "navbar navbar-expand navbar-light bg-white topbar mb-2 static-top shadow">
<!-- Sidebar Toggle (Topbar) -->
<button id = "sidebarToggleTop" class = "btn btn-link d-md-none rounded-circle mr-3">
    <i class = "fa fa-bars"></i>
</button>
<?php
include 'conn.php';
?>
<!-- Topbar Search -->
<div  class="input-group">
    <?php
        if ($_COOKIE['rol']== 2){
    ?>
        Total de Horas: <label id="Total_Horas" name="Total_Horas"></label>
    <?php
        }
    ?>
</div>

<!-- Topbar Navbar -->
<ul class = "navbar-nav ml-auto">
        <!-- Dropdown - Messages -->
        <div class = "dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby = "searchDropdown">
            <form class = "form-inline mr-auto w-100 navbar-search">
                <div class = "input-group">
                    <div class = "input-group-append">
                        <button class = "btn btn-primary" type = "button">
                            <i class = "fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </li>

    <div class = "topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class = "nav-item dropdown no-arrow">
        <a class = "nav-link dropdown-toggle" href = "#" id = "userDropdown" role = "button" data-toggle = "dropdown" aria-haspopup = "true" aria-expanded = "false">
            <span class = "mr-2 d-none d-lg-inline text-gray-600 "><?php $_COOKIE['nombre'];?> <?php $_COOKIE['apellidos'];?></span>
            <img class = "img-profile rounded-circle" src = "img/undraw_profile.svg">
        </a>
        <!-- Dropdown - User Information -->
        <div class = "dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby = "userDropdown">
            <a class = "dropdown-item" href = "#" data-toggle = "modal" data-target = "#logoutModalN">
                <i class = "fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Salir
            </a>
        </div>
    </li>
</ul>
    <!-- Logout Modal-->
    <div class = "modal fade" id = "logoutModalN" tabindex = "-1" role = "dialog" aria-labelledby = "exampleModalLabel"aria-hidden = "true">
        <div class = "modal-dialog" role = "document">
            <div class = "modal-content border-left-danger">
                <div class = "modal-header">
                    <h4 class = "modal-title" id = "exampleModalLabel"> Cerrar sesion </h4>
                    <button class = "close" type = "button" data-dismiss = "modal" aria-label = "Close">
                        <span aria-hidden = "true">X</span>
                    </button>
                </div>
                <div class = "modal-body"><h5><b>&iquest;Estas seguro?</b></h5></div>
                <div class = "modal-footer">
                    <button class = "btn btn-warning" type = "button" data-dismiss = "modal">Cancelar</button>
                    <a class = "btn btn-danger" href = "logout.php">Salir</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    
    function total_horas() {
        $.ajax({
            url: 'acciones_practicas.php', 
            type: 'POST',
            data: { accion: 'total_horas' },
            dataType: 'json',
            success: function(response) {
                response.forEach(
                    function (total_horas){
                    
                    if (total_horas.total_horas > 0) {
                        $("#Total_Horas").text( ' ' + total_horas.total_horas);
                        
                    } else {
                        $("#Total_Horas").text("0.0");
                        Swal.fire({
                            icon: "warning",
                            text: "Aun no existen registro de horas."
                        });
                    }
                }
                );
                
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    icon: "error",
                    text: "No se pudieron cargar los registros de horas."
                });
            }
        });
    }
</script>
<!-- End of Topbar -->