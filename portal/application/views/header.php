<header class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- MAIN NAVIGATION -->
                <div class="flexnav-menu-button" id="flexnav-menu-button">Men&uacute;</div>
                <nav>
                    <ul class="nav nav-pills flexnav" id="flexnav" data-breakpoint="800">
                        <li><a href="<?php echo $this->config->item('base_url');?>portal/home"><i class="fa fa-home"></i>Locales</a></li>
                        <!--  <li><a href=""<?php echo $this->config->item('base_url');?>portal/promociones"><i class="fa fa-gift"></i> Promociones</a></li>-->
                        <!-- <li><a href="<?php echo $this->config->item('base_url');?>portal/cercanos"><i class="fa fa-map-marker"></i>Los + Cercanos</a></li> -->

                        <!-- <li><a href="planes.html">Planes</a></li>-->
                    </ul>
                </nav>
                <!-- END MAIN NAVIGATION -->
            </div>
            <div class="col-md-6">
                <!-- LOGIN REGISTER LINKS -->



                <ul class="list list-social" style="float: right;">

                    <li>
                        <!-- <a class="fa fa-facebook box-icon" target="_blank" href="https://www.facebook.com/QueBuscasHoy" data-toggle="tooltip" title="Facebook"></a> -->
                    </li>
                    <li>
                        <!--<a class="fa fa-twitter box-icon" target="_blank" href="https://twitter.com/quebuscashoy" data-toggle="tooltip" title="Twitter"></a>-->
                    </li>
                    <li>
                        <a class="fa fa-sign-in box-icon" target="_blank" href="<?php echo $this->config->item('base_url');?>admin/login" data-toggle="tooltip" title="Login"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
