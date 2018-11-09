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
        <?php include('menu.php');?>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                        <h3 class="page-title">Información Personal
                        </h3>
                        <ul class="page-breadcrumb breadcrumb">
                            <li><i class="fa fa-home"></i><a href="/admin/home">Inicio</a> <i class="fa fa-angle-right"></i></li>
                            <li><a href="/admin/empresas">Listado Empresas</a> <i class="fa fa-angle-right"></i></li>
                            <li><a>Empresa</a> </li>
                        </ul>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                <!-- END PAGE HEADER-->
                <!-- BEGIN PAGE CONTENT-->
                <div class="row">
                    <div class="col-md-12">
                        <!--BEGIN TABS-->
                        <div class="tabbable tabbable-custom tabbable-full-width">

                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1_3" data-toggle="tab">Empresa</a> </li>
                            </ul>
                            <div class="tab-content">
                                <!--tab_1_2-->
                                <div class="tab-pane active" id="tab_1_3">
                                    <div class="row profile-account">
                                        <div class="col-md-3">
                                            <ul class="ver-inline-menu tabbable margin-bottom-10">
                                                <li class="active"><a data-toggle="tab" href="#tab_1-1"><i class="fa fa-cog"></i>Información
                                                    Básica </a><span class="after"></span></li>
                                                <li ><a data-toggle="tab" href="#tab_2-2" id="tabDirecciones" <?php echo !$existe? 'style="display:none;"':''  ?> ><i class="fa fa-map-marker"></i>Direcciones
                                                </a></li>
                                                <li class=""><a data-toggle="tab" href="#tab_3-3" id="tabTags" <?php echo !$existe? 'style="display:none;"':''  ?> ><i class="fa fa-lock"></i>Tags </a>
                                                </li>
                                                <li class=""><a data-toggle="tab" href="#tab_4-4" id="tabImagenes" <?php echo !$existe? 'style="display:none;"':''  ?>><i class="fa fa-picture-o"></i>Imágenes
                                                </a></li>
                                                <li class=""><a data-toggle="tab" href="#tab_5-5" id="tabProductos" <?php echo !$existe? 'style="display:none;"':''  ?>><i class="fa fa-shopping-cart"></i>Productos
                                                </a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="tab-content">
                                                <div id="tab_1-1" class="tab-pane active">
                                                    <form role="form" id="frmInformacion">
                                                         <div class="form-group" id="divUrlRedesSociales" style="<?php echo $existe? '':'display:none' ?>">
                                                            <label class="control-label">
                                                                Url Redes Sociales</label>
                                                            <input type="text" name="codigo" id="txtUrlRedesSociales" disabled="disabled" class="form-control" value="<?php echo $existe? $urlRedesSociales :''?>" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                Categor&iacute;a</label>
                                                            <select id="ddlCategoria" class="form-control" name="ddlCategoria" required>
                                                                <option value="">-- Seleccione --</option>
                                                                <?php
                                                                $cats = $categorias;
                                                                
                                                                foreach ($cats as $row) {
                                                                ?>
                                                                <option <?php echo $existe? ($empresa->id_categoria == $row["id_categoria"]? 'selected':''):'' ?> value="<?php echo $row["id_categoria"]?>"><?php echo $row["nombre"]?></option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                Nombre</label>
                                                            <input type="text" placeholder="Nombre" name="txtNombre" maxlength="100" required id="txtNombre" <?php echo $existe? 'disabled': ''; ?> value="<?php echo $existe? $empresa->nombre: ''; ?>" class="form-control"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                Descripcion Corta</label>
                                                            <textarea id="txtDescripcionCorta" placeholder="Descripcion Corta" name="txtDescripcionCorta" required class="form-control campoTextarea" maximo="256" style="margin: 0px; height: 60px;"><?php echo $existe? $empresa -> descripcion_corta: ''; ?></textarea>
                                                        </div>
                                                        <!-- <div class="form-group">
                                                            <label class="control-label">
                                                                Descripcion Larga</label>
                                                            <textarea id="txtDescripcionLarga" placeholder="Descripcion Larga" name="txtDescripcionLarga" required class="form-control campoTextarea" maximo="4000" style="margin: 0px; height: 206px;"><?php echo $existe? $empresa -> descripcion_larga: ''; ?></textarea>
                                                        </div> -->
                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                URL Facebook</label>
                                                            <input type="text" placeholder="URL Facebook" name="txtUrlFacebook" id="txtUrlFacebook" value="<?php echo $existe? $empresa -> url_facebook: ''; ?>" class="form-control" maxlength="100" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                URL Twitter</label>
                                                            <input type="text" placeholder="URL Twitter" name="txtUrlTwitter" id="txtUrlTwitter" value="<?php echo $existe? $empresa -> url_twitter: ''; ?>" class="form-control" maxlength="100"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                URL Instagram</label>
                                                            <input type="text" placeholder="URL Instagram" name="txtUrlInstagram" id="txtUrlInstagram" value="<?php echo $existe? $empresa -> url_instagram: ''; ?>" class="form-control" maxlength="100"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">
                                                                Vigente</label>
                                                            <select id="ddlVigenteEmpresa" class="form-control" name="ddlVigenteEmpresa" required>
                                                                <option value="" <?php echo $existe? 'selected="selected"' : ''; ?>>-- Seleccione --</option>
                                                                <option value="1" <?php echo $existe? $empresa -> vigente == 1 ? 'selected="selected"':'': ''; ?> >Si</option>
                                                                <option value="0" <?php echo $existe? $empresa -> vigente == 0 ? 'selected="selected"':'': ''; ?>>No</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group" style="<?php echo !$existe?'display:none;':'' ?>">
                                                            <label class="control-label">
                                                                Imagen Actual (800x600)</label>
                                                            <input type="text" style="display: none;" name="imagenActual" id="txtimagenActualEmpresa" value='<?php echo $existe?$empresa->url_imagen: $this->config->item('base_url') ?>'>
                                                            <img style="max-width: 300px" src='<?php echo $existe? $empresa->url_imagen:$this->config->item('base_url').'admin/img/no-image.gif' ?>'>
                                                        </div>
                                                        <div class="form-group" style="<?php echo !$existe?'display:none;':'' ?>">
                                                            <label class="control-label">
                                                                Cambiar Imagen</label>
                                                            <input type="checkbox" name="cambiarImagen" id="chkCambiarImagen" value="true" />
                                                        </div>
                                                        <div id="divCambiarImagenEmpresa" class="form-group" style="<?php echo $existe?'display:none;':'' ?>">
                                                            <label class="control-label">
                                                                Cargar Imagen (800x600)</label>
                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                                    <img src="<?php echo $this->config->item('base_url');?>admin/img/no-image.gif" alt="">
                                                                </div>
                                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                                                </div>
                                                                <div>
                                                                    <span class="btn default btn-file"><span class="fileupload-new"><i class="fa fa-paper-clip"></i>Seleccione una Imagen </span><span class="fileupload-exists"><i class="fa fa-undo"></i>Cambiar
                                                                    </span>
                                                                        <input type="file" class="default" name="fileImage" id="fileImageEmpresa">
                                                                    </span><a href="#" id="btnQuitarImagenPrincipal" class="btn red fileupload-exists" data-dismiss="fileupload"><i
                                                                        class="fa fa-trash-o"></i>Quitar</a>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="margiv-top-10">
                                                            <button type="button" class="btn green" id="btnGuardarInformacionBasica" name="btnGuardarInformacionBasica">
                                                                <i class="fa fa-check"></i>Guardar</button>
                                                        </div>
                                                        <input type="hidden" id="hdnEmpresa" value="<?php echo $idEmpresa; ?>" />
                                                    </form>
                                                </div>
                                                <div id="tab_2-2" class="tab-pane">
                                                    <div class="portlet box blue">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class="fa fa-globe"></i>Listado de Direcciones
                                                            </div>
                                                            <div class="tools">
                                                                <a href="javascript:;" class="collapse"></a>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <table class="table table-striped table-bordered table-hover" id="tblDirecciones">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Calle
                                                                        </th>
                                                                        <th>N&uacute;mero
                                                                        </th>
                                                                        <th class="hidden-tablet hidden-phone">Región
                                                                        </th>
                                                                        <th class="hidden-tablet hidden-phone">Comuna
                                                                        </th>
                                                                        <th>Acciones
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    
                                                                    if($empresa != null)
                                                                    {
                                                                        if($direcciones!= null)
                                                                        {
                                                                        for ($i = 0; $i < count($direcciones); $i++)
                                                                        {
                                                                    ?>
                                                                    <tr class="odd gradeX">
                                                                        <td><?php echo $direcciones[$i]['calle'];?>
                                                                        </td>
                                                                        <td class="center"><?php echo $direcciones[$i]['numero']; ?>
                                                                        </td>
                                                                        <td class="center"><?php echo $direcciones[$i]['region_nombre']; ?>
                                                                        </td>
                                                                        <td class="center"><?php echo $direcciones[$i]['comuna_nombre']; ?>
                                                                        </td>
                                                                        <td class="center">
                                                                            <a class="btn btn-info" onclick="javascript:AbrirModalDirecciones('<?php echo crearParametroUrl($direcciones[$i]['id_empresa_direccion']);?>');">
                                                                                <i class="fa fa-edit"></i></a><a class="btn btn-danger" href="javascript:ConfirmarEliminarEmpresaDireccion('<?php echo crearParametroUrl($direcciones[$i]['id_empresa_direccion']);?>')">
                                                                                    <i class="fa fa-trash-o"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php }
                                                                        }
                                                                    }?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions right">
                                                        <button type="button" class="btn green" id="btnNuevaDireccion">
                                                            Nueva Dirección</button>
                                                    </div>

                                                </div>
                                                <div id="tab_3-3" class="tab-pane">
                                                    <div class="portlet box blue">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class="fa fa-globe"></i>Listado de Tags
                                                            </div>
                                                            <div class="tools">
                                                                <a href="javascript:;" class="collapse"></a>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <table class="table table-striped table-bordered table-hover" id="tblTags">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nombre
                                                                        </th>
                                                                        <th>Acciones
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    if($empresa != null)
                                                                    {
                                                                        if($tags != null)
                                                                        {

                                                                      
                                                                        for ($i = 0; $i < count($tags); $i++){
                                                                    ?>
                                                                    <tr class="odd gradeX">
                                                                        <td><?php echo $tags[$i]['nombre'];?>
                                                                        </td>
                                                                        <td class="center">
                                                                            <a class="btn btn-danger" href="javascript:ConfirmarEliminarEmpresaTag('<?php echo crearParametroUrl($tags[$i]['id_empresa_tag']); ?>')">
                                                                                <i class="fa fa-trash-o"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php }
                                                                      }
                                                                    }?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions right">
                                                        <button type="button" class="btn green" id="btnNuevoTag">
                                                            Nuevo Tag</button>
                                                    </div>
                                                </div>
                                                <div id="tab_4-4" class="tab-pane">
                                                    <div class="portlet box blue">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class="fa fa-globe"></i>Listado de Imágenes
                                                            </div>
                                                            <div class="tools">
                                                                <a href="javascript:;" class="collapse"></a>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <table class="table table-striped table-bordered table-hover" id="tblImagenes">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Imagen
                                                                        </th>
                                                                        <th>Acciones
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    if($empresa != null)
                                                                    {
                                                                        if($imagenes != null)
                                                                        {

                                                                       
                                                                        for ($i = 0; $i < count($imagenes); $i++){
                                                                      
                                                                    ?>
                                                                    <tr class="odd gradeX">
                                                                        <td class="center">
                                                                            <img src="<?php echo $imagenes[$i]['url_imagen']; ?>" width="100px" height="auto">
                                                                        </td>
                                                                        <td class="center">
                                                                            <a class="btn btn-danger" href="javascript:ConfirmarEliminarEmpresaImagen('<?php echo CrearParametroUrl($imagenes[$i]['id_empresa_imagen']); ?>')">
                                                                                <i class="fa fa-trash-o"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php }
                                                                     }
                                                                    }?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions right">
                                                        <button type="button" class="btn green" id="btnNuevaImagen">
                                                            Nueva Imagen</button>
                                                    </div>
                                                </div>
                                                <div id="tab_5-5" class="tab-pane">
                                                    <div class="portlet box blue">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class="fa fa-globe"></i>Listado de Productos
                                                            </div>
                                                            <div class="tools">
                                                                <a href="javascript:;" class="collapse"></a>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <table class="table table-striped table-bordered table-hover" id="tblProductos">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nombre Producto
                                                                        </th>
                                                                        <th>Imagen
                                                                        </th>
                                                                        <th>Acciones
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    if($empresa != null)
                                                                    {
                                                                        if($productos != null)
                                                                        {

                                                                       
                                                                        for ($i = 0; $i < count($productos); $i++){
                                                                    ?>
                                                                    <tr class="odd gradeX">
                                                                        <td class="center">
                                                                            <?php echo $productos[$i]['nombre']; ?>
                                                                        </td>
                                                                        <td class="center">
                                                                        <img src="<?php echo $productos[$i]['imagen']; ?>" width="100px" height="auto">

                                                                        </td>
                                                                        <td class="center">
                                                                            <a class="btn btn-danger" href="javascript:ConfirmarEliminarEmpresaProducto('<?php echo crearParametroUrl($productos[$i]['id_empresa_producto']); ?>')">
                                                                                <i class="fa fa-trash-o"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php }
                                                                     }
                                                                    }?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions right">
                                                        <button type="button" class="btn green" id="btnNuevoProducto">
                                                            Nuevo Producto</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-md-9-->
                                    </div>
                                </div>
                                <!--end tab-pane-->
                            </div>
                        </div>
                        <!--END TABS-->
                    </div>
                    <div id="mdlDirecciones" class="modal fade" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    </button>
                                    <h4 class="modal-title">Dirección</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="scroller" style="height: 500px" data-always-visible="1" data-rail-visible1="1">
                                        <form class="form-horizontal form-row-seperated" role="form" id="frmDireccion">
                                            <div class="form-body" style="width: 99%;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">
                                                        Región</label>
                                                    <div class="col-md-9">
                                                        <select id="ddlRegion" class="form-control" name="ddlRegion" required>
                                                        <option value="">-- Seleccione --</option>
                                                        <?php
                                                                    if($regiones != null)
                                                                    {
                                                                        for ($i = 0; $i < count($regiones); $i++)
                                                                        {
                                                        ?>
                                                                            <option value="<?php echo $regiones[$i]['id_region']; ?>"> <?php echo $regiones[$i]['nombre']; ?></option>
                                                        <?php
                                                                        }
                                                                    }
                                                        ?>


                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">
                                                        Comuna</label>
                                                    <div class="col-md-9">
                                                        <select id="ddlComuna" class="form-control" name="ddlComuna" required>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">
                                                        Calle</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="txtCalle" name="txtCalle" required maxlength="100">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">
                                                        N&uacute;mero</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="txtNumero" name="txtNumero" required maxlength="10">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">
                                                        Departamento</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="txtDepartamento" name="txtDepartamento" maxlength="10">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">
                                                        Piso</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="txtPiso" name="txtPiso" maxlength="10">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">
                                                        Emails</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="txtEmails" name="txtEmails" maxlength="100">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">
                                                        Tel&eacute;fonos</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="txtTelefonos" name="txtTelefonos" maxlength="100">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">
                                                        Latitud</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="txtLatitud" name="txtLatitud" maxlength="20">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">
                                                        Longitud</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="txtLongitud" name="txtLongitud" maxlength="20">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <br />
                                        <br />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn default" id="btnCancelarDireccion">
                                        Cancelar
                                    </button>
                                    <button type="button" class="btn green" id="btnGuardarDireccion">
                                        Guardar
                                    </button>
                                </div>
                                <input type="hidden" id="hdnidEmpresaDireccion" />
                            </div>
                        </div>
                    </div>
                    <div id="mdlTags" class="modal fade" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    </button>
                                    <h4 class="modal-title">Tags</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="scroller" style="height: 100px" data-always-visible="1" data-rail-visible1="1">
                                        <form class="form-horizontal form-row-seperated" role="form" id="frmTags">
                                            <div class="form-body" style="width: 99%;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">
                                                        Tag</label>
                                                    <div class="col-md-9">
                                                        <select id="ddlTag" class="form-control" name="tag">
                                                            <option value="" selected="selected">-- Seleccione --</option>
                                                            
                                                            <?php
                                                                    if($tag != null)
                                                                    {
                                                                        for ($i = 0; $i < count($tag); $i++)
                                                                        {
                                                        ?>
                                                                            <option value="<?php echo $tag[$i]['id_tag']; ?>"> <?php echo $tag[$i]['nombre']; ?></option>
                                                        <?php
                                                                        }
                                                                    }
                                                        ?>


                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <br />
                                        <br />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn default" id="btnCancelarTag">
                                        Cancelar
                                    </button>
                                    <button type="button" class="btn green" id="btnGuardarTag">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="mdlImagenes" class="modal fade" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    </button>
                                    <h4 class="modal-title">Imagen</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="scroller" style="height: 300px" data-always-visible="1" data-rail-visible1="1">
                                        <form action="#" role="form" id="formCambiarImagen">
                                            <div class="form-group">
                                                <div id="divCambiarImagen" class="form-group">
                                                    <label class="control-label">
                                                        Nueva Imagen (800x600)</label>
                                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="<?php echo $this->config->item('base_url');?>admin/img/no-image.gif" alt="">
                                                        </div>
                                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                                        </div>
                                                        <div>
                                                            <span class="btn default btn-file"><span class="fileupload-new"><i class="fa fa-paper-clip"></i>Seleccione una Imagen </span><span class="fileupload-exists"><i class="fa fa-undo"></i>Cambiar </span>
                                                                <input type="file" class="default" id="fileImage" name="fileImage">
                                                            </span><a id="btnQuitarImagenSecundaria" href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i
                                                                class="fa fa-trash-o"></i>Quitar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn default" id="Button1">
                                        Cancelar
                                    </button>
                                    <button type="button" class="btn green" id="btnGuardarImagenEmpresa">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div id="mdlProductos" class="modal fade" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    </button>
                                    <h4 class="modal-title">Productos</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="scroller" style="height: 350px" data-always-visible="1" data-rail-visible1="1">
                                        <form class="form-horizontal form-row-seperated" role="form" id="frmProducto">
                                            <div class="form-body" style="width: 99%;">
                                            <div class="form-group">
                                                            <label class="control-label col-md-3">
                                                                Nombre Producto</label>
                                                            <div class="col-md-9">
                                                                <input type="text" placeholder="Nombre Producto" class="form-control" id="txtNombreProducto" name="txtNombreProducto" required maxlength="100">
                                                            </div>
                                                        </div>
                                    
                                                        <div class="form-group">
                                                            <div id="divCambiarImagen" class="form-group">
                                                                <label class="control-label col-md-3">
                                                                    Nueva Imagen (800x600)</label>
                                                                <div class="fileupload fileupload-new col-md-9" data-provides="fileupload">
                                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <img src="<?php echo $this->config->item('base_url');?>admin/img/no-image.gif" alt="">
                                                                    </div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                                                    </div>
                                                                    <div>
                                                                        <span class="btn default btn-file"><span class="fileupload-new"><i class="fa fa-paper-clip"></i>Seleccione una Imagen </span><span class="fileupload-exists"><i class="fa fa-undo"></i>Cambiar </span>
                                                                            <input type="file" class="default" id="fileProducto" name="fileImage">
                                                                        </span><a id="btnQuitarImagenSecundaria" href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i
                                                                            class="fa fa-trash-o"></i>Quitar</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                            </div>
                                        </form>
                                        <br />
                                        <br />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn default" id="btnCancelarProducto">
                                        Cancelar
                                    </button>
                                    <button type="button" class="btn green" id="btnGuardarProducto">
                                        Guardar
                                    </button>
                                    <input type="hidden" id="hdnidEmpresaProducto" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT-->
            </div>
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
   <?php $this->load->view('footer');?>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        jQuery(document).ready(function () {
            App.init();
            $('#tblDirecciones').dataTable();
            $('#tblTags').dataTable();
            $('#tblImagenes').dataTable();
            $('#tblProductos').dataTable();
            Custom.init();
            FormComponents.init();
            UIBootbox.init();

        });


        function AbrirModalDirecciones(id) {

            if (id != "") {
                $("#hdnidEmpresaDireccion").val(id)
                ObtenerDireccionPorID(id);

            }
            else {

                limpiarCamposDireccion();
                var $modal = $('#mdlDirecciones');
                $modal.modal();
            }
        }


        function AbrirModalProducto(id) {

            if (id != "") {
                $("#hdnidEmpresaProducto").val(id)
                ObtenerProductoPorID(id);

            }
            else {

                limpiarCamposProducto();
                var $modal = $('#mdlProductos');
                $modal.modal();
            }
        }
        
        function limpiarCamposProducto() {
            $("#txtNombreProducto").val("");
            $("#txtDescripcionProducto").val("");
        }


        function limpiarCamposDireccion() {
            $("#ddlRegion").val("");
            CargarComunasPorRegion(0);
            $("#ddlComuna").val("");
            $("#txtCalle").val("");
            $("#txtNumero").val("");
            $("#txtDepartamento").val("");
            $("#txtPiso").val("");
            $("#txtEmails").val("");
            $("#txtTelefonos").val("");
            $("#txtLatitud").val("");
            $("#txtLongitud").val("");
        }

        function AbrirModalTags() {
            var $modal = $('#mdlTags');
            $modal.modal();
        }

        function AbrirModalImagenes() {
            $("#btnQuitarImagenSecundaria").click();
            var $modal = $('#mdlImagenes');
            $modal.modal();
        }

        function ObtenerDireccionPorID(id) {


            var data = {
                "ObtenerDireccionPorID": "ObtenerDireccionPorID",
                "idDireccion": id
            };

            App.ejecutarAjax(
            data,
            "<?php echo $this->config->item('base_url');?>admin/empresas/ObtenerDireccionPorID",
            function (data) {
                if (data.codigo == 0) {

                
                    $("#hdnidEmpresaDireccion").val(data.data.id_empresa_direccion);
                    $("#ddlRegion").val(data.data.id_region);
                    $("#ddlRegion option[value=" + data.data.id_region + "]").prop("selected","selected");
                    CargarComunasPorRegion(data.data.id_region);
                    $("#ddlComuna").val(data.data.id_comuna);
                    $("#txtCalle").val(data.data.calle);
                    $("#txtNumero").val(data.data.numero);
                    $("#txtDepartamento").val(data.data.departamento);
                    $("#txtPiso").val(data.data.piso);
                    $("#txtEmails").val(data.data.emails);
                    $("#txtTelefonos").val(data.data.telefonos);
                    $("#txtLatitud").val(data.data.latitud);
                    $("#txtLongitud").val(data.data.longitud);
                    var $modal = $('#mdlDirecciones');


                    $modal.modal();
                    }
                    else {
                    location.href = data.URL;
                    }

                }
            );
        }

        function CargarComunasPorRegion(idregion) {
            App.bloquearPantalla();
            var data =
            {
                "CargarComunasPorRegion": "CargarComunasPorRegion",
                "idRegion": idregion
            };
            data = $.param(data);

            App.ejecutarAjax(
                    data,
                    "<?php echo $this->config->item('base_url');?>admin/empresas/CargarComunasPorRegion",
                    function (data) {
                        if (data.codigo == 0) {
                            var html = '<option value="">-- Seleccione --</option>';
                            if(data.data != null)
                            {
                                for (var i = 0; i < data.data.length; i++) {
                                var htmlAux = '<option value="' + data.data[i].id_comuna + '">' + data.data[i].nombre + '</option>';
                                html += htmlAux;
                                }
                            }


                            $("#ddlComuna").html(html);
                            }
                            else {
                            App.MensajeAlerta(data.error, "Resultado Operación");
                            }

                        }
                    );
        }

        $(function () {

            $(".controlFecha").datepicker({
                showOn: "button",
                buttonImage: "images/calendar.gif",
                buttonImageOnly: true,
                buttonText: "Seleccionar Fecha"
            });

            //CargarRegiones();
            //CargarComunasPorRegion(0);

            $("#btnNuevaDireccion").click(function () {
                AbrirModalDirecciones("");
            });
            $("#btnNuevoTag").click(function () {
                AbrirModalTags();
            });
            $("#btnNuevaImagen").click(function () {
                AbrirModalImagenes();
            });

            $("#btnNuevoProducto").click(function () {
                AbrirModalProducto("");
            });

            $('#chkCambiarImagen').click(function () {
                var $this = $(this);
                // $this will contain a reference to the checkbox   
                if ($this.is(':checked')) {
                    $("#divCambiarImagenEmpresa").attr('style', 'display:block');
                    $("#btnCambiarImagenEmpresa").attr('style', 'display:block');

                } else {
                    $("#divCambiarImagenEmpresa").attr('style', 'display:none');
                    $("#btnCambiarImagenEmpresa").attr('style', 'display:none');
                }
            });

            $("#ddlRegion").change(function () {
                CargarComunasPorRegion($(this).val());
            });


            jQuery.validator.setDefaults(
            {
                debug: true,
                success: "valid"
            });
            var formProducto = $("#frmProducto");
            var validator = formProducto.validate(
            {
                errorElement: 'span', //default input error message container
                //errorClass: 'help-block', // default input error message class
                errorClass: "alert-danger alert-error",
                focusInvalid: false, // do not focus the last invalid input

            });

            $("#btnGuardarProducto").click(function () {

                if (formProducto.valid()) {

                    var data = new FormData();

                    data.append("nombre", $("#txtNombreProducto").val());
                    data.append("nombreEmpresa", $("#txtNombre").val());
                    data.append("fileImage", document.getElementById("fileProducto").files[0]);
                    data.append("idEmpresa", $("#hdnEmpresa").val());

                    App.ejecutarAjaxFile(
                    data,
                    "<?php echo $this->config->item('base_url');?>admin/empresas/GuardarProducto",
                    function (data) {
                            App.desbloquearPantalla();
                            if (data.codigo == 0) {
                                $("#hdnidEmpresaProducto").val(0);
                                $('#mdlProductos').modal("hide");
                                App.MensajeAlerta("Operación Realizada Exitosamente", "Resultado Operación", RecargarProductos);
                            }
                            else if (data.codigo == 2)
                            {
                                App.MensajeAlerta(data.mensaje, "Resultado Operación");
                            }
                            else {
                                App.MensajeAlerta(data.error, "Resultado Operación");
                            }

                        }
                    );
                }
                else{
                    App.desbloquearPantalla();
                    App.MensajeAlerta("Debe Completar los datos obligatorios", "Error");
                }

            });


            $("#btnGuardarImagenEmpresa").click(function () {

                App.bloquearPantalla();

                if (App.validarObligatorios($("#divCambiarImagen")) == 0) {

                    var data = new FormData();

                    data.append("btnGuardarImagenEmpresa", "btnGuardarImagenEmpresa");
                    data.append("fileImage", document.getElementById("fileImage").files[0]);
                    data.append("idEmpresa", $("#hdnEmpresa").val());
                    data.append("nombre", $("#txtNombre").val());

                    App.ejecutarAjaxFile(
                    data,
                    "<?php echo $this->config->item('base_url');?>admin/empresas/GuardarImagen",
                    function (data) 
                    {
                            App.desbloquearPantalla();
                            if (data.codigo == 0) {
                                $('#mdlImagenes').modal("hide");
                                App.MensajeAlerta("Operación Realizada Exitosamente", "Resultado Operación", RecargarImagenes);
                            }
                            else if (data.codigo == 2)
                            {
                                App.MensajeAlerta(data.mensaje, "Resultado Operación");
                            }
                            else {
                                App.MensajeAlerta(data.error, "Resultado Operación");
                            }

                    }
                    );
                }
                else {
                    App.desbloquearPantalla();
                    App.MensajeAlerta("Debe Completar los datos obligatorios", "Error");
                }
            });

            jQuery.validator.setDefaults(
            {
                debug: true,
                success: "valid"
            });
            var formDireccion = $("#frmDireccion");
            var validator = formDireccion.validate(
            {
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input

            });

            $("#btnGuardarDireccion").click(function () {

                if (formDireccion.valid()) {
                    var data =
                    {
                        "btnGuardarDireccion": "btnGuardarDireccion",
                        "idEmpresaDireccion": $("#hdnidEmpresaDireccion").val(),
                        "region": $("#ddlRegion").val(),
                        "comuna": $("#ddlComuna").val(),
                        "calle": $("#txtCalle").val(),
                        "numero": $("#txtNumero").val(),
                        "departamento": $("#txtDepartamento").val(),
                        "piso": $("#txtPiso").val(),
                        "emails": $("#txtEmails").val(),
                        "telefonos": $("#txtTelefonos").val(),
                        "latitud": $("#txtLatitud").val(),
                        "longitud": $("#txtLongitud").val(),
                        "idEmpresa": $("#hdnEmpresa").val(),
                        "nombreComuna": $("#ddlComuna :selected").text(),
                        "nombreRegion": $("#ddlRegion :selected").text(),
                    };
                    data = $.param(data);

                    App.ejecutarAjax(
                    data,
                    "<?php echo $this->config->item('base_url');?>admin/empresas/GuardarDireccion",
                    function (data) {
                            App.desbloquearPantalla();
                            if (data.codigo == 0) {
                                $("#hdnidEmpresaDireccion").val(0);
                                $('#mdlDirecciones').modal("hide");
                                App.MensajeAlerta("Operación Realizada Exitosamente", "Resultado Operación", RecargarDirecciones);
                            }
                            else if (data.codigo == 2)
                            {
                                App.MensajeAlerta(data.mensaje, "Resultado Operación");
                            }
                            else {
                                App.MensajeAlerta(data.error, "Resultado Operación");
                            }

                        }
                    );
                }

                else {
                    App.desbloquearPantalla();
                    App.MensajeAlerta("Debe Completar los datos obligatorios", "Error");
                }

            });






            var formTag = $("#frmTags");
            var validator = formTag.validate(
            {
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input

            });

            $("#btnGuardarTag").click(function () {

                if (formTag.valid()) {
                    var data =
                    {
                        "btnGuardarTag": "btnGuardarTag",
                        "idTag": $("#ddlTag").val(),
                        "idEmpresa": $("#hdnEmpresa").val(),

                    };
                    data = $.param(data);

                    App.ejecutarAjax(
                    data,
                    "<?php echo $this->config->item('base_url');?>admin/empresas/GuardarTag",
                    function (data) {
                        if (data.codigo == 0) {
                                $('#mdlTags').modal("hide");
                                App.MensajeAlerta("Operación Realizada Exitosamente", "Resultado Operación", RecargarTags);
                            }
                            else if (data.codigo == 2)
                            {
                                App.MensajeAlerta(data.mensaje, "Resultado Operación");
                            }
                            else {
                                App.MensajeAlerta(data.error, "Resultado Operación");
                            }

                        }
                    );
                }

            });

            var formInfo = $("#frmInformacion");
            var validator = formInfo.validate(
            {
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input

            });


            $("#btnGuardarInformacionBasica").click(function () {

                if (formInfo.valid()) {


                    var data = new FormData();

                    data.append("btnGuardarInformacionBasica", "btnGuardarInformacionBasica");
                    data.append("cambiarImagen", $("#chkCambiarImagen").is(":checked"));
                    data.append("fileImage", document.getElementById("fileImageEmpresa").files[0]);
                    data.append("nombre", $("#txtNombre").val());
                    data.append("descCorta", $("#txtDescripcionCorta").val());
                    data.append("descLarga", "");
                    data.append("urlF", $("#txtUrlFacebook").val());
                    data.append("urlT", $("#txtUrlTwitter").val());
                    data.append("vigente", $("#ddlVigenteEmpresa").val());
                    data.append("idCategoria", $("#ddlCategoria").val());
                    data.append("idEmpresa", $("#hdnEmpresa").val());
                    data.append("imagenActual", $("#txtimagenActualEmpresa").val());
                    data.append("urlI", $("#txtUrlInstagram").val());
                    

                    App.ejecutarAjaxFile(
                    data,
                    "<?php echo $this->config->item('base_url');?>admin/empresas/GuardarInfoBasica",
                    function (data) {
                        App.desbloquearPantalla();
                            if (data.codigo == 0) {
                                $("#hdnEmpresa").val(data.idEmpresa);
                                $("#tabDirecciones").show();
                                $("#tabTags").show();
                                $("#tabImagenes").show();
                                $("#tabProductos").show();
                                $("#txtUrlRedesSociales").val(data.UrlRedesSociales);
                                $("#divUrlRedesSociales").show();
                                App.MensajeAlerta("Operación Realizada Exitosamente", "Resultado Operación");
                            }
                            else {
                                App.MensajeAlerta(data.error, "Resultado Operación");
                            }

                        }
                    );
                }
                else {
                    App.desbloquearPantalla();
                    App.MensajeAlerta("Debe Completar los datos obligatorios", "Error");
                }

            });


        });

        function RecargarImagenes() {
            App.bloquearPantalla();


            var data = new FormData();

            data.append("CargarImagenesPorEmpresa", "CargarImagenesPorEmpresa");
            data.append("idEmpresa", $("#hdnEmpresa").val());



            data = data;

            App.ejecutarAjaxFile(
                    data,
                    "<?php echo $this->config->item('base_url');?>admin/empresas/RecargarImagenes",
                    function (data) {
                        if (data.codigo == 0) {
                        var oTable = $('#tblImagenes').dataTable();
                        oTable.fnClearTable();
                        if(data.data != null)
                        {
                            for (var i = 0; i < data.data.length; i++) {

                                oTable.fnAddData(["<img src=\"" + data.data[i].url_imagen + "\" width=\"100px\" height=\"auto\">",
                                    "<a class=\"btn btn-danger\" href=\"javascript:ConfirmarEliminarEmpresaImagen('" + data.data[i].id_empresa_imagen + "')\"><i class=\"fa fa-trash-o\"></i></a>"]);
                            }
                        }
                    }
                    else {
                        App.MensajeAlerta(data.error, "Resultado Operación");
                    }

                        }
                    );
        }

        function RecargarProductos() {
            App.bloquearPantalla();


            var data = new FormData();

            data.append("CargarProductosPorEmpresa", "CargarProductosPorEmpresa");
            data.append("idEmpresa", $("#hdnEmpresa").val());



            data = data;

            App.ejecutarAjaxFile(
                    data,
                    "<?php echo $this->config->item('base_url');?>admin/empresas/RecargarProductos",
                    function (data) {
                        if (data.codigo == 0) {
                        var oTable = $('#tblProductos').dataTable();
                        oTable.fnClearTable();
                        if(data.data != null)
                        {
                            for (var i = 0; i < data.data.length; i++) {

                                oTable.fnAddData(["" + data.data[i].nombre + "", "<img src=\"" + data.data[i].imagen + "\" width=\"100px\" height=\"auto\">",
                                    "<a class=\"btn btn-danger\" href=\"javascript:ConfirmarEliminarEmpresaProducto('" + data.data[i].id_empresa_producto + "')\"><i class=\"fa fa-trash-o\"></i></a>"]);
                            }
                        }
                    }
                    else {
                        App.MensajeAlerta(data.error, "Resultado Operación");
                    }
                    

                        }
                    );
        }

        function RecargarTags() {
            App.bloquearPantalla();


            var data = new FormData();

            data.append("CargarTagsPorEmpresa", "CargarTagsPorEmpresa");
            data.append("idEmpresa", $("#hdnEmpresa").val());
            data = data;

            App.ejecutarAjaxFile(
                    data,
                    "<?php echo $this->config->item('base_url');?>admin/empresas/RecargarTag",
                    function (data) {
                        if (data.codigo == 0) {
                        var oTable = $('#tblTags').dataTable();
                        oTable.fnClearTable();
                        if(data.data != null)
                        {
                            for (var i = 0; i < data.data.length; i++) {
                                oTable.fnAddData([data.data[i].nombre, "<a class=\"btn btn-danger\" href=\"javascript:ConfirmarEliminarEmpresaTag('" + data.data[i].id_empresa_tag + "')\"><i class=\"fa fa-trash-o\"></i></a>"]);
                            }
                        }
                    }
                    else {
                        App.MensajeAlerta(data.error, "Resultado Operación");
                    }
                        }
                    );
        }

        function RecargarDirecciones() {
            App.bloquearPantalla();


            var data = new FormData();

            data.append("CargarDireccionesPorEmpresa", "CargarDireccionesPorEmpresa");
            data.append("idEmpresa", $("#hdnEmpresa").val());
            data = data;

            App.ejecutarAjaxFile(
                    data,
                    "<?php echo $this->config->item('base_url');?>admin/empresas/RecargarDirecciones",
                    function (data) {
                        if (data.codigo == 0) {
                        var oTable = $('#tblDirecciones').dataTable();
                        oTable.fnClearTable();
                        
                        if(data.data != null)
                        {
                            for (var i = 0; i < data.data.length; i++) {
                                oTable.fnAddData([data.data[i].calle,
                                    data.data[i].numero,
                                    data.data[i].region_nombre,
                                    data.data[i].comuna_nombre,
                                    "<a class=\"btn btn-info\" href=\"javascript:AbrirModalDirecciones('" + data.data[i].id_empresa_direccion + "')\"><i class=\"fa fa-edit\"></i></a><a class=\"btn btn-danger\" href=\"javascript:ConfirmarEliminarEmpresaDireccion('" + data.data[i].id_empresa_direccion + "')\"><i class=\"fa fa-trash-o\"></i></a>"]);
                                }
                        }
                        


                    }
                    else {
                        App.MensajeAlerta(data.error, "Resultado Operación");
                    }
                    

                        }
                    );
        }


        function ConfirmarEliminarEmpresaProducto($id) {
            bootbox.dialog({
                message: "¿Está Seguro que desea eliminar el registro?",
                title: "Confirmar Eliminación",
                buttons: {
                    success: {
                        label: "Cancelar",
                        className: "default",
                        callback: function () {
                        }
                    },
                    danger: {
                        label: "Aceptar",
                        className: "red",
                        callback: function () {
                            EliminarEmpresaProducto($id);
                        }
                    }
                }
            });
        }


        function EliminarEmpresaProducto($id) {
            App.bloquearPantalla();
            var data = { "Tipo": "EmpresaProducto", "ID": $id };

            App.ejecutarAjax(
                    data,
                    "<?php echo $this->config->item('base_url');?>admin/empresas/EliminarProducto",
                    function (data) {
                        if (data.codigo == 0) {
                        App.MensajeAlerta("Operación Realizada Exitosamente", "Resultado Operación", RecargarProductos);
                    }
                    else {

                        App.MensajeAlerta("Ha ocurrido un error. Intente mas tarde.", "Resultado Operación");

                    }
                        }
                    );
        }



        function ConfirmarEliminarEmpresaDireccion($id) {
            bootbox.dialog({
                message: "¿Está Seguro que desea eliminar el registro?",
                title: "Confirmar Eliminación",
                buttons: {
                    success: {
                        label: "Cancelar",
                        className: "default",
                        callback: function () {
                        }
                    },
                    danger: {
                        label: "Aceptar",
                        className: "red",
                        callback: function () {
                            EliminarEmpresaDireccion($id);
                        }
                    }
                }
            });
        }


        function EliminarEmpresaDireccion($id) {
            App.bloquearPantalla();
            var data = { "Tipo": "EmpresaDireccion", "ID": $id };
            App.ejecutarAjax(
                    data,
                    "<?php echo $this->config->item('base_url');?>admin/empresas/EliminarDireccion",
                    function (data) {
                        if (data.codigo == 0) {
                        App.MensajeAlerta("Operación Realizada Exitosamente", "Resultado Operación", RecargarDirecciones);
                    }
                    else {

                        App.MensajeAlerta("Ha ocurrido un error. Intente mas tarde.", "Resultado Operación");

                    }
                        }
                    );
        }

        function ConfirmarEliminarEmpresaTag($id) {
            bootbox.dialog({
                message: "¿Está Seguro que desea eliminar el registro?",
                title: "Confirmar Eliminación",
                buttons: {
                    success: {
                        label: "Cancelar",
                        className: "default",
                        callback: function () {
                        }
                    },
                    danger: {
                        label: "Aceptar",
                        className: "red",
                        callback: function () {
                            EliminarEmpresaTag($id);
                        }
                    }
                }
            });
        }


        function EliminarEmpresaTag($id) {
            App.bloquearPantalla();
            var data = { "Tipo": "EmpresaTag", "ID": $id };

            App.ejecutarAjax(
                    data,
                    "<?php echo $this->config->item('base_url');?>admin/empresas/EliminarTag",
                    function (data) {
                        if (data.codigo == 0) {
                        App.MensajeAlerta("Operación Realizada Exitosamente", "Resultado Operación", RecargarTags);
                    }
                    else {

                        App.MensajeAlerta("Ha ocurrido un error. Intente mas tarde.", "Resultado Operación");

                    }
                        },
                    function (xhr, ajaxOptions, thrownError) 
                    {

                    App.desbloquearPantalla();
                    App.MensajeAlerta("Ha ocurrido un error. Intente Nuevamente", "Resultado Operación");
                    App.guardarLogError("empresas_editar", "btnGuardarImagenEmpresa", xhr.responseText);
                    }
                    );
        }

        function ConfirmarEliminarEmpresaImagen($id) {
            bootbox.dialog({
                message: "¿Está Seguro que desea eliminar el registro?",
                title: "Confirmar Eliminación",
                buttons: {
                    success: {
                        label: "Cancelar",
                        className: "default",
                        callback: function () {
                        }
                    },
                    danger: {
                        label: "Aceptar",
                        className: "red",
                        callback: function () {
                            EliminarEmpresaImagen($id);
                        }
                    }
                }
            });
        }


        function EliminarEmpresaImagen($id) {
            App.bloquearPantalla();
            var data = { "Tipo": "EmpresaImagen", "ID": $id };

            App.ejecutarAjax(
                    data,
                    "<?php echo $this->config->item('base_url');?>admin/empresas/EliminarImagen",
                    function (data) {
                        if (data.codigo == 0) {
                        App.MensajeAlerta(
                            "Operación Realizada Exitosamente", 
                            "Resultado Operación", 
                            RecargarImagenes);
                    }
                    else {

                        App.MensajeAlerta("Ha ocurrido un error. Intente mas tarde.", "Resultado Operación");

                    }
                        }
                    );
        }


    </script>
</body>
<!-- END BODY -->
</html>



