



function LoadingInicial()
{
    
    

    setTimeout(function ()
    {
        App.desbloquearPantalla();
        App.desbloquearPantalla();
        
        jQuery('.loading-container').css({ 'opacity': 0, 'display': 'none' });
        $('body').css('background-image', 'url("img/patterns/binding_light.png")');
        jQuery('.global-wrap').css({ 'opacity': 1 });
        
        $('body').css('overflow', 'auto');

    }, 2000);

    
    
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-top-center",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "500",
        "timeOut": "1000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

}



$(function ()
{
    $(".global-wrap").next("div").remove();


    LoadingInicial();
    $(window).resize(function () {
        $("#dialog").dialog("option", "position", { my: "center", at: "center", of: window });
        $("#dialogComentario").dialog("option", "position", { my: "center", at: "center", of: window });
    });

    $("#dialog").dialog({
        autoOpen: false,
        modal: true,
        title: "Validar Suscripci&oacute;n"

    });



    $("#btnSuscribirse").click(function () {

        if (validarEmail($("#txtMailSuscrito").val())) {
            $("#dialog").dialog("open");
        }
        else {
            App.MensajeAlerta("Ingrese un Email Válido", "Error");
        }
    });

    $("#btnCancelarSuscripcion").click(function () {
        $("#txtCaptcha").val("");
        $("#dialog").dialog("close");
    });





    $.extend({
        getUrlVars: function () {
            var vars = [], hash;
            var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
            for (var i = 0; i < hashes.length; i++) {
                hash = hashes[i].split('=');
                vars.push(hash[0]);
                vars[hash[0]] = hash[1];
            }
            return vars;
        },
        getUrlVar: function (name) {
            return $.getUrlVars()[name];
        }
    });


    $(".btnBuscarGeneral").click(function () {

        var url = "/portal/local/busqueda";

        if ($(".txtBuscarGeneral").val() != "")
        {
            url += "/" + $(".txtBuscarGeneral").val();
        }

        if ($(".lstBuscarGeneral").val() != "") {

            if ($(".txtBuscarGeneral").val() == "") {
                url += "/todos"
            }

            url += "/" + $(".lstBuscarGeneral").val();
        }

        window.location.href = url;

    });

    $(".btnBuscarGeneralPromocion").click(function () {

        var url = "/promociones/busqueda";

        if ($(".txtBuscarGeneralPromocion").val() != "") {
            url += "/" + $(".txtBuscarGeneralPromocion").val();
        }

        if ($(".lstBuscarGeneralPromocion").val() != "") {

            if ($(".txtBuscarGeneralPromocion").val() == "") {
                url += "/todos"
            }

            
            url += "/" + $(".lstBuscarGeneralPromocion").val();
        }

        window.location.href = url;

    });

    $(".btnEnviarSuscripcion").click(function () {

        var data =
                {
                    "btnSuscribirse": "btnSuscribirse",
                    "email": $("#txtMailSuscrito").val(),
                    "6_letters_code": $("#txtCaptcha").val()
                };
        data = $.param(data);
        $.ajax(
                {
                    type: "POST",
                    dataType: "json",
                    url: "/funciones.php",
                    async: false,
                    data: data,
                    success: function (data) {

                        if (data.codigo == 0) {


                            App.MensajeAlerta("Su Correo ha sido suscrito Exitosamente.", "Suscripci&oacute;n");
                            $("#txtMailSuscrito").val("");
                            $("#txtCaptcha").val("");
                            $("#dialog").dialog("close");
                        }
                        else {
                            App.MensajeAlerta(data.error, "Resultado Operaci&oacute;n");
                        }
                        App.desbloquearPantalla();

                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        App.MensajeAlerta("Ha ocurrido un error. Intente Nuevamente", "Resultado Operaci&oacute;n");
                        App.guardarLogError("promocion.html", "btnEnviarSuscripcion", xhr.responseText);

                    }
                });

    });

    $('.autocompleteComuna').typeahead(
                {
                    source: function (query, process) {

                        var p = 1;

                        return $.ajax(
                        {
                            url: "/portal/comuna/CargarComunasAutocompletado",
                            type: 'post',
                            data:
                            {
                                "query": query
                            },
                            dataType: 'json',
                            success: function (json) {
                                return typeof json == 'undefined' ? false : process(json);
                            },

                            error: function (xhr, ajaxOptions, thrownError) {

                                App.desbloquearPantalla();
                                App.MensajeAlerta("Ha ocurrido un error. Intente Nuevamente", "Resultado Operaci&oacute;n");

                                //alert(xhr.status);
                                //alert(thrownError);
                            }
                        });
                    },
                    updater: function (item) {

                        $($(this)[0].$element[0]).attr("data-value", item);
                        return item;
                    }
                });


});

            function validarEmail(email) {
                expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!expr.test(email))
                    return false;
                return true;
            }

            function refreshCaptcha() {
                $("#txtCaptcha").val("");
                var img = document.images['captchaimg'];
                img.src = img.src.substring(0, img.src.lastIndexOf("?")) + "?rand=" + Math.random() * 1000;
            }

            
            


var App = function () {

    return {


        guardarLogError: function (pagina, funcionalidad, log) {

            var data =
                {
                    "GuardarLog": "GuardarLog",
                    "pagina": pagina,
                    "funcionalidad": funcionalidad,
                    "log": log,
                    "idTipoLog": 1
                };
            data = $.param(data);
            $.ajax(
                {
                    type: "POST",
                    dataType: "json",
                    url: "/funciones.php",
                    async: false,
                    data: data,
                    success: function (data) {
                        
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        
                    }
                });

        },
        guardarLogInfo: function (pagina, funcionalidad, log) {

            var data =
                {
                    "GuardarLog": "GuardarLog",
                    "pagina": pagina,
                    "funcionalidad": funcionalidad,
                    "log": log,
                    "idTipoLog": 2
                };
            data = $.param(data);
            $.ajax(
                {
                    type: "POST",
                    dataType: "json",
                    url: "/funciones.php",
                    async: false,
                    data: data,
                    success: function (data) {

                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                    }
                });

        },
            bloquearPantalla: function () {
                debugger;
            $.isLoading({ });
            },


        MensajeAlerta: function (mensaje, titulo, callback) {
            bootbox.dialog({
                message: mensaje,
                closeButton: false,
                title: titulo,
                buttons: {
                    main: {
                        label: 'Aceptar',
                        className: 'blue',
                        callback: function () {
                            if (callback) {
                                callback();
                            }
                        }
                    }
                }
            });
        },
        desbloquearPantalla: function () {
        
                $.isLoading("hide");

            
        },

        ejecutarAjax: function (data, url, exito, error, loader)
        {
                
            if (loader == true)
            {
                App.bloquearPantalla();
            }
            setTimeout(function ()
            { 
                 $.ajax(
                    {
                        type: "POST",
                        url: url,
                        data: data,
                        success: function (data)
                        {
                            if (exito) {
                                    exito(JSON.parse(data));
                                }
                            if(loader == true)
                            {
                                App.desbloquearPantalla();
                            }

                        },
                        error: function (xhr, ajaxOptions, thrownError)
                        {
                            debugger;
                            if (error) {
                                App.MensajeAlerta(xhr.responseText,"error");
                                    error(xhr, ajaxOptions, thrownError);
                                    
                            }
                            if (loader == true) {
                                App.desbloquearPantalla();
                            }
                        }
                    });
            }, 100);

        }

    };
} ();