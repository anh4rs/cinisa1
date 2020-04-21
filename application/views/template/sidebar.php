  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('assets/adminlte/'); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= ucwords($this->session->userdata('user_name')); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">REFERENSI MASTER</li>
        <li <?= $this->router->fetch_class() == 'harga' ? 'class="active"' : ''  ?>><a href="<?= site_url('harga'); ?>"><i class="fa fa-gears"></i> <span>Harga</span></a></li>
        <li <?= $this->router->fetch_class() == 'pasar' ? 'class="active"' : ''  ?>><a href="<?= site_url('pasar'); ?>"><i class="fa fa-gears"></i> <span>Pasar</span></a></li>
        <li <?= $this->router->fetch_class() == 'sembako' ? 'class="active"' : ''  ?>><a href="<?= site_url('sembako'); ?>"><i class="fa fa-gears"></i> <span>Sembako</span></a></li>
        <li <?= $this->router->fetch_class() == 'kecamatan' ? 'class="active"' : ''  ?>><a href="<?= site_url('kecamatan'); ?>"><i class="fa fa-gears"></i> <span>Kecamatan</span></a></li>
        <li <?= $this->router->fetch_class() == 'pengaturan' ? 'class="active"' : ''  ?>><a href="<?= site_url('pengaturan'); ?>"><i class="fa fa-gears"></i> <span>Pengaturan</span></a></li>
        <li class="header">LAPORAN</li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->