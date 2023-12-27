<aside class="main-sidebar sidebar-dark-primary elevation-4" style="height:100%; overflow-y:auto; position: fixed;">
    <a href="#" class="brand-link">
        <img src="<?php echo base_url('asset/dist');?>/img/sikarpar.svg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SIKARPAR</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url('asset/dist'); ?>/img/avatar.svg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">ADMIN</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">MENU ADMIN</li>
                <li class="nav-item">
                    <a href="<?=base_url()."admin/dashboard"?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() . "admin/penyakit" ?>" class="nav-link">
                        <i class="nav-icon fas fa-virus"></i>
                        <p>Penyakit</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() . "admin/gejala" ?>" class="nav-link">
                        <i class="nav-icon fas fa-stethoscope"></i>
                        <p>Gejala</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() . "admin/rules" ?>" class="nav-link">
                        <i class="nav-icon fas fa-user-md"></i>
                        <p>Rules</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() . "admin/histori" ?>" class="nav-link">
                        <i class="nav-icon fas fa-history"></i>
                        <p>Histori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() . "admin/users" ?>" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-header">ACCOUNT</li>
                <li class="nav-item">
                    <a href="<?=base_url().'admin/authentication/logout'?>" class="nav-link">
                        <i class="nav-icon fas fa-door-open text-danger"></i>
                        <p class="text">Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>