	<div id="menubar" class="menubar-inverse animate">
		<div class="menubar-fixed-panel">
			<div>
				<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
					<i class="fa fa-bars"></i>
				</a>
			</div>
			<div class="expanded">
				<a href="<?=base_url()?>">
					<span class="text-lg text-bold text-primary ">Sistema calificaciones</span>
				</a>
			</div>
		</div>
		<div class="menubar-scroll-panel">
			<?php
				$param_offset = 0;
				$params = array_slice($this->uri->rsegment_array(), $param_offset);
			?>
				
			<!-- BEGIN MAIN MENU -->
			<ul id="main-menu" class="gui-controls">
				<?php
					if( $this->session->rol == 3 ){

						$active = ' class="active expanded expanding"';
						$active2 = 'active';
						$active3 = ' class="active"';

						$inicio = '';
						$grupos = '';
						$alumnos = '';
						$materias = '';
						$docentes = '';

						$configuracion = '';
						$periodos = '';
						$aulas = '';
						$carreras = '';

						switch ($params[1]) {
							case 'index':
								$inicio = $active;
								break;
							case 'grupos':
								$grupos = $active;
								break;
							case 'alumnos':
								$alumnos = $active;
								break;
							case 'materias':
								$materias = $active;
								break;
							case 'docentes':
								$docentes = $active;
								break;
							case 'periodos':
								$configuracion = $active2;
								$periodos = $active3;
								break;
							case 'aulas':
								$configuracion = $active2;
								$aulas = $active3;
								break;
							case 'carreras':
								$configuracion = $active2;
								$carreras = $active3;
								break;
							/*
							case 'planesestudio':
								$configuracion = $active2;
								$planes = $active3;
								break;
							*/
							default: break;
						}

				?>
				<li<?=$inicio?>>
					<a href="<?=base_url()?>">
						<div class="gui-icon"><i class="md md-home"></i></div>
						<span class="title">Inicio</span>
					</a>
				</li>
				<li<?=$grupos?>>
					<a href="<?=base_url()?>admin/grupos">
						<div class="gui-icon"><i class="fa fa-users"></i></div>
						<span class="title">Grupos</span>
					</a>
				</li>
				<li<?=$alumnos?>>
					<a href="<?=base_url()?>admin/alumnos">
						<div class="gui-icon"><i class="fa fa-graduation-cap"></i></div>
						<span class="title">Alumnos</span>
					</a>
				</li>
				<li<?=$materias?>>
					<a href="<?=base_url()?>admin/materias">
						<div class="gui-icon"><i class="fa fa-book"></i></div>
						<span class="title">Materias</span>
					</a>
				</li>
				<li<?=$docentes?>>
					<a href="<?=base_url()?>admin/docentes">
						<div class="gui-icon"><i class="fa fa-gavel"></i></div>
						<span class="title">Docentes</span>
					</a>
				</li>
				<li class="gui-folder expanded <?=$configuracion?>">
					<a>
						<div class="gui-icon"><i class="fa fa-gears"></i></div>
						<span class="title">Configuraci&oacute;n</span>
					</a>
					<ul>
						<li<?=$periodos?>>
							<a <?=$periodos?> href="<?=base_url()?>configuracion/periodos"><span class="title">Periodos</span></a>
						</li>
						<li<?=$aulas?>>
							<a <?=$aulas?> href="<?=base_url()?>configuracion/aulas"><span class="title">Aulas</span></a>
						</li>
						<li<?=$carreras?>>
							<a <?=$carreras?> href="<?=base_url()?>configuracion/carreras"><span class="title">Carreras</span></a>
						</li>
					</ul>
				</li>
				<?php } ?>
				<!--
				<li class="gui-folder">
					<a>
						<div class="gui-icon"><i class="fa fa-folder-open fa-fw"></i></div>
						<span class="title">Menu levels demo</span>
					</a>
					<ul style="">
						<li><a href="#"><span class="title">Item 1</span></a></li>
						<li><a href="#"><span class="title">Item 1</span></a></li>
						<li class="gui-folder">
							<a href="javascript:void(0);">
								<span class="title">Open level 2</span>
							</a>
							<ul>
								<li><a href="#"><span class="title">Item 2</span></a></li>
								<li class="gui-folder">
									<a href="javascript:void(0);">
										<span class="title">Open level 3</span>
									</a>
									<ul>
										<li><a href="#"><span class="title">Item 3</span></a></li>
										<li><a href="#"><span class="title">Item 3</span></a></li>
										<li class="gui-folder">
											<a href="javascript:void(0);">
												<span class="title">Open level 4</span>
											</a>
											<ul>
												<li><a href="#"><span class="title">Item 4</span></a></li>
												<li class="gui-folder">
													<a href="javascript:void(0);">
														<span class="title">Open level 5</span>
													</a>
													<ul>
														<li><a href="#"><span class="title">Item 5</span></a></li>
														<li><a href="#"><span class="title">Item 5</span></a></li>
													</ul>
												</li>
											</ul>
										</li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>-->
			</ul>
			<div class="menubar-foot-panel">
				<small class="no-linebreak hidden-folded">
					<span class="opacity-75">Copyright &copy; <?=date('Y')?></span> <strong>ITChetumal</strong>
				</small>
			</div>
		</div><!--end .menubar-scroll-panel-->
	</div><!--end #menubar-->
	<!-- END MENUBAR -->
</div><!--end #base-->
<!-- END BASE