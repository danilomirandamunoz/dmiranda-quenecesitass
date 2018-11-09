<!DOCTYPE html>
<html>
<head>
<title>¿Qué Necesitas?</title>
<meta property="og:title" content="¿Qué Necesitas?" />
    <meta property="og:description" content="Página dedicada a la búsqueda de Locales Comerciales y Productos." />
    <meta property="og:image" content="<?php echo $this->config->item('base_url');?>portal/img/earth_scan.png" />
    <meta property="og:url" content="http://www.quenecesitas.cl/" />
    <?php $this->load->view('head');?>
</head>
<body class="">
        <?php $this->load->view('loader');?>
    <div class="global-wrap">
             <?php $this->load->view('header');?> 
        <!-- SEARCH AREA -->
       <!-- SEARCH AREA -->
<form class="search-area form-group">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 clearfix">
                        <label>
                            <i class="fa fa-search"></i><span></span>
                        </label>
                        <div class="search-area-division search-area-division-input">
                            <input class="form-control" type="text" placeholder="¿Qué Necesitas?" id="txtParametroBusqueda" />
                        </div>
                    </div>
                    <div class="col-md-3 clearfix">
                        <label>
                            <i class="fa fa-map-marker"></i><span></span>
                        </label>
                        <div class="search-area-division search-area-division-location">
                            <input id="txtBuscarComuna" class="form-control autocompleteComuna" type="text" placeholder="¿Dónde?"
                                data-provide="typeahead" data-items="4">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-block btn-white search-btn" type="button" id="btnBuscar">
                            Buscar
                       
                        </button>
                        <input type="hidden" id="hdnBuscador" />
                    </div>
                </div>
            </div>
        </form>
        <!-- END SEARCH AREA -->
        <!-- END SEARCH AREA -->
        <div class="gap-small">
        </div>
        <!-- //////////////////////////////////
        //////////////PAGE CONTENT/////////////
        ////////////////////////////////////-->
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <aside class="sidebar-left">
                        <ul class="nav nav-tabs nav-stacked nav-coupon-category filter-area" id="lstCategoriasDisponibles"></ul>
                        <input type="hidden" id="hdnIDCategoria" />
                        <input type="hidden" id="hdnCategoria" />

                    </aside>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-2 col-md-offset-7">
                        </div>
                    </div>
                    <div class="row row-wrap" id="contenedorEmpresas">
                    </div>
                    <div class="row row-wrap" id="contendorPaginador" style="text-align: center;">
                        <ul id="pagination-demo" class=""></ul>
                    </div>
                    <div class="gap">
                    </div>
                </div>
               
                <div class="gap">
                </div>
            </div>
        </div>
 
        <?php $this->load->view('footer');?>



       
        
        <script type="text/javascript">

            var numeroVisiblePaginas = 3;




            //App.bloquearPantalla();

            $(function ()
            {



                setTimeout(function ()
                {

                    cargaInicial();
                    //App.desbloquearPantalla();

                }, 100);





            });

            function cargaInicial()
            {

                $(window).resize(function ()
                {

                    var estilo = $(".filter-area").css("display");

                    if (estilo == "block") {
                        //CargarCategoriasDisponibles();
                    }
                });


                var estilo = $(".filter-area").css("display");

                if (estilo == "block") {
                    CargarCategoriasDisponibles();
                }


                //ObtenerMejoresValoradas();
                $("#hdnIDCategoria").val(0);

                var accion = '<?php echo $accion ?>';
                debugger;
                if (accion == "busqueda") {
                    var comuna = '<?php echo $place ?>';
                    var param = '<?php echo $param ?>';
                    comuna = comuna.replace("#", "");

                    $("#txtParametroBusqueda").val(param);
                    $("#txtBuscarComuna").val(comuna);
                    $(".categorias").removeClass("active");

                    BuscarEmpresas(1, true, false);
                }
                else {
                    CargarEmpresasCategoria(0,null,1, true,false);
                    $(".categorias").removeClass("active");
                    $("#contenedorEmpresas").html('<div class="alert alert-info" role="alert"><strong>¿Qué estás buscando? ¿Algún artículo en específico? </strong> Ingresa tu búsqueda y descubre lo que tenemos para tí. </div>');
                }




                $("#btnBuscar").click(function ()
                {
                    $(".categorias").removeClass("active");
					BuscarEmpresas(1, true, true)
                });
            }





            function BuscarEmpresas(pagina, buscador, loader)
            {
                var data =
                {
                    "parametroBusqueda": $("#txtParametroBusqueda").val(),
                    "comuna": $("#txtBuscarComuna").val(),
                    "pagina": pagina
                };
                $("#hdnBuscador").val(buscador);
           

                App.ejecutarAjax(data, "<?php echo $this->config->item('base_url');?>portal/home/BuscarEmpresasBuscador", ExitoBuscarEmpresas, ErrorBuscarEmpresas, loader);
    
            }


            function ExitoBuscarEmpresas(data)
            {
        		var html = '<div class="alert alert-info" role="alert"><strong>Hemos encontrado ' + data.CantidadRegistros + ' Registros para tu búsqueda. </strong> </div>';
                if (data.codigo == 0) {

                    html = data.data;
                    var buscador = $("#hdnBuscador").val();
                    if (buscador == "true") {
                        $('#pagination-demo').remove();

                        if (data.CantidadRegistros > 0) {

                            $("#contendorPaginador").append('<ul id="pagination-demo" class=""></ul>');

                            $('#pagination-demo').twbsPagination({
                                totalPages: Math.ceil(parseInt(data.CantidadRegistros) / data.CantidadRegistrosPorPagina),
                                visiblePages: numeroVisiblePaginas,
                                onPageClick: function (event, page)
                                {
                                    BuscarEmpresas(parseInt(page), false, true);
                                }
                            });
                        }
                        else {
                            html = '<div class="alert alert-info" role="alert"><strong>Ups!</strong> No se han encontrado resultados para tu búsqueda.</div>';
                        }

                        // if (data.CantidadRegistros > 0) {

                        //     Command: toastr["success"]("Se han encontrado " + data.CantidadRegistros + " Registros.", "Resultados Obtenidos")
                        // }
                        // else
                        // {
                        //     Command: toastr["error"]("No se han encontrado resultados para tu búsqueda.", "Resultados Obtenidos")
                        // }
                    }
                    else {

                    }

                    $("#contenedorEmpresas").html(html);
                }
                else {
                    App.MensajeAlerta(data.error, "Resultado Operaci&oacute;n");
                }
                
            }

            function ErrorBuscarEmpresas()
            {
            	App.MensajeAlerta("Ha ocurrido un error. Intente Nuevamente", "Resultado Operaci&oacute;n");

            }

            



            function CargarCategoriasDisponibles()
            {

                App.ejecutarAjax(null, "<?php echo $this->config->item('base_url');?>portal/home/CargarCategoriasDisponibles", ExitoCategoria, ErrorCategoria);


            }

            function ExitoCategoria(data)
            {
            	debugger;
            	
            	if (data.codigo == 0) 
            	{

                    $("#lstCategoriasDisponibles").html(data.data);
                }
                else 
                {
                    App.MensajeAlerta(data.error, "Resultado Operaci&oacute;n");
                }
            }

            function ErrorCategoria()
            {
            	App.MensajeAlerta("Ha ocurrido un error. Intente Nuevamente", "Resultado Operaci&oacute;n");
            }





            function CargarEmpresasCategoria(idCategoria, obj, pagina, categoria, loader)
            {

                $("#txtParametroBusqueda").val("");
                $("#txtBuscarComuna").val("");
        		pagina = pagina || 1;

                    if (categoria) {
                        pagina = parseInt(1);
                    }

                    if (obj != null) {
                        $(".categorias").removeClass("active");

                        $("#categoria" + idCategoria).addClass("active");
                    }

                $("#hdnIDCategoria").val(idCategoria);
                $("#hdnCategoria").val(categoria);

        		var data =
                    {
                        "idCategoria": idCategoria,
                        "pagina": pagina
                    };

   
        		App.ejecutarAjax(data, "<?php echo $this->config->item('base_url');?>portal/home/CargarEmpresasCategoria", ExitoEmpresasCategoria, ErrorEmpresasCategoria, loader);
            	
        	}

            function ErrorEmpresasCategoria()
            {
				App.MensajeAlerta("Ha ocurrido un error. Intente Nuevamente", "Resultado Operaci&oacute;n");
            }


            function ExitoEmpresasCategoria(data)
            {
            	debugger;
            	if (data.codigo == 0) {
                    var html = '';

                    html = data.data;
                    var categoria = $("#hdnCategoria").val();
                    if (categoria == "true") {

                        $('#pagination-demo').remove();

                        if (data.CantidadRegistros > 0) {
                            $("#contendorPaginador").append('<ul id="pagination-demo" class=""></ul>');

                            $('#pagination-demo').twbsPagination({
                                totalPages: Math.ceil(parseInt(data.CantidadRegistros) / data.CantidadRegistrosPorPagina),
                                visiblePages: numeroVisiblePaginas,
                                onPageClick: function (event, page)
                                {
                                    CargarEmpresasCategoria(parseInt($("#hdnIDCategoria").val()), null, parseInt(page), false, true);
                                }
                            });
                        }
                        else {
                            html = '<div class="alert alert-info" role="alert"><strong>Ups!</strong> No se han encontrado resultados para tu búsqueda.</div>';
                        }

                        // if (data.CantidadRegistros > 0) {

                        //     Command: toastr["success"]("Se han encontrado " + data.CantidadRegistros + " Registros.", "Resultados Obtenidos")
                        // }
                        // else {
                        //     Command: toastr["error"]("No se han encontrado resultados para tu búsqueda.", "Resultados Obtenidos")
                        // }

                        //App.MensajeAlerta("Se han encontrado " + data.CantidadRegistros + " Registros.", "Resultado Obtenidos");
                    }
                    else {

                    }


                    $("#contenedorEmpresas").html(html);



                }
                else {
                    App.MensajeAlerta(data.error, "Resultado Operaci&oacute;n");
                }
            }


            

        </script>
    </div>
</body>
</html>