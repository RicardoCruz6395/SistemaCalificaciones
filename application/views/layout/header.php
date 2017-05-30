<body class="menubar-hoverable header-fixed menubar-pin">
<!-- BEGIN HEADER-->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h3><i class="fa fa-spin fa-spinner"></i> Cargando...</h3>
      </div>
    </div>
  </div>
</div>

<header id="header">
  <div class="headerbar">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="headerbar-left">
      <ul class="header-nav header-nav-options">
        <li class="header-nav-brand">
          <div class="brand-holder">
            <a href="<?= base_url(); ?>">
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
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="headerbar-right">
        <!--ul class="header-nav header-nav-options">
            <li>
                <form class="navbar-search" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" name="headerSearch" placeholder="Ingrese una palabra clave¿">
                    </div>
                    <button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
                </form>
            </li>
            <li class="dropdown hidden-xs">
                <a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
                    <i class="fa fa-bell"></i><sup class="badge style-danger"></sup>
                </a>
                <ul class="dropdown-menu animation-expand">
                    <li class="dropdown-header">Notificaciones</li>
                    <li class="dropdown-header">Opciones</li>
                </ul>
            </li>
        </ul-->
      <ul class="header-nav header-nav-profile">
        <li class="dropdown">
          <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
            <img src="<?= base_url() ?>assets/img/gravatar.png" alt=""/>
            <?=$nombre_usuario?>

          </a>
          <ul class="dropdown-menu animation-dock">
            <li class="dropdown-header">Configuraciones</li>
            <!--								<li><a href="-->
            <? //=base_url('usuarios/perfil')?><!--"><i class="fa fa-fw fa-user text-info"></i> Mi perfil</a></li>-->
            <li>
                <a href="<?=base_url('alumno/password')?>">
                    <i class="fa fa-fw fa-gears text-default"></i> Cambiar contraseña
                </a>
            </li>
            <li><a href="<?=base_url('auth/logout')?>"><i class="fa fa-fw fa-power-off text-danger"></i> Cerrar sesión</a></li>
          </ul><!--end .dropdown-menu -->
        </li><!--end .dropdown -->
      </ul><!--end .header-nav-profile -->
    </div><!--end #header-navbar-collapse -->
  </div>
</header>
<!-- END HEADER-->