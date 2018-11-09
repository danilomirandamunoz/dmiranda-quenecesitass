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
    <meta charset="utf-8" />
    <title>Administraci&oacute;n</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <link href="assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet"
        type="text/css" />
    <!-- END PAGE LEVEL PLUGIN STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages/tasks.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/themes/blue.css" rel="stylesheet" type="text/css" id="style_color">
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="../earth_scan.ico" type="image/x-icon" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
    <!-- BEGIN HEADER -->
    <?php include('header.php');?>
    <!-- END HEADER -->
    <div class="clearfix">
    </div>
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->

        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">

                <!-- BEGIN PAGE HEADER-->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                        <h3 class="page-title">&iquest;Qu&eacute; Buscas? <small>Configuraciones y Mantenimiento</small>
                        </h3>
                        <ul class="page-breadcrumb breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>

                        </ul>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                         <?php
                                
                                if(1 == 1)
                                {
                                ?>
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-reorder"></i>Funcionalidades Generales
                                </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"></a>
                                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                    <a href="javascript:;" class="reload"></a>
                                    <a href="javascript:;" class="remove"></a>
                                </div>
                            </div>
                            <div class="portlet-body">
                               
                                <a href="#" class="icon-btn" id="btnEnviarPromociones">
                                    <i class="fa fa-envelope"></i>
                                    <div>
                                        Enviar Promociones
                                    </div>
                                </a>
                                <a href="#" class="icon-btn" id="btnEnviarPromocionesVencenHoy">
                                    <i class="fa fa-envelope"></i>
                                    <div>
                                        Enviar Promociones que vencen hoy 
                                    </div>
                                </a>
                                <a href="#" class="icon-btn" id="btnEnviarPromocionesVencenEstaSemana">
                                    <i class="fa fa-envelope"></i>
                                    <div>
                                        Enviar Promociones que vencen Esta Semana 
                                    </div>
                                </a>
                               

                            </div>
                        </div>
                         <?php
                                }
                                
                                ?>

                    </div>
                </div>
                <!-- END PAGE HEADER-->
                <!-- ACA VA EL CONTENIDO-->
            </div>
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <div class="footer">
        <div class="footer-inner">
        </div>
        <div class="footer-tools">
            <span class="go-top"><i class="fa fa-angle-up"></i></span>
        </div>
    </div>
    <!-- END FOOTER -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <!--[if lt IE 9]>
<script src="assets/plugins/respond.min.js"></script>
<script src="assets/plugins/excanvas.min.js"></script> 
<![endif]-->
    <script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
    <script src="assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"
        type="text/javascript"></script>
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
    <script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="assets/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
    <script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
    <script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
    <script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
    <script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
    <script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
    <script src="assets/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
    <script src="assets/plugins/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="assets/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="assets/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
    <!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
    <script src="assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>

    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="assets/scripts/app.js" type="text/javascript"></script>
    <script src="assets/scripts/index.js" type="text/javascript"></script>
    <script src="assets/scripts/tasks.js" type="text/javascript"></script>
    <script src="assets/scripts/custom.js" type="text/javascript"></script>
    <script src="assets/scripts/ui-bootbox.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        jQuery(document).ready(function () {
            App.init(); // initlayout and core plugins
            Index.init();
            Index.initIntro();
            Custom.init();


           $("#btnEnviarPromociones").click(function () {
                App.bloquearPantalla();
                setTimeout(function ()
                {
                    EnviarPromociones(1);
                }, 100);
                

            });
            $("#btnEnviarPromocionesVencenHoy").click(function () {
                App.bloquearPantalla();
                setTimeout(function ()
                {
                    EnviarPromociones(2);
                }, 100);

            });
            $("#btnEnviarPromocionesVencenEstaSemana").click(function () {
                App.bloquearPantalla();
                setTimeout(function ()
                {
                    EnviarPromociones(3);
                }, 100);
            });

        });

        function EnviarPromociones(tipo) {

            var data =
            {
                "EnviarMailPromociones": "EnviarMailPromociones",
                "Tipo": tipo,
            };
            data = $.param(data);
            $.ajax(
            {
                type: "POST",
                dataType: "json",
                url: "funciones_privado.php",
                async: false,
                data: data,
                success: function (data) {

                    if (data.codigo == 0) {
                        App.MensajeAlerta("Promociones Enviadas Correctamente", "Resultado Operaci&oacute;n");
                    }
                    else {
                        App.MensajeAlerta(data.error, "Resultado Operaci&oacute;n");
                    }
                    App.desbloquearPantalla();

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    App.MensajeAlerta("Ha ocurrido un error. Intente Nuevamente", "Resultado Operaci&oacute;n");
App.desbloquearPantalla();
                }
            });


        }

    </script>
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>

