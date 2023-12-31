<aside class="main-sidebar sidebar-dark-primary elevation-4" style="height:100%; overflow-y:auto;position: fixed;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url('asset/dist');?>/img/sikarpar.svg" alt=" Sirkapar Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIKARPAR</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('asset/dist');?>/img/1261848 (2).jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="<?= base_url().'user/profile';?>" class="d-block"><?php echo $username?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <li class="nav-header">MENU PENGGUNA</li>
          <li class="nav-item">
            <a href="<?=base_url().'user/dashboard'?>" class="nav-link">
              <i class="fa-solid fa-house"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url().'user/diagnosa/diagnosaPasien'?>" class="nav-link">
              <i class="fa-solid fa-stethoscope"></i>
              <p>Diagnosa</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url().'user/riwayat'?>" class="nav-link">
              <i class="fa-solid fa-laptop-medical"></i>
              <p>Riwayat Diagnosa</p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">ACCOUNT</li>
          <li class="nav-item">
            <a href="<?=base_url().'user/Auth/logout'?>" class="nav-link">
              <i class="fa-solid fa-arrow-right-from-bracket fa-sm" style="color: #de1717;"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>

    <!-- /.sidebar -->
  </aside>