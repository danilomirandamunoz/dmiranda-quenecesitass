<?php

?>

	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone" style="background-image: url(<?php echo $this->config->item('base_url');?>admin/img/sidebar-toggler-blue.jpg);">
  
					</div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li class="sidebar-search-wrapper">

				</li>
				<?php
                $result = $menus;
		
						            foreach ($result as $row) {
						        ?>
						        
						        <li class="">
									<a href="<?php echo $this->config->item('base_url');?><?php echo $row['URL']; ?>">
									<i class="<?php echo $row['Icono']; ?>"></i>
									<span class="title">
										<?php echo $row['Nombre']; ?>
									</span>
									<span class="selected">
									</span>
									</a>
								</li>						
						        <?php } ?>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>