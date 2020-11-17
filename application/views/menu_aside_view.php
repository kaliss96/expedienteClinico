<ul class="nav nav-list">
	<?php 
if (isset($menu))
	foreach ($menu as $menu_i) { ?>
		<li class="">
			<a href="#" class="dropdown-toggle">				
				<span class="menu-text">
					<i class="menu-icon fa fa-desktop"></i>					
					<?php echo $menu_i['nombre'] ?>					
				</span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>

			<ul class="submenu">	

				<?php 
				if (isset($menu_i['formularios'])) 
				foreach ($menu_i['formularios'] as $formulario_j) { ?>
					<li class="">
						<a href="<?php echo site_url($formulario_j['controlador']) ?>">
							<i class="menu-icon fa fa-caret-right"></i>
							<?php echo $formulario_j['nombre'] ?>
						</a>
						<b class="arrow"></b>
					</li>
				<?php } ?>

			</ul>
		</li>
	<?php } ?>
</ul>