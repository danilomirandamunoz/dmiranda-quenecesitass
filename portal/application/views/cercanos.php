<?php

?>

<!DOCTYPE html>
<html>
<?php $this->load->view('head');?>
<body class="">

    <?php $this->load->view('loader');?>

    <div class="global-wrap">
        <?php $this->load->view('header');?>
        <form class="search-area form-group">
            <div class="container">
                <div class="row">
                    <div class="col-md-11 clearfix">
                        <label>
                            <i class="fa fa-search"></i><span></span>
                        </label>
                        <div class="search-area-division search-area-division-input">
                            <input class="form-control" type="text" placeholder="Ingresa tu búsqueda" id="txtParametroBusqueda" />
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-block btn-white search-btn" type="button" id="btnBuscar">
                            Buscar
                       
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <!-- //////////////////////////////////
        //////////////PAGE CONTENT/////////////
        ////////////////////////////////////-->
        <div class="gap-small">
        </div>
        <div class="container">
            <div class="row">

                <div class="col-md-12">

                    <h1>Los locales más cercanos</h1>
                    <p>Encuentra los locales mas cercanos a tu posición, de acuerdo a tu filtro de búsqueda.</p>
                </div>

                <div class="col-md-12">
                    <div id="map" style="width: 100%; height: 400px; background: grey" />
                </div>

                <div class="gap">
                </div>
            </div>

        </div>
        <?php $this->load->view('footer');?>
        <script type="text/javascript">
            //App.bloquearPantalla();








            /**
             * Boilerplate map initialization code starts below:
             */

            //Step 1: initialize communication with the platform
            var platform = new H.service.Platform({
                app_id: 'No4B9PM8WkfLBgY5L2my',
                app_code: 'kcCM6KtFOuiv7csQgw7WBw',
                useHTTPS: true
            });
            var pixelRatio = window.devicePixelRatio || 1;
            var defaultLayers = platform.createDefaultLayers({
                tileSize: pixelRatio === 1 ? 256 : 512,
                ppi: pixelRatio === 1 ? undefined : 320
            });

            //Step 2: initialize a map  - not specificing a location will give a whole world view.
            var map = new H.Map(document.getElementById('map'),
              defaultLayers.normal.map, { pixelRatio: pixelRatio });

            //Step 3: make the map interactive
            // MapEvents enables the event system
            // Behavior implements default interactions for pan/zoom (also on mobile touch environments)
            var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

            // Create the default UI components
            var ui = H.ui.UI.createDefault(map, defaultLayers);

            // Now use the map as required...


            $(function ()
            {

                CargarPosicionActual();


                $("#btnBuscar").click(function ()
                {
                    App.bloquearPantalla();
                    $(".categorias").removeClass("active");

                    setTimeout(function ()
                    {
                        CargarDirecciones();

                    }, 100);

                });





            });



            var infowindow = null;

            function CargarPosicionActual()
            {

                if (navigator.geolocation)
                {
                    navigator.geolocation.getCurrentPosition(function (position)
                    {
                        var parisMarker = new H.map.Marker({ lat: parseFloat(position.coords.latitude), lng: parseFloat(position.coords.longitude) });
                        map.setZoom(15);
                        map.addObject(parisMarker);
                        map.setCenter({ lat: parseFloat(position.coords.latitude), lng: parseFloat(position.coords.longitude) });


                    }, function (error)
                    {

                        //handleLocationError(true, infoWindow, map.getCenter());
                        switch (error.code)
                        {
                            case error.PERMISSION_DENIED:
                                console.log("User denied the request for Geolocation.");
                                break;
                            case error.POSITION_UNAVAILABLE:
                                console.log("Location information is unavailable.");
                                break;
                            case error.TIMEOUT:
                                console.log("The request to get user location timed out.");
                                break;
                            case error.UNKNOWN_ERROR:
                                console.log("An unknown error occurred.");
                                break;
                        }
                    });
                }
                else
                {
                    // Browser doesn't support Geolocation
                    //handleLocationError(false, infoWindow, map.getCenter());

                    console.log("no navigator.geolocation");
                }
            }

            var posicion_actual_lat;
            var posicion_actual_lon;


            function CargarDirecciones()
            {

                if (navigator.geolocation)
                {
                    navigator.geolocation.getCurrentPosition(function (position)
                    {

                        posicion_actual_lat = position.coords.latitude;
                        posicion_actual_lon = position.coords.longitude;

                        //aca debo buscar las direcciones que se encuentren cerca de mi posicion actual
                        var data =
                        {
                            "param": $("#txtParametroBusqueda").val(),
                            "comuna": "",
                            "latitud": position.coords.latitude,
                            "longitud": position.coords.longitude

                        };

                        App.ejecutarAjax(data, "<?php echo $this->config->item('base_url');?>portal/cercanos/busqueda", ExitoCargarDirecciones, ErrorCargarDirecciones);

                    }, function (error)
                    {
                        //handleLocationError(true, infoWindow, map.getCenter());
                        switch (error.code)
                        {
                            case error.PERMISSION_DENIED:
                                console.log("User denied the request for Geolocation.");
                                break;
                            case error.POSITION_UNAVAILABLE:
                                console.log("Location information is unavailable.");
                                break;
                            case error.TIMEOUT:
                                console.log("The request to get user location timed out.");
                                break;
                            case error.UNKNOWN_ERROR:
                                console.log("An unknown error occurred.");
                                break;
                        }
                    });
                }
                else
                {
                    // Browser doesn't support Geolocation
                    //handleLocationError(false, infoWindow, map.getCenter());
                    console.log("no navigator.geolocation");
                }

            }

            function ErrorCargarDirecciones()
            {

            }

            function ExitoCargarDirecciones(data)
            {
                debugger;
                if (data.codigo == 0)
                {
                    var parisMarker = new H.map.Marker({ lat: parseFloat(posicion_actual_lat), lng: parseFloat(posicion_actual_lon) });
                    map.setZoom(15);
                    map.addObject(parisMarker);
                    map.setCenter({ lat: parseFloat(posicion_actual_lat), lng: parseFloat(posicion_actual_lon) });


                    for (var i = 0; i < data.data.length; i++)
                    {

                        var marcador = new H.map.Marker({ lat: parseFloat(data.data[i].lat), lng: parseFloat(data.data[i].lng) });
                        map.setZoom(15);
                        map.addObject(marcador);

                    }

                }
                else
                {
                    App.MensajeAlerta(data.error, "Resultado Operación");
                }
                App.desbloquearPantalla();
            }

            function gotodir(url)
            {
                window.open(url);
            }


        </script>
    </div>
</body>
</html>
