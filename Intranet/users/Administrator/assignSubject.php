<?php
session_start();
if (!isset($_SESSION['USU'])) {
    header('Location: ../../../Seed/login.html');
}

include '../../service/administratorService.php';
include '../../service/aspirantService.php';
$aspirantService = new aspirantService();


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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <title>Exámen 2do Parcial</title>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php include("../../views/barNav.php"); ?>
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
                <?php include("../../views/menuAdmin.php"); ?>
            </div>
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>ASIGNATURAS</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="managAspirant">Asignaturas</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <br><br>

            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <b>GESTIÓN ASIGNATURAS EDUCACIÓN GENERAL BÁSICA</b>
                        </div>
                        <div class="card-body">
                            <center><button type="button" class="btn btn-success" data-toggle="modal" data-target="#nuevoModuloBasico">Nuevo Asignatura</button></center>
                            <br><br>
                            <div id="tblModulos_wrapper" class="dataTables_wrapper no-footer">
                                <div class="dataTables_length" id="tblModulos_length"><label>Mostrar <select name="tblModulos_length" aria-controls="tblModulos" class="">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> Entradas</label></div>
                                <div id="tblModulos_filter" class="dataTables_filter"><label>Buscar:<input type="search" class="" placeholder="" aria-controls="tblModulos"></label></div>
                                <table class="display responsive nowrap dataTable no-footer" style="width:100%; cursor: pointer;" id="tblModulos" role="grid" aria-describedby="tblModulos_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="tblModulos" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 75.2px;">Id</th>
                                            <th class="sorting" tabindex="0" aria-controls="tblModulos" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 177.2px;">Nombre Asignatura</th>
                                            <th class="sorting" tabindex="0" aria-controls="tblModulos" rowspan="1" colspan="1" aria-label="Estado: activate to sort column ascending" style="width: 152px;">Nivel</th>
                                            <th class="sorting" tabindex="0" aria-controls="tblModulos" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 42.4px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd">
                                            <td valign="top" colspan="4" class="dataTables_empty">Sin resultados encontrados</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="dataTables_info" id="tblModulos_info" role="status" aria-live="polite">Mostrando 0 to 0 of 0 Entradas</div>
                                <div class="dataTables_paginate paging_simple_numbers" id="tblModulos_paginate"><a class="paginate_button previous disabled" aria-controls="tblModulos" data-dt-idx="0" tabindex="-1" id="tblModulos_previous">Anterior</a><span></span><a class="paginate_button next disabled" aria-controls="tblModulos" data-dt-idx="1" tabindex="-1" id="tblModulos_next">Siguiente</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <b>GESTIÓN ASIGNATURAS PRIMER AÑO DE BACHILLERATO</b>
                        </div>
                        <div class="card-body">
                            <center><button type="button" class="btn btn-success" data-toggle="modal" data-target="#nuevoModuloPrimero">Nuevo Asignatura</button></center>
                            <br><br>
                            <div id="tblModulos_wrapper" class="dataTables_wrapper no-footer">
                                <div class="dataTables_length" id="tblModulos_length"><label>Mostrar <select name="tblModulos_length" aria-controls="tblModulos" class="">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> Entradas</label></div>
                                <div id="tblModulos_filter" class="dataTables_filter"><label>Buscar:<input type="search" class="" placeholder="" aria-controls="tblModulos"></label></div>
                                <table class="display responsive nowrap dataTable no-footer" style="width:100%; cursor: pointer;" id="tblModulos" role="grid" aria-describedby="tblModulos_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="tblModulos" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 75.2px;">Id</th>
                                            <th class="sorting" tabindex="0" aria-controls="tblModulos" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 177.2px;">Nombre Asignatura</th>
                                            <th class="sorting" tabindex="0" aria-controls="tblModulos" rowspan="1" colspan="1" aria-label="Estado: activate to sort column ascending" style="width: 152px;">Nivel</th>
                                            <th class="sorting" tabindex="0" aria-controls="tblModulos" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 42.4px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd">
                                            <td valign="top" colspan="4" class="dataTables_empty">Sin resultados encontrados</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="dataTables_info" id="tblModulos_info" role="status" aria-live="polite">Mostrando 0 to 0 of 0 Entradas</div>
                                <div class="dataTables_paginate paging_simple_numbers" id="tblModulos_paginate"><a class="paginate_button previous disabled" aria-controls="tblModulos" data-dt-idx="0" tabindex="-1" id="tblModulos_previous">Anterior</a><span></span><a class="paginate_button next disabled" aria-controls="tblModulos" data-dt-idx="1" tabindex="-1" id="tblModulos_next">Siguiente</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <b>GESTIÓN ASIGNATURAS SEGUNDO AÑO DE BACHILLERATO</b>
                        </div>
                        <div class="card-body">
                            <center><button type="button" class="btn btn-success" data-toggle="modal" data-target="#nuevoModuloSegundo">Nuevo Asignatura</button></center>
                            <br><br>
                            <div id="tblModulos_wrapper" class="dataTables_wrapper no-footer">
                                <div class="dataTables_length" id="tblModulos_length"><label>Mostrar <select name="tblModulos_length" aria-controls="tblModulos" class="">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> Entradas</label></div>
                                <div id="tblModulos_filter" class="dataTables_filter"><label>Buscar:<input type="search" class="" placeholder="" aria-controls="tblModulos"></label></div>
                                <table class="display responsive nowrap dataTable no-footer" style="width:100%; cursor: pointer;" id="tblModulos" role="grid" aria-describedby="tblModulos_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="tblModulos" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 75.2px;">Id</th>
                                            <th class="sorting" tabindex="0" aria-controls="tblModulos" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 177.2px;">Nombre Asignatura</th>
                                            <th class="sorting" tabindex="0" aria-controls="tblModulos" rowspan="1" colspan="1" aria-label="Estado: activate to sort column ascending" style="width: 152px;">Nivel</th>
                                            <th class="sorting" tabindex="0" aria-controls="tblModulos" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 42.4px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd">
                                            <td valign="top" colspan="4" class="dataTables_empty">Sin resultados encontrados</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="dataTables_info" id="tblModulos_info" role="status" aria-live="polite">Mostrando 0 to 0 of 0 Entradas</div>
                                <div class="dataTables_paginate paging_simple_numbers" id="tblModulos_paginate"><a class="paginate_button previous disabled" aria-controls="tblModulos" data-dt-idx="0" tabindex="-1" id="tblModulos_previous">Anterior</a><span></span><a class="paginate_button next disabled" aria-controls="tblModulos" data-dt-idx="1" tabindex="-1" id="tblModulos_next">Siguiente</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <b>GESTIÓN ASIGNATURAS TERCER AÑO DE BACHILLERATO</b>
                        </div>
                        <div class="card-body">
                            <center><button type="button" class="btn btn-success" data-toggle="modal" data-target="#nuevoModuloTercero">Nuevo Asignatura</button></center>
                            <br><br>
                            <div id="tblModulos_wrapper" class="dataTables_wrapper no-footer">
                                <div class="dataTables_length" id="tblModulos_length"><label>Mostrar <select name="tblModulos_length" aria-controls="tblModulos" class="">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> Entradas</label></div>
                                <div id="tblModulos_filter" class="dataTables_filter"><label>Buscar:<input type="search" class="" placeholder="" aria-controls="tblModulos"></label></div>
                                <table class="display responsive nowrap dataTable no-footer" style="width:100%; cursor: pointer;" id="tblModulos" role="grid" aria-describedby="tblModulos_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="tblModulos" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Id: activate to sort column descending" style="width: 75.2px;">Id</th>
                                            <th class="sorting" tabindex="0" aria-controls="tblModulos" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 177.2px;">Nombre Asignatura</th>
                                            <th class="sorting" tabindex="0" aria-controls="tblModulos" rowspan="1" colspan="1" aria-label="Estado: activate to sort column ascending" style="width: 152px;">Nivel</th>
                                            <th class="sorting" tabindex="0" aria-controls="tblModulos" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 42.4px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd">
                                            <td valign="top" colspan="4" class="dataTables_empty">Sin resultados encontrados</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="dataTables_info" id="tblModulos_info" role="status" aria-live="polite">Mostrando 0 to 0 of 0 Entradas</div>
                                <div class="dataTables_paginate paging_simple_numbers" id="tblModulos_paginate"><a class="paginate_button previous disabled" aria-controls="tblModulos" data-dt-idx="0" tabindex="-1" id="tblModulos_previous">Anterior</a><span></span><a class="paginate_button next disabled" aria-controls="tblModulos" data-dt-idx="1" tabindex="-1" id="tblModulos_next">Siguiente</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="nuevoModuloBasico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nueva Asignatura</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nombre de la Asignatura</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Asignatura" aria-label="Username" aria-describedby="basic-addon1" id="nombre">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nombre del Nivel</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Nivel" aria-label="Username" aria-describedby="basic-addon1" id="nombre">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" onclick="crearNuevo()">Guardar</button>
                            <button id="cerrar" type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="nuevoModuloPrimero" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nueva Asignatura</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nombre de la Asignatura</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Asignatura" aria-label="Username" aria-describedby="basic-addon1" id="nombre">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nombre del Nivel</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Nivel" aria-label="Username" aria-describedby="basic-addon1" id="nombre">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" onclick="crearNuevo()">Guardar</button>
                            <button id="cerrar" type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="nuevoModuloSegundo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nueva Asignatura</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nombre de la Asignatura</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Asignatura" aria-label="Username" aria-describedby="basic-addon1" id="nombre">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nombre del Nivel</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Nivel" aria-label="Username" aria-describedby="basic-addon1" id="nombre">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" onclick="crearNuevo()">Guardar</button>
                            <button id="cerrar" type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="nuevoModuloTercero" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nueva Asignatura</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nombre de la Asignatura</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Asignatura" aria-label="Username" aria-describedby="basic-addon1" id="nombre">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nombre del Nivel</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Nivel" aria-label="Username" aria-describedby="basic-addon1" id="nombre">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" onclick="crearNuevo()">Guardar</button>
                            <button id="cerrar" type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>





            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

            <script>
                var id
                var tblfunc
                var roles
                var idRol
                var idModulo

                $(document).ready(function() {

                    var tblModulos = $('#tblModulos').DataTable({
                        "ajax": "consultas/modulos.php?listaModulos=true",
                        "columns": [{
                                "data": "COD_MODULO"
                            },
                            {
                                "data": "NOMBRE"
                            },
                            {
                                "data": "ESTADO"
                            },
                            {
                                "data": null,
                                "defaultContent": "<button type='button' class='btn btn-sm rounded btn-warning' data-toggle='modal' data-target='#exampleModal'>Editar</button>&nbsp<button class='btn btn-sm rounded btn-danger' onclick='eliminarModulo()'>Desactivar</button>",
                                orderData: false
                            },
                        ],
                        "language": {
                            "emptyTable": "No hay información",
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                            "infoPostFix": "",
                            "thousands": ",",
                            "lengthMenu": "Mostrar _MENU_ Entradas",
                            "processing": "Procesando...",
                            "search": "Buscar:",
                            "zeroRecords": "Sin resultados encontrados",
                            "paginate": {
                                "first": "Primero",
                                "last": "Ultimo",
                                "next": "Siguiente",
                                "previous": "Anterior"
                            }
                        }
                    });
                    $('#tblModulos tbody').on('click', 'td', function() {
                        var data = tblModulos.row($(this).parents('tr')).data();
                        id = data['COD_MODULO'];
                        document.getElementById('nombreModulo').value = data['NOMBRE']
                        document.getElementById('estadoModulo').value = data['ESTADO']
                    });

                    $.fn.dataTable.ext.errMode = 'none'

                    llenarSelectModulos()
                    llenarSelectRoles()
                    llenarVarios()

                });

                function tablaFunciones() {
                    var modulo = document.getElementById('selectModulos').value
                    tblfunc = $('#tblfunc').DataTable({
                        "ajax": "consultas/modulos.php?listaFunciones=true&modulo=" + modulo,
                        "columns": [{
                                "data": "COD_FUNCIONALIDAD",
                                visible: false
                            },
                            {
                                "data": "URL_PRINCIPAL"
                            },
                            {
                                "data": "NOMBRE"
                            },
                            {
                                "data": "DESCRIPCION"
                            },
                            {
                                "data": null,
                                "defaultContent": "<button type='button' class='btn btn-sm rounded btn-warning' data-toggle='modal' data-target='#modalFuncion'>Editar</button>&nbsp<button class='btn btn-sm rounded btn-danger' onclick='eliminarFuncion()'>Eliminar</button>",
                                orderData: false
                            },
                        ],
                        "destroy": true,
                        "language": {
                            "emptyTable": "No hay información",
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                            "infoPostFix": "",
                            "thousands": ",",
                            "lengthMenu": "Mostrar _MENU_ Entradas",
                            "processing": "Procesando...",
                            "search": "Buscar:",
                            "zeroRecords": "Sin resultados encontrados",
                            "paginate": {
                                "first": "Primero",
                                "last": "Ultimo",
                                "next": "Siguiente",
                                "previous": "Anterior"
                            }
                        }
                    });
                    $('#tblfunc tbody').on('click', 'td', function() {
                        var data = tblfunc.row($(this).parents('tr')).data();
                        idFunc = data['COD_FUNCIONALIDAD'];
                        document.getElementById('urlPrincipal').value = data['URL_PRINCIPAL']
                        document.getElementById('nombreFuncion').value = data['NOMBRE']
                        document.getElementById('descriFuncion').value = data['DESCRIPCION']
                    });
                }

                function tablaRoles() {
                    var rol = document.getElementById('selectRoles').value
                    roles = $('#roles').DataTable({
                        "ajax": "consultas/modulos.php?listaRoles=true&rol=" + rol,
                        "columns": [{
                                "data": "COD_ROL",
                                visible: false
                            },
                            {
                                "data": "COD_MODULO",
                                visible: false
                            },
                            {
                                "data": "NOMBRE"
                            },
                            {
                                "data": null,
                                "defaultContent": "<button class='btn btn-sm rounded btn-danger' onclick='eliminarRol()'>Eliminar</button>",
                                orderData: false
                            },
                        ],
                        "destroy": true,
                        "language": {
                            "emptyTable": "No hay información",
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                            "infoPostFix": "",
                            "thousands": ",",
                            "lengthMenu": "Mostrar _MENU_ Entradas",
                            "processing": "Procesando...",
                            "search": "Buscar:",
                            "zeroRecords": "Sin resultados encontrados",
                            "paginate": {
                                "first": "Primero",
                                "last": "Ultimo",
                                "next": "Siguiente",
                                "previous": "Anterior"
                            }
                        }
                    });
                    $('#roles tbody').on('click', 'td', function() {
                        var data = roles.row($(this).parents('tr')).data();
                        idModulo = data['COD_MODULO'];
                        idRol = data['COD_ROL']
                        document.getElementById('nombreModulo').value = data['NOMBRE']
                        document.getElementById('estadoModulo').value = data['ESTADO']
                    });
                }

                function eliminarFuncion() {
                    $.ajax({
                        url: "./consultas/modulos.php?eliminarFuncion=true&idFuncion=" + idFunc,
                        data: {},
                        type: "POST",
                        success: function(data) {
                            if (data == "exito") {
                                alert("La funcionalidad ha sido eliminado exitosamente")
                                $('#tblfunc').DataTable().ajax.reload()
                            }
                        },
                    });
                }

                function eliminarRol() {
                    $.ajax({
                        url: "./consultas/modulos.php?eliminarRol=true&idRol=" + idRol + '&idModulo=' + idModulo,
                        data: {},
                        type: "POST",
                        success: function(data) {
                            if (data == "exito") {
                                alert("El módulo ha sido eliminado exitosamente")
                                $('#roles').DataTable().ajax.reload()
                            }
                        },
                    });
                }

                function llenarSelectModulos() {
                    $.ajax({
                        url: "./consultas/modulos.php?selectModulos=true",
                        data: {},
                        type: "POST",
                        success: function(data) {
                            if (data != "mal") {
                                var selectModulos = document.getElementById("selectModulos");
                                selectModulos.innerHTML = data;
                                var selectModulosFuncionalidad = document.getElementById("selectModulosFuncionalidad");
                                selectModulosFuncionalidad.innerHTML = data;
                            }
                        }
                    });
                }

                function llenarSelectRoles() {
                    $.ajax({
                        url: "./consultas/modulos.php?selectRoles=true",
                        data: {},
                        type: "POST",
                        success: function(data) {
                            if (data != "mal") {
                                var selectRoles = document.getElementById("selectRoles");
                                selectRoles.innerHTML = data;
                            }
                        }
                    });
                }

                function llenarVarios() {
                    $.ajax({
                        url: "./consultas/modulos.php?selectModulos=true",
                        data: {},
                        type: "POST",
                        success: function(data) {
                            if (data != "mal") {
                                var selectModulos = document.getElementById("selecmodulos");
                                selectModulos.innerHTML = data;
                            }
                        }
                    });
                    $.ajax({
                        url: "./consultas/modulos.php?selectRoles=true",
                        data: {},
                        type: "POST",
                        success: function(data) {
                            if (data != "mal") {
                                var selectRoles = document.getElementById("selecroles");
                                selectRoles.innerHTML = data;
                            }
                        }
                    });
                }

                function eliminarModulo() {
                    $.ajax({
                        url: "./consultas/modulos.php?eliminarModulo=true&id=" + id,
                        data: {},
                        type: "POST",
                        success: function(data) {
                            if (data == "exito") {
                                alert("El módulo ha sido eliminado exitosamente")
                                $('#tblModulos').DataTable().ajax.reload()
                            }
                        },
                    });
                }

                function guardarCambios() {
                    var nombre = document.getElementById('nombreModulo').value
                    var estado = document.getElementById('estadoModulo').value
                    $.ajax({
                        url: "./consultas/modulos.php?editarModulo=true&id=" + id,
                        data: {
                            nombre: nombre,
                            estado: estado
                        },
                        type: "POST",
                        success: function(data) {
                            if (data == "exito") {
                                alert("El módulo ha sido editado exitosamente")
                                $('#cerrarModal').click()
                                $('#tblModulos').DataTable().ajax.reload()
                            }
                        },
                    });
                }

                function crearNuevo() {
                    var nombre = document.getElementById('nombre').value
                    $.ajax({
                        url: "./consultas/modulos.php?nuevoModulo=true",
                        data: {
                            nombre: nombre
                        },
                        type: "POST",
                        success: function(data) {
                            if (data == "exito") {
                                alert("El módulo ha sido registrado exitosamente")
                                $('#cerrar').click()
                                $('#tblModulos').DataTable().ajax.reload()
                            }
                        },
                    });
                }

                function guardarNuevoRol() {
                    var rol = document.getElementById('selecroles').value
                    var modulo = document.getElementById('selecmodulos').value
                    $.ajax({
                        url: "./consultas/modulos.php?nuevoRol=true",
                        data: {
                            rol: rol,
                            modulo: modulo
                        },
                        type: "POST",
                        success: function(data) {
                            if (data == "exito") {
                                alert("El módulo ha sido registrado exitosamente")
                                $('#cerrarRol').click()
                                $('#roles').DataTable().ajax.reload()
                            }
                        },
                    });
                }

                function guardarFuncion() {
                    var url = document.getElementById('urlPrincipal').value
                    var nombre = document.getElementById('nombreFuncion').value
                    var descripcion = document.getElementById('descriFuncion').value
                    $.ajax({
                        url: "./consultas/modulos.php?editarFuncion=true",
                        data: {
                            urlP: url,
                            nombre: nombre,
                            descripcion: descripcion,
                            id: idFunc
                        },
                        type: "POST",
                        success: function(data) {
                            if (data == "exito") {
                                alert("Los cambios han sido guardados exitosamente")
                                $('#cerrarFuncion').click()
                                $('#tblfunc').DataTable().ajax.reload()
                            }
                        },
                    });
                }

                function guardarFuncionNuevo() {
                    var url = document.getElementById('urlPrincipalNuevo').value
                    var nombre = document.getElementById('nombreFuncionNuevo').value
                    var descripcion = document.getElementById('descriFuncionNuevo').value
                    var selectNuevo = document.getElementById('selectModulosFuncionalidad').value
                    $.ajax({
                        url: "./consultas/modulos.php?nuevaFuncion=true",
                        data: {
                            urlP: url,
                            nombre: nombre,
                            descripcion: descripcion,
                            modulo: selectNuevo
                        },
                        type: "POST",
                        success: function(data) {
                            if (data == "exito") {
                                alert("La nueva funcionalidad ha sido guardada exitosamente")
                                $('#cerrarNue').click()
                                $('#tblfunc').DataTable().ajax.reload()
                            }
                        },
                    });
                }
            </script>




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
<?php include("../../views/footer.php"); ?>

</html>