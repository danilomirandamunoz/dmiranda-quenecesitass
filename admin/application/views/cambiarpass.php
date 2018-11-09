<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="shortcut icon" href="../earth_scan.ico" type="image/x-icon" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="MobileOptimized" content="320">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="<?php echo $this->config->item('base_url');?>admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $this->config->item('base_url');?>admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $this->config->item('base_url');?>admin/css/uniform.default.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->

    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME STYLES -->
    <link href="<?php echo $this->config->item('base_url');?>admin/css/style-metronic.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $this->config->item('base_url');?>admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $this->config->item('base_url');?>admin/css/style-responsive.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $this->config->item('base_url');?>admin/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $this->config->item('base_url');?>admin/css/themes/blue.css" rel="stylesheet" type="text/css" id="style_color">
    <link href="<?php echo $this->config->item('base_url');?>admin/css/pages/login-soft.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $this->config->item('base_url');?>admin/css/custom.css" rel="stylesheet" type="text/css" />
    <!-- END THEME STYLES -->

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
    <!-- BEGIN LOGO -->
    <div class="logo">
        <img src="<?php echo $this->config->item('base_url');?>admin/img/earth_scan.png" alt="" />
        <br />
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        <form class="login-form" action="index.php" method="post">
            <h3 class="form-title">Cambio Contraseña!</h3>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Contraseña Antigua</label>
                <div class="input-icon">
                    <i class="fa fa-lock"></i>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Contraseña Antigua" id="Opassword" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Contraseña Nueva</label>
                <div class="input-icon">
                    <i class="fa fa-lock"></i>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Contraseña Nueva" id="Npassword" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Repita Contraseña</label>
                <div class="input-icon">
                    <i class="fa fa-lock"></i>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Repita Contraseña" id="Rpassword" />
                </div>
            </div>
            <div class="form-actions">
                <button type="button" id="btnLogin" class="btn blue btn-block">
                    Cambiar Clave <i class="m-icon-swapright m-icon-white"></i>

                </button>
                <a id="btnVolver" class="btn red btn-block" href="<?php echo $this->config->item('base_url');?>admin"><i class="m-icon-swapleft m-icon-white"></i>Cancelar </a>


            </div>

        </form>
        <!-- END LOGIN FORM -->




    </div>

    <!-- END LOGIN -->
    <!-- BEGIN COPYRIGHT -->
    <div class="copyright">
        2018 © ¿Qué Necesitas?
    </div>
    <!-- END COPYRIGHT -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <!--[if lt IE 9]>
	<script src="assets/plugins/respond.min.js"></script>
	<script src="assets/plugins/excanvas.min.js"></script> 
	<![endif]-->
    <script src="<?php echo $this->config->item('base_url');?>admin/js/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="<?php echo $this->config->item('base_url');?>admin/js/jquery-ui.js"></script>
    <script src="<?php echo $this->config->item('base_url');?>admin/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <script src="<?php echo $this->config->item('base_url');?>admin/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo $this->config->item('base_url');?>admin/js/jquery.slimscroll.js" type="text/javascript"></script>
    <script src="<?php echo $this->config->item('base_url');?>admin/js/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="<?php echo $this->config->item('base_url');?>admin/js/jquery.cokie.min.js" type="text/javascript"></script>
    <script src="<?php echo $this->config->item('base_url');?>admin/js/jquery.uniform.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo $this->config->item('base_url');?>admin/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo $this->config->item('base_url');?>admin/js/jquery.backstretch.min.js" type="text/javascript"></script>
    <script src="<?php echo $this->config->item('base_url');?>admin/js/bootbox.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?php echo $this->config->item('base_url');?>admin/js/app.js" type="text/javascript"></script>
    <script src="<?php echo $this->config->item('base_url');?>admin/js/login-soft.js" type="text/javascript"></script>
    <script src="<?php echo $this->config->item('base_url');?>admin/js/ui-bootbox.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        jQuery(document).ready(function () {
            App.init();
            Login.init();
        });

        $(function () {
            $("#btnLogin").click(function () {
                App.bloquearPantalla();

                var data = {

                    "passO": $("#Opassword").val(),
                    "passN": $("#Npassword").val(),
                    "passR": $("#Rpassword").val()
                };


                App.ejecutarAjax(data,"<?php echo $this->config->item('base_url');?>admin/login/cambiarclave",ExitoLogear,ErrorLogear);

            });

        });

        function ExitoLogear(data)
        {
            if(data.Codigo == 0)
            {
                setTimeout(function(){location.href = data.URL;},10000);
                App.MensajeAlerta("La contraseña ha sido cambiada exitosamente, presione Aceptar o espere 10 segundos y será dirigido a la página de login.", "Cambio contraseña", function () { location.href = data.URL;  });
            }
            else
            {
                App.MensajeAlerta(data.Mensaje, "Error");
            }
            
        }

        function ErrorLogear()
        {
             App.MensajeAlerta("Ha ocurrido un error. Intente Nuevamente", "Error");
        }
       

    </script>
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>