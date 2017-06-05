<body class="menubar-hoverable header-fixed menubar-pin">
    <!-- BEGIN HEADER-->
    <div class="modal fade" id="general-modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center"><i class="fa fa-spin fa-spinner"></i></div>
                </div>
            </div>
        </div>
    </div>
    <header id="header">
        <div class="headerbar">
            <div class="headerbar-left">
                <ul class="header-nav header-nav-options">
                    <li class="header-nav-brand">
                        <div class="brand-holder">
                            <a href="<?=base_url()?>">
                                <span class="text-lg text-bold text-primary">Sistema calificaciones</span>
                            </a>
                        </div>
                    </li>
                    <li>
                        <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="headerbar-right">
                <ul class="header-nav header-nav-profile">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                            <img src="<?=base_url()?>assets/img/gravatar.png" />
                            <?php
                                $this->load->model('usuarios_model');
                                echo $this->usuarios_model->getNombreUsuario();
                            ?>
                        </a>
                        <ul class="dropdown-menu animation-dock">
                            <li>
                                <a href="<?=base_url('auth/cambiar_password')?>">
                                    <i class="fa fa-fw fa-gears text-default"></i> Cambiar contraseña
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url('auth/logout')?>"><i class="fa fa-fw fa-power-off text-danger"></i> Cerrar sesión</a></li>
                        </ul><!--end .dropdown-menu -->
                    </li><!--end .dropdown -->
                </ul><!--end .header-nav-profile -->
            </div><!--end #header-navbar-collapse -->
        </div>
    </header>
    <!-- END HEADER-->