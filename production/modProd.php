<?php
    require_once "../conexion.php";
    $admin = new Admin();
    $conex = new Conexion();
    session_start();

    if (isset($_SESSION['user'])){
        $priv = $_SESSION['privil'];
        $nom = $_SESSION['user'];
        $iduser = $_SESSION['iduser'];
        if ($priv != 1) {
            session_unset();
            echo '<script> window.location="../index"; </script>';
        }
    } else {
        echo '<script> window.location="../index"; </script>';
    }
    $nombreyapellido = $admin->get_NombreApellido();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modificar Productos</title>
    <link rel="shortcut icon" href="../img/icono.ico">
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index" class="site_title"></i> <span>EcoFruit!</span></a>
                </div>
                <div class="clearfix"></div>
                <div class="profile">
                    <div class="profile_pic">
                        <?php
                        $dir = "images/$nom.jpg";
                        $existe = file_exists($dir);
                        if ($existe == true){  ?>
                            <img src="images/<?php echo "$nom" ?>.jpg" alt="..." class="img-circle profile_img">
                        <?php  } else {  ?>
                            <img src="images/user.jpg" alt="..." class="img-circle profile_img">
                        <?php  }  ?>
                    </div>
                    <div class="profile_info">
                        <span>Bienvenido,</span>
                        <h2><?php echo $nombreyapellido; ?></h2>
                    </div>
                </div>
                <br />
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a href="index"><i class="fa fa-home"></i> Inicio </a>
                            </li>
                            <li><a><i class="fa fa-edit"></i> Formularios <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="createProdP">Ingresar Productos Principales</a></li>
                                    <li><a href="createProdV">Ingresar Productos a la Venta</a></li>
                                    <li><a href="adduser">Ingresar Usuarios</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-table"></i> Visualizar Tablas <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="tableBuy"> Compras </a></li>
                                    <li><a href="tableInfoUsr"> Información de Usuarios </a></li>
                                    <li><a href="tableProDisp"> Productos a la Venta </a></li>
                                    <li><a href="tableProPrin"> Productos Principales </a></li>
                                    <li><a href="tableEstateProd"> Estado de los Productos </a></li>
                                    <li><a href="tableTipeUsers"> Tipos de Usuarios </a></li>
                                    <li><a href="tableTiposProd"> Tipos de Productos </a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-edit"></i> Modificar Datos<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="modInfo">Información de Usuarios</a></li>
                                    <li><a href="modProd">Productos a la Venta</a></li>
                                    <li><a href="modProdPrin">Productos Principales</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-money"></i> Ventas <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="tableMen"> Mensajes </a></li>
                                    <li><a href="modBuy">Compras</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-area-chart"></i> Estadisticas <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="ventasGlobal"> Ventas </a></li>
                                    <li><a href="ventasVendedor"> Ventas Por Vendedor </a></li>
                                    <li><a href="estadisticasProd"> Productos </a></li>
                                    <li><a href="estadisticasComp"> Compradores </a></li>
                                </ul>
                            </li>
                    </div>
                </div>
                <div class="sidebar-footer hidden-small">
                    &nbsp;
                    <img src="images/ECOFRUIT.png" height="35px" width="40px">
                    &nbsp;
                    <img src="images/DATMA.png" height="35px" width="40px">

                    <a data-toggle="tooltip" a href="logout" data-placement="top" title="Salir">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <?php  if ($existe == true) { ?>
                                    <img src="images/<?php echo "$nom" ?>.jpg"  alt=""><?php echo $nombreyapellido; ?>
                                <?php  } else { ?>
                                    <img src="images/user.jpg"  alt=""><?php echo $nombreyapellido; ?>
                                <?php  } ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="perfil"><i class="fa fa-street-view pull-right"></i> Perfil</a></li>
                                <li><a href="logout"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="right_col" role="main">
            <div class="">
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Modifica Los Productos en Venta</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <div class="form-group">
                                    <form class="form-horizontal form-label-left input_mask" method="post">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Id del Producto a Modificar <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="idprod" name="idprod" required="required" class="form-control col-md-7 col-xs-12">
                                            <center>
                                                <input type="submit" class="btn btn-success" style="display:inline" name="buscar" id="buscar" value="Buscar">
                                            </center>
                                        </div>
                                    </form>
                                </div>
                        </div>
                        <?php
                        if ($_POST){
                            $idproducto = $_POST["idprod"];
                            $idprod = (int) $idproducto;
                            if ($_POST["buscar"]){
                                $prod = $admin->get_Productos();
                                $rows = count($prod);
                                for ($i = 0; $i < $rows; $i++){
                                    if ($prod[$i][0] == $idprod){
                                        $on = 1;
                                        $admin->find_Prod($idprod);
                                        $datos = $admin->get_LlenarFormProd($idprod);
                                    }
                                }
                                if ($on == 0){
                                    echo "<script>alert('No existe un producto con ese número de Id, intente de nuevo por favor.')</script>";
                                    echo "<script type=\"text/javascript\">window.location='modProd'</script>";
                                }
                            }
                        }else {
                        ?>
                    </div>
                </div>
            </div>
            <thead>
            <tr>
                <th>Id Producto</th>
                <th>Nombre de Venta</th>
                <th>Estado Actual</th>
                <th>Cantidad (Kilos)</th>
                <th>Costo Unitario</th>
                <th>Costo Total</th>
                <th>Ubicación</th>
                <th>Fecha Creación</th>
                <th>Fecha Limite Venta</th>
                <th>Vendedor</th>
                <th>Producto Principal:</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $product = $admin->get_Productos();
            $rows = count($product);
            for ($i = 0; $i < $rows; $i++){  ?>
                <tr>
                    <td><?php echo $product[$i][0] ?></td>
                    <td><?php echo $product[$i][1] ?></td>
                    <td><?php echo $product[$i][2] ?></td>
                    <td><?php echo number_format($product[$i][3],0) ?></td>
                    <td>$<?php echo number_format($product[$i][4],0) ?>.00</td>
                    <td>$<?php echo number_format($product[$i][5],0) ?>.00</td>
                    <td><?php echo $product[$i][6] ?></td>
                    <td><?php echo $product[$i][7] ?></td>
                    <td><?php echo $product[$i][8] ?></td>
                    <td><?php echo $product[$i][9] ?></td>
                    <td><?php echo $product[$i][11] ?></td>
                </tr>
                <?php
            }
                             }
                             ?>
            <form class="form-horizontal form-label-left input_mask" method="post">
                <center>
                    <input type=button value="Nuevo" class="btn btn-success" onclick = "location='createProdV'"/>
            </form>
            </tbody>
            </table>
        </div>
        </div>
        </div>
            <?php
            if ($_POST){
                if ($_POST["Enviar"]){

                    $admin->update_Productos();
                    $info = "Modificación de Producto de Usuario";
                    $i = $_POST["idproduc"];
                    $admin->create_log($iduser,$info,$i);

                    if (isset($_FILES['image_uploads'])) {
                        $nomF = "$i.jpg";
                        $nomArray = array("$nomF");
                        $_FILES['image_uploads']['name'] = $nomArray;
                        $myFile = $_FILES['image_uploads']['name'];
                        $fileCount = count($myFile);
                        for ($i = 0; $i < $fileCount; $i++) {
                            $target_path = "images/Productos/";
                            $target_path = $target_path . basename($_FILES['image_uploads']['name'][$i]);
                            if (move_uploaded_file($_FILES['image_uploads']['tmp_name'][$i], $target_path)) {
                                echo "<script type=\"text/javascript\">window.location='modProd'</script>";
                            }
                        }
                    }

                    echo "<script type=\"text/javascript\">window.location='modProd'</script>";

                }
                if ($_POST["Eliminar"]){
                    $admin->delete_Prod();
                    $info = "Eliminó un Producto de Usuario";
                    $i = $_POST["idproduc"];
                    $admin->create_log($iduser,$info,$i);
                }
            }
            if ($_POST["buscar"]) {
                ?>
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                    <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name" style="display:none">Id
                            del Producto<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="idproduc" name="idproduc" required="required"
                                   class="form-control col-md-7 col-xs-12" value="<?php echo $datos[0][0] ?>"
                                   style="display:none">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Nombre<span
                                    class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="nomprod" name="nomprod" required="required"
                                   class="form-control col-md-7 col-xs-12" value="<?php echo $datos[0][1];?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Estado<span
                                    class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="estadolist">
                                <?php
                                $est = $admin->get_EstadosProd();
                                $rows = count($est);
                                for ($i = 0; $i < $rows; $i++) {
                                    ?>
                                    <option value="<?php echo $est[$i][0] ?>"<?php if ($est[$i][1] == $datos[0][2]){?> selected <?php } ?> ><?php echo $est[$i][1]; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Cantidad (Kilos)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="cant" name="cant" required="required"
                                   class="form-control col-md-7 col-xs-12" value="<?php echo $datos[0][3] ?>" onkeyup="javascript:this.value = this.value.replace(/[.,,]/, ''); if (isNaN(this.value)) this.value = 0;">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Costo por Unidad ($)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="costo" name="costo" required="required"
                                   class="form-control col-md-7 col-xs-12" value="<?php echo $datos[0][4] ?>" onkeyup="javascript:this.value = this.value.replace(/[.,,]/, ''); if (isNaN(this.value)) this.value = 0;">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Costo Total ($)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="venta" name="venta" required="required"
                                   class="form-control col-md-7 col-xs-12" value="<?php echo $datos[0][5] ?>" onkeyup="javascript:this.value = this.value.replace(/[.,,]/, ''); if (isNaN(this.value)) this.value = 0;">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Ubicación<span
                                    class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="ubicacion">
                                <?php
                                $mun = $admin->get_municipios();
                                $rows3 = count($mun);
                                for ($i = 0; $i < $rows3; $i++) {
                                    ?>
                                    <option value="<?php echo $mun[$i][0] ?>"<?php if ($mun[$i][1] == $datos[0][6]){?> selected <?php } ?> ><?php echo $mun[$i][1]; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Fecha Limite de Venta<span
                                    class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" id="fechaF" name="fechaF" required
                                   class="form-control col-md-7 col-xs-12" value="<?php echo $datos[0][8];?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Vendedor<span
                                    class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="vendedoreslist">
                                <?php
                                $vendedores = $admin->get_Vendedores();
                                $rows = count($vendedores);
                                for ($i = 0; $i < $rows; $i++) {
                                    ?>
                                    <option value="<?php echo $vendedores[$i][0] ?>"<?php if ($vendedores[$i][0] == $datos[0][12]){?> selected <?php } ?> ><?php echo $vendedores[$i][1]; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Producto Principal<span
                                    class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="prodP">
                                <?php
                                $prodP = $admin->get_productosPrin();
                                $rows = count($prodP);
                                for ($i = 0; $i < $rows; $i++) {
                                    ?>
                                    <option value="<?php echo $prodP[$i][0] ?>"<?php if ($prodP[$i][0] == $datos[0][13]){?> selected <?php } ?> ><?php echo $prodP[$i][1]; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Foto del Producto<span
                                    class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="image_uploads[]" id="image_uploads[]" type="file" accept=".jpg, .png, .jpeg"/>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <center>
                                <input type="submit" class="btn btn-success" name="Eliminar" id="Eliminar"
                                       value="Borrar">
                                <input type="submit" class="btn btn-success" name="Enviar" id="Enviar"
                                       value="Actualizar">
                                <input type=button value="Ver Productos en Venta" class="btn btn-success"
                                       onclick="location='tableProDisp'"/>
                            </center>
                        </div>
                    </div>
                </form>
                <?php
            }
?>
        </div>
    </div>
</div>
</div>
<footer>
    <div class="pull-right">
        <a href="index">EcoFruit</a>
    </div>
    <div class="clearfix"></div>
</footer>
</div>
</div>
<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="../vendors/iCheck/icheck.min.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="../vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>
<!-- bootstrap-wysiwyg -->
<!-- Datatables -->
<script src="../vendors/datatables.net/js/jquery.dataTables.js"></script>
<script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../vendors/jszip/dist/jszip.min.js"></script>
<script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
<script>
    $(document).ready(function() {
        var handleDataTableButtons = function() {
            if ($("#datatable-buttons").length) {
                $("#datatable-buttons").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        {
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                    ],
                    responsive: true
                });
            }
        };

        TableManageButtons = function() {
            "use strict";
            return {
                init: function() {
                    handleDataTableButtons();
                }
            };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
            keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
            ajax: "js/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });

        $('#datatable-fixed-header').DataTable({
            fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
            'order': [[ 1, 'asc' ]],
            'columnDefs': [
                { orderable: false, targets: [0] }
            ]
        });
        $datatable.on('draw.dt', function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-green'
            });
        });

        TableManageButtons.init();
    });

</script>
  </body>
</html>
