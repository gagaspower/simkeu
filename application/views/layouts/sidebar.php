<aside class="main-sidebar">
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/theme/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Login </a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU NAVIGASI</li>
        
        <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-home text-red"></i> <span>Home</span></a></li>
        <?php if($this->session->userdata('role') == 1){ ?>
        <li><a href="<?php echo base_url('pengguna');?>"><i class="fa fa-users text-red"></i> <span>Pengguna</span></a></li>
        <li><a href="<?php echo base_url('transaksi');?>"><i class="fa fa-money text-red"></i> <span>Transaksi</span></a></li>
        <li><a href="<?php echo base_url('karyawan');?>"><i class="fa fa-briefcase text-red"></i> <span>Karyawan</span></a></li>
        <li><a href="<?php echo base_url('report-pemasukan');?>"><i class="fa fa-print text-red"></i> <span>Report Pemasukan</span></a></li>
        <li><a href="<?php echo base_url('report-pengeluaran');?>"><i class="fa fa-print text-red"></i> <span>Report Pengeluaran</span></a></li>
        <li><a href="<?php echo base_url('report-laba-rugi');?>"><i class="fa fa-print text-red"></i> <span>Report Laba/Rugi</span></a></li>
        <li><a href="<?php echo base_url('buku-besar');?>"><i class="fa fa-print text-red"></i> <span>Buku Besar</span></a></li>
        <li><a href="<?php echo base_url('neraca-saldo');?>"><i class="fa fa-print text-red"></i> <span>Neraca Saldo</span></a></li>
        <?php } else{ ?>
        <li><a href="<?php echo base_url('report-pemasukan');?>"><i class="fa fa-print text-red"></i> <span>Report Pemasukan</span></a></li>
        <li><a href="<?php echo base_url('report-pengeluaran');?>"><i class="fa fa-print text-red"></i> <span>Report Pengeluaran</span></a></li>
        <li><a href="<?php echo base_url('report-laba-rugi');?>"><i class="fa fa-print text-red"></i> <span>Report Laba/Rugi</span></a></li>
        <li><a href="<?php echo base_url('buku-besar');?>"><i class="fa fa-print text-red"></i> <span>Buku Besar</span></a></li>
        <li><a href="<?php echo base_url('neraca-saldo');?>"><i class="fa fa-print text-red"></i> <span>Neraca Saldo</span></a></li>
        <?php } ?>
        <li><a href="<?php echo base_url('auth/logout');?>"><i class="fa fa-external-link text-red"></i> <span>Logout</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>