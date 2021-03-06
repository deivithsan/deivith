<?php
    require_once "../conexion.php";
    $admin = new Admin();
    $conex = new Conexion();
    session_start();
    if (isset($_SESSION['user'])){
        $priv = $_SESSION['privil'];
        $nom = $_SESSION['user'];
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
    <title>Perfil</title>
    <link rel="shortcut icon" href="../img/icono.ico">
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
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
                                    <li><a><i class="fa fa-edit"></i> Modificar Datos <span class="fa fa-chevron-down"></span></a>
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
                                        <?php if($nom == 'dei'){?>
                                            <li><a href="../registro"><i class="fa fa-lock pull-right"></i> Nuevo Admin</a></li>
                                        <?php } ?>
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
                        <div class="page-title">
                            <div class="title_left">
                            </div>
                            <div class="title_right">
                                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                    <div class="input-group">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Perfil del Usuario</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                            <div class="profile_img">
                                                <div id="crop-avatar">
                                                    <!-- Current avatar -->
                                                    <?php  if ($existe == true) { ?>
                                                        <img src="images/<?php echo "$nom" ?>.jpg"  alt="Avatar" class="img-responsive avatar-view">
                                                    <?php  } else { ?>
                                                        <img src="images/user.jpg"  alt="Avatar" class="img-responsive avatar-view"><h3>
                                                    <?php  } ?>
                                                </div>
                                            </div>
                                            <h3><?php echo $nombreyapellido; ?></h3>

                                            <?php
                                            $nombre = $conex->get_Nombre();
                                            $apellido = $conex->get_Apellido();
                                            $correo = $conex->get_Correo();
                                            $telefono = $conex->get_Tel();
                                            $dir = $conex->get_Dir();
                                            $numCC = $conex->get_NumCC();
                                            ?>

                                            <ul class="list-unstyled user_data">
                                                <li>
                                                    Administrador de Ecofruit
                                                </li>
                                                <li>
                                                    <i class="fa fa-envelope user-profile-icon"></i> <?php echo $correo;?>
                                                </li>
                                                <li>
                                                    <i class="fa fa-phone user-profile-icon"></i> <?php echo $telefono;?>
                                                </li>
                                                <li>
                                                    <i class="fa fa-home user-profile-icon"></i> <?php echo $dir;?>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-12">


                                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Modificar Información</a>
                                                    <li role="presentation"><a href="#tab_content2" id="log-tab" role="tab" data-toggle="tab" aria-expanded="false">Historial</a>
                                                    <li role="presentation"><a href="#tab_content3" id="log-tab" role="tab" data-toggle="tab" aria-expanded="false">Perfil</a>
                                                    </li>
                                                </ul>
                                                <div id="myTabContent" class="tab-content">
                                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                                                        <!-- start recent activity -->
                                                        <div class="x_content">
                                                            <br />
                                                            <?php
                                                            if ($_POST["Enviar"]){
                                                                $admin->update_AdminInfo();
                                                            }
                                                            ?>
                                                            <form class="form-horizontal form-label-rigth" method="post">
                                                                <div class="form-group">
                                                                    <label class="text-left col-md-3 col-sm-3 col-xs-3" for="last-name">Nombre: <span class="required"></span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <input type="text" id="nombreusuario" name="nombreusuario" required="required" class="form-control col-md-7 col-xs-12" style="display:none"  value="<?php echo $nom; ?>">
                                                                        <input type="text" id="nombre" name="nombre" required class="form-control col-md-7 col-xs-12" value="<?php echo $nombre; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="middle-name" class="text-left col-md-3 col-sm-3 col-xs-12">Apellidos:<span class="required"></span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <input type="text" id="apellidos" name="apellidos" required class="form-control col-md-7 col-xs-12" value="<?php echo $apellido; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="text-left col-md-3 col-sm-3 col-xs-12">Correo: <span class="required"></span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <input type="text" id="email" name="email" required class="form-control col-md-7 col-xs-12" value="<?php echo $correo;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="text-left col-md-3 col-sm-3 col-xs-12">Telefono: <span class="required"></span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <input type="number" id="tel" name="tel" required class="form-control col-md-7 col-xs-12" value="<?php echo $telefono;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="text-left col-md-3 col-sm-3 col-xs-12">Dirección: <span class="required"></span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <input type="text" id="dir" name="dir" required class="form-control col-md-7 col-xs-12" value="<?php echo $dir;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="text-left col-md-3 col-sm-3 col-xs-12">Número de Cedula: <span class="required"></span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <input type="number" id="numcc" name="numcc" required class="form-control col-md-7 col-xs-12" value="<?php echo $numCC;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="ln_solid"></div>
                                                                <div class="form-group">
                                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                        <center>
                                                                            <input type="submit" class="btn btn-success" name="Enviar" id="Enviar" value="Guardar">
                                                                            <button onclick='limpiar()' class="btn btn-success">Limpiar</button>
                                                                    </div>
                                                                </div>
                                                                <script language=javascript>
                                                                    function limpiar(){
                                                                        document.getElementById('nombre').value = "";
                                                                        document.getElementById('apellidos').value = "";
                                                                        document.getElementById('email').value = "";
                                                                        document.getElementById('tel').value = "";
                                                                        document.getElementById('dir').value = "";
                                                                        document.getElementById('numcc').value = "";
                                                                    }
                                                                </script>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="log-tab">

                                                        <!-- start recent activity -->
                                                        <?php
                                                        $log = $admin->get_logUser();
                                                        if ($log == 0) {
                                                            echo "<h4 class='heading' align='center'> Los Administradores no han Realizado Acciones.</h4>";

                                                        } else{
                                                        $rows = count($log);
                                                          ?>
                                                        <table id="datatable-buttons" class="table table-striped table-bordered" width="100%">
                                                            <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Usuario</th>
                                                                <th>Acción</th>
                                                                <th>idAfectado</th>
                                                                <th>Fecha</th>
                                                                <th>Hora</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <?php
                                                                for ($i = 0; $i < $rows; $i++){
                                                                ?>
                                                                <td><?php echo $log[$i][0]; ?></td>
                                                                <td><?php echo $log[$i][6]; ?></td>
                                                                <td><?php echo $log[$i][1]; ?></td>
                                                                <td><?php echo $log[$i][3]; ?></td>
                                                                <td><?php echo $log[$i][4]; ?></td>
                                                                <td><?php echo $log[$i][2]; ?></td>
                                                            </tr>
                                                            <?php
                                                            }
                                                            }
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="log-tab">
                                                        <h2 class='heading' align='center'>Cambiar Foto de Perfil</h2>
                                                        <div class="ln_solid"></div>
                                                        <form enctype="multipart/form-data" method="POST">
                                                            <center>
                                                                <div>
                                                                    <input name="image_uploads[]" id="image_uploads[]" type="file" accept=".jpg, .png, .jpeg"/>
                                                                </div>
                                                                <div class="ln_solid"></div>
                                                                <div class="form-group">
                                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                        <input type="submit" value="Guardar" class="btn btn-success" name="foto" id="foto"/>
                                                                    </div>
                                                                </div>
                                                            </center>
                                                        </form>
                                                    </div>
                                                    <?php
                                                    if ($_POST["foto"]){
                                                        if (isset($_FILES['image_uploads'])) {
                                                            $nomF = "$nom.jpg";
                                                            $nomArray = array("$nomF");
                                                            $_FILES['image_uploads']['name'] = $nomArray;
                                                            $myFile = $_FILES['image_uploads']['name'];
                                                            $fileCount = count($myFile);
                                                            for ($i = 0; $i < $fileCount; $i++) {
                                                                $target_path = "images/";
                                                                $target_path = $target_path . basename( $_FILES['image_uploads']['name'][$i]);
                                                                if(move_uploaded_file($_FILES['image_uploads']['tmp_name'][$i], $target_path)) {
                                                                    echo "<script>alert('Se han agregado los correspondientes archivos.');</script>";
                                                                    echo "<script type=\"text/javascript\">window.location='perfil'</script>";
                                                                } else{
                                                                    echo "Ha ocurrido un error, trate de nuevo!";
                                                                }
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer>
                    <div class="pull-right">
                        <a href="../index">EcoFruit</a>
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
        <!-- validator -->
        <script src="../vendors/validator/validator.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>
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
