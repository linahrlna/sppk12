  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if ($this->session->userdata('user_image') != null) { ?>
          <img src="<?php echo upload_url().'/users/petugas.jpg' ?>" class="img-responsive">
          <?php } else { ?>
          <img src="<?php echo media_url() ?>img/admin.jpg" class="img-responsive">
          <?php } ?>
        </div>
        <div class="pull-left info">
          <p>Petugas</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <div style="margin-top: 20px"></div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>

        <li class="<?php echo ($this->uri->segment(2) == 'dashboard' OR $this->uri->segment(2) == NULL) ? 'active' : '' ?>">
          <a href="<?php echo site_url('petugas'); ?>">
            <i class="fa fa-th"></i> <span>Dashboard</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <li class="<?php echo ($this->uri->segment(2) == 'payout') ? 'active' : '' ?>">
          <a href="<?php echo site_url('petugas/payout'); ?>">
            <i class="fa fa-credit-card"></i> <span>Pembayaran Siswa</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <?php if ($this->session->userdata('uroleid') == USER) { ?>
        <li class="<?php echo ($this->uri->segment(2) == 'student') ? 'active' : '' ?>">
          <a href="<?php echo site_url('petugas/student'); ?>">
            <i class="fa fa-users"></i> <span>Siswa</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <?php } ?>

        <?php if ($this->session->userdata('uroleid') == SUPERUSER) { ?>
        <li class="<?php echo ($this->uri->segment(2) == 'pos' OR $this->uri->segment(2) == 'payment') ? 'active' : '' ?> treeview">
          <a href="#">
            <i class="fa fa-money text-stock"></i> <span>Keuangan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($this->uri->segment(2) == 'payment') ? 'active' : '' ?> ">
              <a href="<?php echo site_url('petugas/payment') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'payment') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Jenis Pembayaran</a>
            </li>
          </ul>
        </li>
        <?php } ?>

        <li class="<?php echo ($this->uri->segment(2) == 'kredit' OR $this->uri->segment(2) == 'debit') ? 'active' : '' ?> treeview">
          <a href="#">
            <i class="fa fa-edit text-stock"></i> <span>Jurnal Umum</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li class="<?php echo ($this->uri->segment(2) == 'debit') ? 'active' : '' ?> ">
              <a href="<?php echo site_url('petugas/debit') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'debit') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Penerimaan</a>
            </li>
          </ul>
        </li>

        <?php if ($this->session->userdata('uroleid') == SUPERUSER) { ?>
        <li class="<?php echo ($this->uri->segment(2) == 'student' OR $this->uri->segment(2) == 'class' OR $this->uri->segment(2) == 'majors' OR $this->uri->segment(2) == 'period') ? 'active' : '' ?> treeview">
          <a href="#">
            <i class="fa fa-users text-stock"></i> <span>Manajemen Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($this->uri->segment(2) == 'period') ? 'active' : '' ?> ">
              <a href="<?php echo site_url('petugas/period') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'period') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Tahun Ajaran</a>
            </li>
            <li class="<?php echo ($this->uri->segment(2) == 'class') ? 'active' : '' ?> ">
              <a href="<?php echo site_url('petugas/class') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'class') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Kelas</a>
            </li>
            <?php if (majors() == 'senior') { ?>
            <li class="<?php echo ($this->uri->segment(2) == 'majors') ? 'active' : '' ?> ">
              <a href="<?php echo site_url('petugas/majors') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'majors') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Program Keahlian</a>
            </li>
            <?php } ?>

            <li class="<?php echo ($this->uri->segment(2) == 'student' AND $this->uri->segment(3) != 'pass' AND $this->uri->segment(3) != 'upgrade') ? 'active' : '' ?> ">
              <a href="<?php echo site_url('petugas/student') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'student' AND $this->uri->segment(3) != 'pass' AND $this->uri->segment(3) != 'upgrade') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Siswa</a>
            </li>
          </ul>
        </li>

        <li class="<?php echo ($this->uri->segment(2) == 'report' OR $this->uri->segment(3) == 'report_bill') ? 'active' : '' ?> treeview">
          <a href="#">
            <i class="fa fa-file-text-o text-stock"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($this->uri->segment(3) == 'report_bill') ? 'active' : '' ?> ">
              <a href="<?php echo site_url('petugas/report/report_bill') ?>"><i class="fa  <?php echo ($this->uri->segment(3) == 'report_bill') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Rekapitulasi</a>
            </li>
          </ul>
        </li>

        <li class="<?php echo ($this->uri->segment(2) == 'setting' OR $this->uri->segment(2) == 'month') ? 'active' : '' ?> treeview">
          <a href="#">
            <i class="fa fa-gear text-stock"></i> <span>Pengaturan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($this->uri->segment(2) == 'setting') ? 'active' : '' ?> ">
              <a href="<?php echo site_url('petugas/setting') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'setting') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Sekolah</a>
            </li>
            <li class="<?php echo ($this->uri->segment(2) == 'month') ? 'active' : '' ?> ">
              <a href="<?php echo site_url('petugas/month') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'month') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Bulan</a>
            </li>
          </ul>
        </li>

        <li class="<?php echo ($this->uri->segment(2) == 'users') ? 'active' : '' ?>">
          <a href="<?php echo site_url('petugas/users'); ?>">
            <i class="fa fa-user"></i> <span>Manajemen Pengguna</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <?php } ?>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>