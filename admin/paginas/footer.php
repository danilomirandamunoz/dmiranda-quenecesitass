<?php

?>

<footer class="main" id="main-footer">
    <div class="footer-top-area">
        <div class="container">
            <div class="row row-wrap">
                <div class="col-md-4">
                    <p>&iquest;Quieres recibir informaci&oacute;n sobre promociones y ofertas?</p>
                </div>
                <div class="col-md-8">

                    <div class="input-group">
                        <input type="text" class="form-control input-medium" id="txtMailSuscrito" placeholder="Ingresa tu Email">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" id="btnSuscribirse">Suscr&iacute;bete!</button>
                        </span>
                    </div>
                    <!-- /input-group -->

                </div>


            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-4" style="text-align: center;">
                    <p>Copyright &copy; Todos los Derechos Reservados.</p>
                </div>
                <div class="col-md-4" style="text-align: center;">
                    <p>Cont&aacute;ctenos <a href="mailto:contacto.quenecesitas@gmail.com">contacto.quenecesitas@gmail.com</a></p>
                </div>
                <div class="col-md-4" style="text-align: center;">
                    <p>Sitio Desarrollado por <a href="http://www.emcosoft.hol.es">EmcoSoft</a> </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<div id="dialog" style="display: none;">
    <form id="fromSuscripcion">
        <div class="form-group">
            <img src="/portal/paginas/captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg'><br>
            <br>
            <div class="input-group">
                <input type="text" id="txtCaptcha" class="form-control" required>
                <span class="input-group-btn"><a class="btn btn-default" onclick="javascript: refreshCaptcha();"
                    type="button"><i class="fa fa-refresh"></i></a></span>
            </div>
        </div>
        <input type="button" class="btn btn-primary btnEnviarSuscripcion" value="Enviar"
            id="btnEnviarSuscripcion" />
        <input type="button" class="btn btn-danger" value="Cancelar" id="btnCancelarSuscripcion" />
    </form>
</div>
