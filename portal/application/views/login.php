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
    <link href="/portal/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/portal/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/portal/assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->

    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME STYLES -->
    <link href="/portal/assets/css/style-metronic.css" rel="stylesheet" type="text/css" />
    <link href="/portal/assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/portal/assets/css/style-responsive.css" rel="stylesheet" type="text/css" />
    <link href="/portal/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="/portal/assets/css/themes/blue.css" rel="stylesheet" type="text/css" id="style_color">
    <link href="/portal/assets/css/pages/login-soft.css" rel="stylesheet" type="text/css" />
    <link href="/portal/assets/css/custom.css" rel="stylesheet" type="text/css" />
    <!-- END THEME STYLES -->

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
    <!-- BEGIN LOGO -->
    <div class="logo">
        <img src="/portal/img/earth_scan.png" alt="" />
        <br />
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        <form class="login-form" action="index.php" method="post">
            <h3 class="form-title">Ingrese sus credenciales para comenzar!</h3>
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Nombre Usuario</label>
                <div class="input-icon">
                    <i class="fa fa-user"></i>
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Nombre Usuario" id="username" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Contraseña</label>
                <div class="input-icon">
                    <i class="fa fa-lock"></i>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Contraseña" id="password" />
                </div>
            </div>
            <div class="form-actions">
                <button type="button" id="btnLogin" class="btn blue btn-block">
                    Login <i class="m-icon-swapright m-icon-white"></i>

                </button>
                <a id="btnVolver" class="btn red btn-block" href="../locales"><i class="m-icon-swapleft m-icon-white"></i>Cancelar </a>


            </div>
            <div class="forget-password">
                <h4>¿Olvidaste tu Contraseña?</h4>
                <p>
                    No te preocupes, haz click <a onclick="AbrirModalRecuperar()" href="#">Aquí</a> para recuperarla.
                </p>
            </div>

        </form>
        <!-- END LOGIN FORM -->




    </div>
    <div id="mdlRecuperarPass" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    </button>
                    <h4 class="modal-title">Recuperar Contraseña</h4>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal form-row-seperated" role="form" id="frmTags">
                        <div class="form-body" style="width: 99%;">
                            <div class="form-group">
                                <label class="control-label col-md-3">
                                    Nombre Usuario</label>
                                <div class="col-md-9">
                                    <input type="text" id="txtRutRecuperar" class="form-control" placeholder="Ingrese su Nombre Usuario" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">
                                    Email</label>
                                <div class="col-md-9">
                                    <input type="text" id="txtEmailRecuperar" class="form-control" placeholder="Ingrese su email" required />
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn red" id="btnCancelar">
                        Cancelar
                    </button>
                    <button type="button" class="btn blue" id="btnRecuperarClave">
                        Recuperar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGIN -->
    <!-- BEGIN COPYRIGHT -->
    <div class="copyright">
        2015 © ¿Qué Buscas?
    </div>
    <!-- END COPYRIGHT -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <!--[if lt IE 9]>
	<script src="assets/plugins/respond.min.js"></script>
	<script src="assets/plugins/excanvas.min.js"></script> 
	<![endif]-->
    <script src="/portal/assets/js/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="/portal/assets/js/jquery-ui.js"></script>
    <script src="/portal/assets/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <script src="/portal/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/portal/assets/js/jquery.slimscroll.js" type="text/javascript"></script>
    <script src="/portal/assets/js/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="/portal/assets/js/jquery.cokie.min.js" type="text/javascript"></script>
    <script src="/portal/assets/js/jquery.uniform.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="/portal/assets/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="/portal/assets/js/jquery.backstretch.min.js" type="text/javascript"></script>
    <script src="/portal/assets/js/bootbox.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/portal/assets/js/app.js" type="text/javascript"></script>
    <script src="/portal/assets/js/login-soft.js" type="text/javascript"></script>
    <script src="/portal/assets/js/ui-bootbox.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        jQuery(document).ready(function () {
            App.init();
            Login.init();
        });

        function AbrirModalRecuperar() {
            $("#txtRutRecuperar").val("");
            $("#txtEmailRecuperar").val("");
            var $modal = $('#mdlRecuperarPass');
            $modal.modal();
        }

        $(function () {

            $("#btnRecuperarClave").click(function () {
                App.bloquearPantalla();
                var data = {
                    "btnRecuperarClave": "btnRecuperarClave",
                    "rut": $("#txtRutRecuperar").val(),
                    "email": $("#txtEmailRecuperar").val()
                };


                data = $.param(data);
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "login.php",
                    data: data,
                    success: function (data) {
                        if (data.Codigo != 0) {
                            App.MensajeAlerta(data.Mensaje, "Error");
                        }
                        else {

                            App.MensajeAlerta(data.Mensaje, "Cambio contraseña", function () { location.href = data.URL; });

                            
                        }
                        App.desbloquearPantalla();
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        App.desbloquearPantalla();
                        App.MensajeAlerta("Ha ocurrido un error. Intente Nuevamente", "Error");
                        App.guardarLogError("login.php", "btnLogin", xhr.responseText);
                    }
                });

            });

            $("#btnLogin").click(function () {
                App.bloquearPantalla();

                var data = {

                    "username": $("#username").val(),
                    "password": $("#password").val()
                };


                App.ejecutarAjax(data,"/portal/login/validar",ExitoLogear,ErrorLogear);

            });

        });

        function ExitoLogear(data)
        {
            if(data.Codigo == 0)
            {
                location.href = data.URL;
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