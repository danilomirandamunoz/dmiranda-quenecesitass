<?php

$existe = 1;
if(!isset($empresa['id_empresa']))
{
    $existe = 0;
}


?>

<!DOCTYPE html>
<html>
<head>
<title>¿Qué Necesitas?</title>
    <meta property="og:title" content="<?php echo $empresa['nombre']  ?>" />
    <meta property="og:description" content="<?php echo $empresa['descripcion_corta']  ?>" />
    <meta property="og:image" content="<?php echo $empresa["url_imagen"]  ?>" /> 
    <meta property="og:url" content="<?php echo $urlRedesSociales  ?>" />
    <?php $this->load->view('head');?>
</head>
<body class="">

    <?php $this->load->view('loader');?>


    <div class="global-wrap">
        <?php $this->load->view('header');?>
 <!-- SEARCH AREA -->
 <?php $this->load->view('busqueda_local');?>
        <!-- END SEARCH AREA -->
        <div class="gap-small">
        </div>
        <!-- //////////////////////////////////
        //////////////PAGE CONTENT/////////////
        ////////////////////////////////////-->
        <div class="container">
            <div class="row">
                <div class="col-md-12" <?php echo $existe == 0? "style='display:none;'" : ""  ?>>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="fotorama" data-allowfullscreen="1" /*data-nav="thumbs"*/ data-autoplay="true" data-transition="crossfade" data-loop="true" id="lstImagenes">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="product-info box">
                                <ul class="icon-group icon-list-rating text-color" id="lstValoracionTotal"></ul>
                                <small><a href="#" class="text-muted" id="lblCantidadComentarios"></a></small>
                                <h3 id="lblNombreEmpresa"><?php echo $empresa['nombre']?></h3>
                                <p class="text-smaller text-muted" id="lblDescripcionCorta">
                                    <?php echo $empresa['descripcion_corta']?>
                                </p>
                                <p class="product-info-price">
                                </p>
                                <h3>
                                    Redes Sociales
                                </h3>
                             
                                <ul class="list list-social" id="lstRedesSociales">
                                    <?php  if ($empresa['url_facebook'] != "") {
                                                echo '<li>
                                                <a class="fa fa-facebook box-icon" target="_blank" href="' . $empresa['url_facebook'] . '" data-toggle="tooltip" title="Facebook"></a></li>';
                                            }

                                            if ($empresa['url_twitter'] != "") {
                                                echo '<li><a class="fa fa-twitter box-icon" target="_blank" href="' . $empresa['url_twitter'] . '" data-toggle="tooltip" title="Twitter"></a></li>';
                                            } 

                                            if ($empresa['url_instagram'] != "") {
                                                echo '<li><a class="fa fa-instagram box-icon" target="_blank" href="' . $empresa['url_instagram'] . '" data-toggle="tooltip" title="Instagram"></a></li>';
                                            } 

                                            if ($empresa['url_facebook'] == "" && $empresa['url_twitter'] == "" && $empresa['url_instagram'] == "") {
                                                echo '<li>No Posee.</li>';
                                            }
                                            
                                            ?>


                                </ul>
                               
                                <p class="product-info-price">
                                </p>
                                <h3>
                                    Tags
                                </h3>
                                <div id="lstTags" class="tagsinput" style="width: auto; max-height: 280px;  overflow-y: auto;">
                                    <?php 
                                        $html = '';

                                        //echo var_dump($tags);
                                        if($tags != null)
                                        {
                                            foreach ($tags as $tag) {
                                                $html .= '<a href="'.$this->config->item('base_url').'portal/home/busqueda/'.$tag['nombre'].'"><span class="label label-success" style="border-radius: 0px 10px 10px 0px;
                                                padding-right: 20px; margin-right:5px">'.$tag['nombre'].'</span></a>';
                                            }
                                        }
                                        else
                                        {
                                            $html= '<span>No Posee.</span>';
                                        }
                                        
                                   

                                        echo $html;

                                    ?>
                                    <div class="tags_clear">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gap">
                    </div>
                    <div class="tabbable">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active">
                                <a href="#tab-2" data-toggle="tab">
                                    <i class="fa fa-location-arrow">
                                    </i>Sucursales
                                </a>
                            </li>
                           <!--  <li>
                                <a href="#tab-3" data-toggle="tab"><i class="fa fa-info"></i>Información Adicional</a>
                            </li> -->
                            <li>
                                <a href="#tab-5" data-toggle="tab"><i class="fa fa-shopping-cart"></i>Productos</a>
                            </li>
                            <li>
                                <!-- <a href="#tab-4" data-toggle="tab"><i class="fa fa-comments"></i>Comentarios</a> -->
                            </li>
                             
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade  in active" id="tab-2">
                            </div>
                            <div class="tab-pane fade" id="tab-3">
                                <p id="lblDescripcionLarga">
                                </p>

                                <div id="divInformacionAdicional">

                                </div>

                            </div>
                            <div class="tab-pane fade" id="tab-5">
                                <h1>Listado de Productos</h1>
                                <div class="row">
                                <?php 

                                    $html = '';

                                    //echo var_dump($productos);
                                    if($productos != null)
                                    {
                                        
                                        foreach ($productos as $producto) {
                                            $html .= '
                                           
                                            <div class="col-md-4">
                                            
                                            <p style="text-align: center;">'. $producto['nombre'].'</p>
                                        
                                                <img src="'.$producto['imagen'].'" alt="'. $producto['nombre'].'" title="'. $producto['nombre'].'"><i class="fa fa-resize-full hover-icon"></i>
                        
                                            </div>
                                            ';
                                        }

                                        echo ' <div class="row">'.$html.'</div>';
                                    }
                                    else
                                    {
                                        echo "<div class='row'>>No Posee.</div>";
                                        }
                                    

                                    ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-4">
                                <ul class="comments-list" id="lstComentarios"></ul>
                                <div class="row row-wrap" id="contendorPaginador" style="text-align: center;">
                                    <ul id="pagination-demo" class=""></ul>
                                </div>
                                <a class="popup-text   btn btn-success btn-lg btn-block" id="btnAgregarComentario" href="#review-dialog" data-effect="mfp-zoom-out">
                                    <i class="fa fa-pencil"></i>Agregar Comentario
                                </a>
                                <div id="review-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
                        <h3>Agregar Comentario</h3>
                        <form>
                            <div class="form-group">
                                <label>Nombre<span style="color:red; margin-left: 5px;">*</span></label>
                                <input type="text" placeholder="e.j. Miguel Soto" id="txtNombre" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>E-mail<span style="color:red; margin-left: 5px;">*</span></label>
                                <input type="text" placeholder="e.j. miguel.soto@gmail.com" id="txtEmail" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Comentario<span style="color:red; margin-left: 5px;">*</span></label>
                                <textarea class="form-control" id="txtComentario"></textarea>
                            </div>
                            

                            <div class="form-group">
                                <label>Valoración <span style="color:red; margin-left: 5px;">*</span></label>
                                <ul class="icon-list icon-list-inline star-rating" id="star-rating">
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <label>¿Está Seguro de Enviar el comentario?<span style="color:red; margin-left: 5px;">*</span></label>
                                <input type="checkbox" id="chkValido" class="form-control"/>
                            </div>
                            <input type="button" class="btn btn-primary btn-lg btn-block" value="Guardar Comentario" id="btnGuardarComentario">
                        </form>
                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" <?php echo $existe == 0? "style='display:block;'" : "style='display:none;'"  ?>>

                    <div class="alert alert-danger" role="alert"><strong>Lo Sentimos!! </strong>El Local que estas buscando no existe!</div>

                </div>
                <div class="gap">
                </div>
            </div>

        </div>
        <div id="myModal-img-popup" class="modal">

            <!-- The Close Button -->
            <span class="close">&times;</span>

            <!-- Modal Content (The Image) -->
            <img class="modal-content" id="img-popup">

            <!-- Modal Caption (Image Text) -->
            <div id="caption-img-popup"></div>
        </div>
        <!-- //////////////////////////////////
        //////////////END PAGE CONTENT/////////
        ////////////////////////////////////-->
        <!-- //////////////////////////////////
        //////////////MAIN FOOTER//////////////
        ////////////////////////////////////-->
      <?php $this->load->view('footer');?>


     
        <script type="text/javascript">
            //App.bloquearPantalla();
            $(function ()
            {
            
                cargaInical();



              $('.popup-gallery').magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    closeOnBgClick: true,
                    tLoading: 'Loading image #%curr%...',
                    mainClass: 'mfp-img-mobile',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                    },
                    image: {
                        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                        titleSrc: function(item) {
                            return item.el.attr('title'); //+ '<small>'+item.el.attr('name')+'</small>';
                        }
                    },
                    callbacks: {
                        open: function() {
                        jQuery('body').addClass('noscroll');
                        },
                        close: function() {
                        jQuery('body').removeClass('noscroll');
                        jQuery('html').css('style',"");
                        }
                    }
                });

            $("#btnCancelarComentario").click(function ()
                    {
                        $("#dialogComentario").dialog("close");
                    });

                    $("#btnAgregarComentario").click(function ()
                    {

                        var c = $("#txtNombre").val("");
                        var d = $("#txtEmail").val("");
                        var f = $("#txtComentario").val("");
                        $("#chkValido").prop("checked", false);
                        $("#star-rating").find("li[class=selected]").removeClass("selected");

                    });


                    $("#btnGuardarComentario").click(function (a)
                    {
                        App.bloquearPantalla();

                        a.preventDefault();
                        var error = 0;
                        var nombre = $("#txtNombre").val();
                        var email = $("#txtEmail").val();
                        var comentario = $("#txtComentario").val();
                        var check = $("#chkValido").prop("checked");
debugger;
                        if(nombre == "" || email == "" || comentario == "" || check == false)
                        {
                            App.desbloquearPantalla();
                            App.MensajeAlerta("Complete los datos obligatorios", "Atención");
                            return;
                        }

                        if (b == 0) {
                            setTimeout(function ()
                            {
                                GuardarComentario(c, d, f, $("#star-rating").find("li[class=selected]").length, h);
                            }, 1000);
                        }
                        else {
                            App.desbloquearPantalla();
                        }

                    });
                
            
                });

            function GuardarComentario(c, d, f, v, h)
            {

                var data =
                {
                    "GuardarComentario": "GuardarComentario",
                    "nombre": c,
                    "email": d,
                    "comentario": f,
                    "idEmpresa": 1,
                    "6_letters_code": h,
                    "valoracion": v,

                };
                data = $.param(data);
                $.ajax(
                {
                    type: "POST",
                    dataType: "json",
                    url: "/funciones.php",
                    async: false,
                    data: data,
                    success: function (data)
                    {
                        App.desbloquearPantalla();
                        if (data.codigo == 0) {
                            CargarComentarios(1, true);
                            App.MensajeAlerta("Operación realizada exitosamente.", "Resultado Operación");
                            $("#dialogComentario").dialog("close");
                            var c = $("#txtNombre").val("");
                            var d = $("#txtEmail").val("");
                            var f = $("#txtComentario").val("");
                            $("#txtCaptchaComentario").val("");
                            $("#star-rating").find("li[class=selected]").removeClass("selected");
                            $("#ActualizarCaptchaComentario").click();
                        }
                        else {
                            App.MensajeAlerta(data.error, "Resultado Operación");
                        }


                    },
                    error: function (xhr, ajaxOptions, thrownError)
                    {
                        App.desbloquearPantalla();
                        App.MensajeAlerta("Ha ocurrido un error. Intente Nuevamente", "Resultado Operación");
                        App.guardarLogError("local", "GuardarComentario", xhr.responseText);

                    }
                });
            }

           

            
            function refreshCaptchaComentario()
            {
                $("#txtCaptchaComentario").val("");
                var img = document.images['captchaimgComentario'];
                img.src = img.src.substring(0, img.src.lastIndexOf("?")) + "?rand=" + Math.random() * 1000;
            }

            function viewImage(obj)
            {
                var modal = document.getElementById('myModal-img-popup');
                var modalImg = document.getElementById("img-popup");
                var captionText = document.getElementById("caption-img-popup");
                modal.style.display = "block";
                    modalImg.src = obj.src;
                    captionText.innerHTML = obj.alt;

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() { 
                    modal.style.display = "none";
                }
            }

        

            function cargaInical()
            {
                var existeEmpresa = <?php echo $existe ?>;
            
                if(existeEmpresa == 1)
                {
                    CargarEmpresa();
                    //CargarComentarios(1, false); 
                }
            }


            




            function CargarEmpresa()
            {
                var data =
                {
                    "id": <?php echo $empresa['id_empresa'] ?>

                };

                App.ejecutarAjax(data,"<?php echo $this->config->item('base_url');?>portal/local/detalle",ExitoObtenerEmpresasPorID,ErrorObtenerEmpresasPorID);


            }

            function ExitoObtenerEmpresasPorID(data)
            {
                var html = "";
                if (data.codigo == 0) {
                    var empresa = data.data;
                    //FinRS
                    console.log(data.Imagenes);
                    CargarImagenes(data.Imagenes);                
                    CargarDirecciones(data.Direcciones,empresa.nombre);

            }
        }

            function ErrorObtenerEmpresasPorID()
            {

            }

            
               

            function descomponerTelefonos(cadena)
            {
                var arrayDeCadenas = cadena.split("-");
                var retorno = "";
                for (var i = 0; i < arrayDeCadenas.length; i++) {
                    retorno += '<a href="tel:'+arrayDeCadenas[i]+'">'+arrayDeCadenas[i]+'</a>&nbsp;&nbsp;&nbsp;&nbsp;'
                }

                return retorno;
            }

            function descomponerEmails(cadena)
            {
                var arrayDeCadenas = cadena.split("-");
                var retorno = "";
                for (var i = 0; i < arrayDeCadenas.length; i++) {
                    retorno += '<a href="mailto:'+arrayDeCadenas[i]+'">'+arrayDeCadenas[i]+'</a>&nbsp;&nbsp;&nbsp;&nbsp'
                }

                return retorno;
            }

           


            function CargarDirecciones(direcciones, nombre)
            {
              
                var html = "";
                for (var i = 0; i < direcciones.length; i++) {

                    var htmlAux = '<div class="row row-wrap">' +
                                    '<div class="col-md-5">' +
                                        '<h5>' +
                                            '<strong>Dirección N° ' + parseInt(i + 1) + '</strong></h5><br/>' +
                                        '<ul class="icon-list list-space product-info-list">' +
                                            '<li><i class="fa fa-map-marker"></i>' + direcciones[i].calle + ' #' + direcciones[i].numero + '</li>' +
                                            '<li><i class="fa fa-phone-square"></i>' + descomponerTelefonos(direcciones[i].telefonos) + '</li>' +
                                            '<li><i class="fa fa-envelope"></i> ' + descomponerEmails(direcciones[i].emails) + '</li>' +
                                        '</ul>' +
                                    '</div>' +
                                    '<div class="col-md-7">' +
                                        '<div id="map-' + direcciones[i].id_empresa_direccion + '" style="width: 100%; height: 300px;">' +
                                        '</div>' +
                                    '</div>' +

                                '</div><p class="product-info-price"></p>';

                    html += htmlAux;

                }

                $("#tab-2").html(html);

                for (var i = 0; i < direcciones.length; i++) {

                    var platform = new H.service.Platform({
                        app_id: 'No4B9PM8WkfLBgY5L2my',
                        app_code: 'kcCM6KtFOuiv7csQgw7WBw'
                    });
                    var pixelRatio = window.devicePixelRatio || 1;
                    var defaultLayers = platform.createDefaultLayers({
                        tileSize: pixelRatio === 1 ? 256 : 512,
                        ppi: pixelRatio === 1 ? undefined : 320
                    });

                    //Step 2: initialize a map  - not specificing a location will give a whole world view.
                    var map = new H.Map(document.getElementById('map-'+direcciones[i].id_empresa_direccion),
                      defaultLayers.normal.map, { pixelRatio: pixelRatio });

                    //Step 3: make the map interactive
                    // MapEvents enables the event system
                    // Behavior implements default interactions for pan/zoom (also on mobile touch environments)
                    var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

                    // Create the default UI components
                    var ui = H.ui.UI.createDefault(map, defaultLayers);

                    console.log(direcciones[i]);
                    var parisMarker = new H.map.Marker({ lat: parseFloat(direcciones[i].latitud), lng: parseFloat(direcciones[i].longitud) });
                    map.setZoom(15);
                    map.addObject(parisMarker);
                    map.setCenter({ lat: direcciones[i].latitud, lng: direcciones[i].longitud });

                    //var latlon = new google.maps.LatLng(parseFloat(direcciones[i].latitud), parseFloat(direcciones[i].longitud));
                    //var myOptions = {
                    //    zoom: 17,
                    //    scrollwheel: false,
                    //    center: latlon, /* Definimos la posicion del mapa con el punto */
                    //    mapTypeId: google.maps.MapTypeId.ROADMAP
                    //}; /*Configuramos una serie de opciones como el zoom del mapa y el tipo.*/
                    //map = new google.maps.Map($("#map-canvas-" + direcciones[i].id_empresa_direccion).get(0), myOptions);

                    //var coorMarcador = new google.maps.LatLng(parseFloat(direcciones[i].latitud), parseFloat(direcciones[i].longitud)); /Un nuevo punto con nuestras coordenadas para el marcador (flecha) */

                    //var func = "getDir('"+parseFloat(direcciones[i].latitud)+"', '"+parseFloat(direcciones[i].longitud)+"')";
                    //debugger;
                    //var contentString = '<div id="content">'+
                    //  '<div id="siteNotice">'+
                    //  '</div>'+
                    //  '<p style="font-weight:bold;">'+nombre+'</p>'+
                    //  '<p>'+direcciones[i].calle + ' #' + direcciones[i].numero+'</p>'+
                    //  '<a style="cursor:pointer;" onClick="'+func+'">Como Llegar</a>'+
                    //  '</div>';


                    //var marcador = new google.maps.Marker({
                    //    /*Creamos un marcador*/
                    //    position: coorMarcador, /*Lo situamos en nuestro punto */
                    //    map: map, /* Lo vinculamos a nuestro mapa */
                    //    title: direcciones[i].calle + ' #' + direcciones[i].numero
                    //});

                    //marcador.info = new google.maps.InfoWindow({
                    //    content: contentString
                    //});

                    ////var marker_map = marcador.getMap();
                    ////marcador.info.open(marker_map, marcador);
                    ////map.setCenter(marcador.getPosition());

                    ////infowindow.open(map,marcador);
                    ////map.setCenter(infowindow.getPosition());



                    //google.maps.event.addListener(marcador, 'click', function() {  
                    //    var marker_map = this.getMap();
                    //    this.info.open(marker_map, this);
                    //});
                    //google.maps.event.trigger( marcador, 'click' );




                    //marcador.info.open(map, marcador); 

                }


            }

            var directionsService;
            var directionsDisplay;

            function getDir(lat, lon) {

                var geocoder = new google.maps.Geocoder();

                var pos = null;

                if (navigator.geolocation) 
                {
                    navigator.geolocation.getCurrentPosition(function(position) {

                        window.open("https://www.google.cl/maps/dir/"+position.coords.latitude+","+position.coords.longitude+"/"+lat+","+lon+"/@"+position.coords.latitude+","+position.coords.longitude+",16z");

                    }, function() {
                        //handleLocationError(true, infoWindow, map.getCenter());
                        console.log("no getCurrentPosition");
                    });
                } 
                else {
                    // Browser doesn't support Geolocation
                    //handleLocationError(false, infoWindow, map.getCenter());
                    console.log("no navigator.geolocation");
                }
                
                
            }


            function CargarImagenes(imagenes)
            {

                if(imagenes == null) return;
                var arr = new Array();
                for (var i = 0; i < imagenes.length; i++) {

                    var arr2 = new Array();

                    arr2["img"] = imagenes[i].url_imagen;
                    //arr2["thumb"] = "/portal/"+imagenes[i].url_imagen;
                    //arr2["caption"] = "dasdasdas";
                    arr.push(arr2);

                }

                var fotorama = $('.fotorama').data('fotorama');
                fotorama.load(arr);
            }

        </script>
    </div>
</body>
</html>