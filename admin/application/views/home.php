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

                <!-- BEGIN PAGE HEADER-->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                        <h3 class="page-title">&iquest;Qu&eacute; Necesitas? <small>Configuraciones y Mantenimiento</small>
                        </h3>
                        <ul class="page-breadcrumb breadcrumb">
                            <li><i class="fa fa-home"></i><a href="/admin/home">Home</a></li>

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
                               
                                <!-- <a href="#" class="icon-btn" id="btnEnviarPromociones">
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
                                </a> -->
                               

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

  
<?php $this->load->view('footer');?>

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
                url: "/admin/home/enviarmailpromociones",
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

