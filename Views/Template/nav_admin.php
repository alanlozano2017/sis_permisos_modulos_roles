    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media();?>/images/avatar.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?=$_SESSION['userData']['nombre'];?></p>
          <p class="app-sidebar__user-designation"><?=$_SESSION['userData']['nombrerol'];?></p>
        </div>
      </div>
      <ul class="app-menu">
      <?php if(!empty($_SESSION['permisos'][1]['r'])){ ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/dashboard">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][2]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-users" aria-hidden="true"></i>
                <span class="app-menu__label">Usuarios</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url(); ?>/usuarios"><i class="icon fa fa-circle-o"></i> Usuarios</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/roles"><i class="icon fa fa-circle-o"></i> Roles</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/modulos"><i class="icon fa fa-circle-o"></i> Modulos</a></li>

            </ul>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][3]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fas fa-table" aria-hidden="true"></i>
                <span class="app-menu__label">Tablas referenciales</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url(); ?>/personas"><i class="icon fa fa-circle-o"></i> Personas</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/puestos"><i class="icon fa fa-circle-o"></i> Puestos</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/calificaciones"><i class="icon fa fa-circle-o"></i> Calificaciones</a></li>

            </ul>
        </li>
        
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][4]['r']) || !empty($_SESSION['permisos'][6]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fas fa-chart-pie" aria-hidden="true"></i>
                <span class="app-menu__label">Informes</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <?php if(!empty($_SESSION['permisos'][4]['r'])){ ?>
                    <li><a class="treeview-item" href="<?= base_url(); ?>/personas"><i class="icon fa fa-circle-o"></i> Informes Personas</a></li>
                <?php } ?>
                <?php if(!empty($_SESSION['permisos'][6]['r'])){ ?>
                <li><a class="treeview-item" href="<?= base_url(); ?>/puestos"><i class="icon fa fa-circle-o"></i>Informes Puestos</a></li>
                <?php } ?>
                <li><a class="treeview-item" href="<?= base_url(); ?>/calificaciones"><i class="icon fa fa-circle-o"></i> Calificaciones</a></li>

            </ul>
        </li>


        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][5]['r'])){ ?>
         <li>  
            <a class="app-menu__item" href="<?= base_url(); ?>/test">
                <i class="app-menu__icon fa fa-vial" aria-hidden="true"></i>
                <span class="app-menu__label">Test</span>
            </a>
        </li>
        <?php } ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/logout">
                <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                <span class="app-menu__label">Logout</span>
            </a>
        </li>
      </ul>
    </aside>