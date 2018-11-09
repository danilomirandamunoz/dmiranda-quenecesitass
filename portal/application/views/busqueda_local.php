<!-- SEARCH AREA -->
<form class="search-area form-group">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 clearfix">
                        <label>
                            <i class="fa fa-search"></i><span></span>
                        </label>
                        <div class="search-area-division search-area-division-input">
                            <input class="form-control txtBuscarGeneral" type="text" placeholder="¿Qué Necesitas?" id="txtParametroBusqueda" />
                        </div>
                    </div>
                    <div class="col-md-3 clearfix">
                        <label>
                            <i class="fa fa-map-marker"></i><span></span>
                        </label>
                        <div class="search-area-division search-area-division-location">
                            <input id="txtBuscarComuna" class="form-control autocompleteComuna lstBuscarGeneral" type="text" placeholder="¿Dónde?"
                                data-provide="typeahead" data-items="4">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-block btn-white search-btn btnBuscarGeneral" type="button" id="btnBuscar">
                            Buscar
                       
                        </button>
                        <input type="hidden" id="hdnBuscador" />
                    </div>
                </div>
            </div>
        </form>
        <!-- END SEARCH AREA -->