<?php


?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<?php $this->load->view('head');?>

<style>
.table tbody tr td {
            word-break: break-word;
            vertical-align: top;
        }
        .table-scrollable > .table > tbody > tr > td{
            white-space:normal!important;
        }
</style>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
    <!-- BEGIN HEADER -->
    <?php $this->load->view('header');?>
    <!-- END HEADER -->
    <div class="clearfix">
    </div>
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <?php $this->load->view('menu');?>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                <!-- BEGIN PAGE HEADER-->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                        <h3 class="page-title">
                            Empresas <small>Listado de Empresas</small>
                        </h3>
                        <ul class="page-breadcrumb breadcrumb">
                            <li><i class="fa fa-home"></i><a href="/admin/home">Inicio</a> <i class="fa fa-angle-right">
                            </i></li>
                            <li><a>Listado de Empresas</a> </li>
                        </ul>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                <!-- END PAGE HEADER-->
                <!-- BEGIN PAGE CONTENT-->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-globe"></i>Listado de Empresas
                                </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"></a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover" id="tblEmpresas">
                                    <thead>
                                        <tr>
                                            <th>
                                                Nombre
                                            </th>
                                            <th>
                                                Vigente
                                            </th>
                                            <th>
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $resultado = $empresas;

                                        foreach ($resultado as $row) {
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $row['nombre'];?>
                                            </td>
                                            <td class="center"><?php echo $row['vigente'] == 1 ? "Activo" : "Inactivo"; ?>
                                            </td>
                                            <td class="center">
                                                <a class="btn btn-info" href="<?php echo $this->config->item('base_url');?>admin/empresas/detalle/<?php echo $row['id_empresa'];  ?>">
                                                    <i class="fa fa-edit"></i></a><a class="btn btn-danger" href="javascript:ConfirmarEliminar()">
                                                        <i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php
                            if($rol == 1)
                            {
                                echo '<div class="form-actions right"><a href="empresas/detalle">
                                <button type="button" class="btn green">
                                    Nuevo</button>
                                </a> </div>';
                            }
                            
                            
                            ?>
                       
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>
                <!-- END PAGE CONTENT-->
            </div>
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
      <?php $this->load->view('footer');?>

    <script>
        jQuery(document).ready(function () {
            App.init();
            $('#tblEmpresas').dataTable();
            Custom.init();
        });


        function ConfirmarEliminar($id) {
            bootbox.dialog({
                message: "¿Está Seguro que desea eliminar el registro?",
                title: "Confirmar Eliminación",
                buttons: {
                    success: {
                        label: "Cancelar",
                        className: "default",
                        callback: function () {
                        }
                    },
                    danger: {
                        label: "Aceptar",
                        className: "red",
                        callback: function () {
                            Eliminar($id);
                        }
                    }
                }
            });
        }


        function Eliminar($id) {
            App.bloquearPantalla();
            var data = { "Tipo": "Empresa", "ID": $id };
            
            App.ejecutarAjax(
                    data,
                    "<?php echo $this->config->item('base_url');?>admin/empresas/eliminar",
                    function (data) 
                    {
                        if (data.Codigo != 0) {
                            App.MensajeAlerta("Operación Realizada Exitosamente", "Resultado Operación", App.RecargarPagina);
                    }
                    else {

                        App.MensajeAlerta("Ha ocurrido un error. Intente mas tarde.", "Resultado Operación", App.RecargarPagina);

                    }

                    }
                    );
        }
	
	
    </script>
</body>
<!-- END BODY -->
</html>
