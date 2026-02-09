<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MESS Log Horas Extras</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css">
    <!-- Custom styles for this template-->
</head>

    <div class="modal-body">
        <button type="button" class="btn btn-success" id="ConfirmarN" onClick= "creaItems()">Agregar</button>    
        <button type="button" class="btn btn-success" id="ConfirmarN" onClick= "RecorrerItems()">RecorrerItems</button>    
        
        <input type='text' class='form-control input-sm' name='Itemstxt' id='Itemstxt' value ='0' />
            <div class="row" id="divtablaOVInfo">
                <div class="cls-xs-32 table-primary">
                    <table id="tablaOVItems" class="table table-hover table-bordered table-condenced table-sm sm-info"
                        style="font-size:small">
    
                        <thead id="divEncabezado">
                            <tr>                            
                                <th style="text-align: center; ">Tiempo</th>
                                <th style="text-align: center; ">Duracion</th>                            
                            </tr>
                        </thead>
                        <tbody id="divItem">
    
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    <br><br><br>
    <div class="modal-body">
        <form accion="acciones_usuario.php" method = "POST" id="registroSubmit">
            <div class="row">
                <label>CDAREA</label>
                <input type="text" id="CDAREA" name="CDAREA">
                
                <label>P_S</label>
                <input type="text" id="P_S" name="P_S">
                
                <label>CDFAM</label>
                <input type="text" id="CDFAM" name="CDFAM">
                
                <label>CDTIPO</label>
                <input type="text" id="CDTIPO" name="CDTIPO">
                
                <label>AREA</label>
                <input type="text" id="AREA" name="AREA">
                
                <input type="hidden" value ="guardarAreaS">
                
                <button type="submit" value=" ">Submit</button>
            </div>
        </form>
        <br><br><br>
        <div class="row">
                <label>CDAREA</label>
                <input type="text" id="CDAREA2" name="CDAREA2">
                
                <label>P_S</label>
                <input type="text" id="P_S2" name="P_S2">
                
                <label>CDFAM</label>
                <input type="text" id="CDFAM2" name="CDFAM2">
                
                <label>CDTIPO</label>
                <input type="text" id="CDTIPO2" name="CDTIPO2">
                
                <label>AREA</label>
                <input type="text" id="AREA2" name="AREA2">
                
                <button type="button" onClick="registroAreaB()">Confirmar</button>
            </div>
    </div>

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

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>    
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.js"></script>
    <script src="https://rawgit.com/unconditional/jquery-table2excel/master/src/jquery.table2excel.js"></script>
    <script type="text/javascript">
        window.itemId = 0;
        
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
                    console.log("crea nuevo item: - " + cuantosItems + '         - Total items:  - '+ totalItems);
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
        
        function RecorrerItems() {
            var cuantosItems = $('#Itemstxt').val();
            
            for (var j = 1; j <= cuantosItems; j++) {
                alert($('#item1_'+ j).val());
                console.log($('#item2_'+ j).val());
        
            }
            
        
        }
        
        function registroAreaB(){
            var CDAREA =  $('#CDAREA2').val();
            var P_S = $('#P_S2').val();
            var CDFAM = $('#CDFAM2').val();
            var CDTIPO = $('#CDTIPO2').val();
            var AREA = $('#AREA2').val();
            var accion = "guardarAreaB";
            
            $.ajax({
                url: 'acciones_usuario.php',
                method: 'POST',
                dataType: 'json', 
                data: {accion, CDAREA, P_S, CDFAM, CDTIPO, AREA},
                success: function(response) {
                    swal.fire("Se guardo con exito", "success");
                },
                error: function(xhr, status, error) {
                    //console.error('Error al cargar las areas:', error);
                }
            });
        }
    </script>