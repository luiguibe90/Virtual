<?php
session_start();
if (!isset($_SESSION['USU'])) {
    header('Location: ../../../PrimerasTravesuras/login.html');
}
include '../../service/CalificacionServicios.php';

$calificacion = new CalificacionServicios();
include '../../service/administratorService.php';
include '../../service/aspirantService.php';
$aspirantService = new aspirantService();
include '../../service/studentService.php';
$studentService = new studentService();
include '../../service/infraestructuraService.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $_SESSION['USU']['ROL'] ?>|Seed School</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <title>Exámen 2do Parcial</title>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php include("../../views/barNav.php");?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../../index3.html" class="brand-link">
                <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle1 ">
                <span class="brand-text font-weight-light"><?php echo $_SESSION['USU']['ROL'] ?></span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <?php $temp = explode(" ", $_SESSION['USU']['PNAME']); ?>
                        <?php $temp2 = explode(" ", $_SESSION['USU']['P2NAME']); ?>
                        <a href="#" class="d-block"><?php echo $temp[0]; ?></br> <?php echo $temp2[0]; ?> </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <?php include("../../views/menuAdmin.php");?>
            </div>
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Asignar Docente</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="managAspirant">Asignar Profesores</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <br><br>

    <div class="form-group" style="centered">
                        <form method="POST" action="assignTeacher2.php">
                            <div class="modal-body">
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Docente</label>
                                    </div>

                                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" name="docente">
                                                            <?php
                                                            $result = $studentService->showPeople(3);
                                                            foreach ($result as $opciones) :
                                                            ?>
                                                                <option value="<?php echo $opciones['COD_PERSONA'] ?>"><?php echo $opciones['NOMBRE']; echo ' '; echo $opciones['APELLIDO'] ?></option>
                                                            <?php endforeach ?>
                                    </select>

                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Nivel</label>
                                    </div>
                                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" name="nivel">
                                        <option value="1"> Inicial 1 </option>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Asignatura</label>
                                    </div>
                                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" name="asignatura">
                                            <?php
                                                $studentService = new studentService();
                                                $result = $studentService -> listarAsignaturas();
                                                foreach ($result as $opciones) :
                                            ?>
                                <option value="<?php echo $opciones['COD_ASIGNATURA'] ?>"><?php echo $opciones['NOMBRE']; ?></option>
                                <?php endforeach ?>
                                    </select>
                                </div>
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Aula</label>
                                    </div>
                                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" name="aula">
                                            <?php
                                                $infraestructuraService = new infraestructuraService();
                                                $result = $infraestructuraService -> listarAulas();
                                                foreach ($result as $opciones) :
                                            ?>
                                <option value="<?php echo $opciones['COD_AULA'] ?>"><?php echo $opciones['NOMBRE']; ?></option>
                                <?php endforeach ?>
                                    </select>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <input type="submit" name="submit" class="btn btn-success" value="Guardar" ></input>
                                <button id="cerrarRol" type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
    </div>

    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <b>Asignación de Docentes a Asignaturas</b>
                </div>
                <div class="card-body">
                    <center>
                        <div class="input-group mb-3">
                       

                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Módulo Periodo</label>
                            </div>

                            <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" name="periodo">
                                                <?php
                                                $result = $calificacion->periodo();
                                                foreach ($result as $opciones) :
                                                ?>
                                                    <option value="<?php echo $opciones['COD_PERIODO_LECTIVO'] ?>"><?php echo 'DEL '; echo $opciones['FECHA_INICIO']; echo ' AL '; echo $opciones['FECHA_FIN']; ?></option>
                                                <?php endforeach ?>
                            </select>

                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" onclick="tablaRoles()">Buscar</button>
                            </div>

                        </div>
                    </center>
                    <center><button class="btn btn-success" type="button" data-toggle='modal'
                            data-target='#nuevoRol'>Nueva asignación</button></center><br><br>
                    <table class="display responsive nowrap" style="width:100%; cursor: pointer;" id="roles">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>id_docente</th>
                                <th>Asignaturas</th>
                                <th>Horario</th>
                                <th>Aulas</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><br><br>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>




    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../../plugins/chart.js/Chart.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- Sparkline -->
    <script src="../../plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../../plugins/moment/moment.min.js"></script>
    <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../../plugins/summernote/summernote-bs4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>

</body>
    <?php include("../../views/footer.php");?>

</html>