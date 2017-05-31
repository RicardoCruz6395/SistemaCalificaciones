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

			<!-- BEGIN MAIN MENU -->
			<ul class="main-menu">
                <li class="active">
                    <a href="index.html"><i class="zmdi zmdi-home"></i> Home</a>
                </li>
                <li class="sub-menu">
                    <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-chart"></i> Dashboards</a>

                    <ul>
                        <li><a href="dashboards/analytics.html">Analytics</a></li>
                        <li><a href="dashboards/school.html">School</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-view-compact"></i> Headers</a>

                    <ul>
                        <li><a href="textual-menu.html">Textual menu</a></li>
                        <li><a href="image-logo.html">Image logo</a></li>
                        <li><a href="top-mainmenu.html">Mainmenu on top</a></li>
                    </ul>
                </li>
                <li><a href="typography.html"><i class="zmdi zmdi-format-underlined"></i> Typography</a></li>
                
                <li>
                    <a href="https://wrapbootstrap.com/theme/material-admin-responsive-angularjs-WB011H985"><i class="zmdi zmdi-money"></i> Buy this template</a>
                </li>
            </ul><!--end .main-menu -->
			<!-- END MAIN MENU -->

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