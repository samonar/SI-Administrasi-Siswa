<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-success">
  <!-- Brand Logo -->
  <a href="<?php echo base_url('')?>" class="brand-link bg-success">
    <img src="<?php echo base_url()."assets/"; ?>dist/img/sma1.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-2"
         style="opacity: .8">
    <span class="brand-text font-weight-medium">SMAN 1 Surakarta </span>
  </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url()."assets/"; ?>foto/admin.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo base_url('') ?>" class="d-block"><?php echo $session_jabatan=$this->session->userdata('nama_jabatan'); ?></a>
        </div>
      </div>
		<nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!--pembagian menu user-->
      <?php if ($session_jabatan=$this->session->userdata('nama_jabatan')=='Kepala Sekolah'){?>
        <li class="nav-item has-treeview <?php if($page_header=='kelas'){?>menu-open<?php } ?>">
          <a href="#" class="nav-link <?php if($page_header=='kelas'){?>active<?php } ?> ">
            <i class="nav-icon fa fa-th"></i>
            <p>
              Pembayaran Langsung
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k1') ?>" class="nav-link <?php if($active=='kelask1'){?>active<?php } ?>  ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>10 MIPA 1</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k2') ?>" class="nav-link <?php if($active=='kelask2'){?>active<?php } ?>">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>10 IPS 1</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k3') ?>" class="nav-link <?php if($active=='kelask3'){?>active<?php } ?>">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>11 IPA 1</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k4') ?>" class="nav-link <?php if($active=='kelask4'){?>active<?php } ?> ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>11 IPS 1</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k5') ?>" class="nav-link <?php if($active=='kelask5'){?>active<?php } ?> ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>12 IPA 1</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k6') ?>" class="nav-link <?php if($active=='kelask6'){?>active<?php } ?>">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>12 IPS 1</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- pengajuan keringanan -->
        <li class="nav-item has-treeview <?php if($page_header=='keringanan'){?>menu-open<?php } ?>">
          <a href="<?php echo base_url('Pengajuan/view_pengajuan'); ?>" class="nav-link <?php if($page_header=='keringanan'){?>active<?php } ?>">
            <i class="nav-icon fa fa-th"></i>
            <p>
              List Pengajuan Keringanan
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          </ul>
        </li>

        <!-- menu bendahara-->

      <?php }if ($session_jabatan=$this->session->userdata('nama_jabatan')=='admin TU'){?>
        <li class="nav-item has-treeview <?php if($page_header=='tagihan'){?>menu-open<?php } ?>">
          <a href="#" class="nav-link <?php if($page_header=='tagihan'){?>active<?php } ?> ">
            <i class="nav-icon fa fa-dashboard"></i>
            <p>
              Tagihan
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('tagihan_bulanan/buat_tagihan') ?>" class="nav-link <?php if($active=='buat tagihan'){?>active<?php } ?> ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Buat Tagihan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('tagihan_siswa_kelas/gentagihan') ?>" class="nav-link <?php if($active=='generate tagihan'){?>active<?php } ?>">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Generated Tagihan</p>
              </a>
            </li>
          </ul>
        </li>
        <!--menu kelas-->
        <li class="nav-item has-treeview <?php if($page_header=='kelas'){?>menu-open<?php } ?>">
          <a href="#" class="nav-link <?php if($page_header=='kelas'){?>active<?php } ?> ">
            <i class="nav-icon fa fa-th"></i>
            <p>
              Siswa Kelas
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                Kelas 10
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k2') ?>" class="nav-link <?php if($active=='kelask2'){?>active<?php } ?>">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>10 IPS 1</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k17') ?>" class="nav-link <?php if($active=='kelask17'){?>active<?php } ?>">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>10 IPS 2</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k1') ?>" class="nav-link <?php if($active=='kelask1'){?>active<?php } ?>  ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>10 MIPA 1</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k8') ?>" class="nav-link <?php if($active=='kelask8'){?>active<?php } ?>  ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>10 MIPA 2</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k9') ?>" class="nav-link <?php if($active=='kelask9'){?>active<?php } ?>  ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>10 MIPA 3</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k10') ?>" class="nav-link <?php if($active=='kelask10'){?>active<?php } ?>  ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>10 MIPA 4</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k11') ?>" class="nav-link <?php if($active=='kelask11'){?>active<?php } ?>  ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>10 MIPA 5</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k12') ?>" class="nav-link <?php if($active=='kelask12'){?>active<?php } ?>  ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>10 MIPA 6</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k13') ?>" class="nav-link <?php if($active=='kelask13'){?>active<?php } ?>  ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>10 MIPA 7</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k14') ?>" class="nav-link <?php if($active=='kelask14'){?>active<?php } ?>  ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>10 MIPA 8</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k16') ?>" class="nav-link <?php if($active=='kelask16'){?>active<?php } ?>  ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>10 MIPA 9</p>
              </a>
            </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                Kelas 11
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k4') ?>" class="nav-link <?php if($active=='kelask4'){?>active<?php } ?> ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>11 IPS 1</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k20') ?>" class="nav-link <?php if($active=='kelask20'){?>active<?php } ?> ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>11 IPS 2</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k3') ?>" class="nav-link <?php if($active=='kelask3'){?>active<?php } ?>">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>11 MIPA 1</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k19') ?>" class="nav-link <?php if($active=='kelask19'){?>active<?php } ?>">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>11 MIPA 2</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k18') ?>" class="nav-link <?php if($active=='kelask18'){?>active<?php } ?>">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>11 MIPA 3</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k24') ?>" class="nav-link <?php if($active=='kelask24'){?>active<?php } ?>">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>11 MIPA 4</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k25') ?>" class="nav-link <?php if($active=='kelask25'){?>active<?php } ?>">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>11 MIPA 5</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k26') ?>" class="nav-link <?php if($active=='kelask26'){?>active<?php } ?>">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>11 MIPA 6</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k27') ?>" class="nav-link <?php if($active=='kelask27'){?>active<?php } ?>">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>11 MIPA 7</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k28') ?>" class="nav-link <?php if($active=='kelask28'){?>active<?php } ?>">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>11 MIPA 8</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k29') ?>" class="nav-link <?php if($active=='kelask29'){?>active<?php } ?>">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>11 MIPA 9</p>
              </a>
            </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                Kelas 12
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k6') ?>" class="nav-link <?php if($active=='kelask6'){?>active<?php } ?>">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>12 IPS 1</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k30') ?>" class="nav-link <?php if($active=='kelask30'){?>active<?php } ?>">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>12 IPS 2</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k5') ?>" class="nav-link <?php if($active=='kelask5'){?>active<?php } ?> ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>12 MIPA 1</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k23') ?>" class="nav-link <?php if($active=='kelask23'){?>active<?php } ?> ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>12 MIPA 2</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k22') ?>" class="nav-link <?php if($active=='kelask22'){?>active<?php } ?> ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>12 MIPA 3</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k21') ?>" class="nav-link <?php if($active=='kelask21'){?>active<?php } ?> ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>12 MIPA 4</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k31') ?>" class="nav-link <?php if($active=='kelask31'){?>active<?php } ?> ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>12 MIPA 5</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k32') ?>" class="nav-link <?php if($active=='kelask32'){?>active<?php } ?> ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>12 MIPA 6</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k33') ?>" class="nav-link <?php if($active=='kelask33'){?>active<?php } ?> ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>12 MIPA 7</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k534') ?>" class="nav-link <?php if($active=='kelask534'){?>active<?php } ?> ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>12 MIPA 8</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('siswa/siswa/'.$id='k35') ?>" class="nav-link <?php if($active=='kelask35'){?>active<?php } ?> ">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>12 MIPA 9</p>
              </a>
            </li>
          </ul>
        </li>

          </ul>
        </li>

        <!--menu pembayaran-->
        <li class="nav-item has-treeview <?php if($page_header=='pembayaran'){?>menu-open<?php } ?>">
          <a href="<?php echo base_url('Pembayaran/bayar_bank'); ?>" class="nav-link <?php if($page_header=='pembayaran'){?>active<?php } ?> ">
            <i class="nav-icon fa fa-th"></i>
            <p>
              Pembayaran Bank

            </p>
          </a>
        </li>

        <!--kenaikan kelas-->
        <li class="nav-item has-treeview <?php if($page_header=='kenaikan kelas'){?>menu-open<?php } ?>">
          <a href="#" class="nav-link <?php if($page_header=='kenaikan kelas'){?>active<?php } ?>">
            <i class="nav-icon fa fa-th"></i>
            <p>
              Kenaikan Kelas
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('kelas_siswa/naik_kelas') ?>" class="nav-link <?php if($active=='naik kelas'){?>active<?php } ?>">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Naik Kelas</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- tahun aktif-->
        <li class="nav-item has-treeview <?php if($page_header=='tahun aktif'){?>menu-open<?php } ?>">
          <a href="<?php echo site_url('th_akademik/pindah_semester') ?>" class="nav-link <?php if($page_header=='tahun aktif'){?>active<?php } ?>">
            <i class="nav-icon fa fa-th"></i>
            <p>
              Tahun Akademik Aktif
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>

        </li>
        <li class="nav-item has-treeview <?php if($page_header=='buat pesan'){?>menu-open<?php } ?>">
          <a href="<?php echo site_url('pesan/buat_pesan') ?>" class="nav-link <?php if($page_header=='pesan'){?>active<?php } ?>">
            <i class="nav-icon fa fa-th"></i>
            <p>
              Pesan Kepada Siswa
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>

        </li>

        <li class="nav-item has-treeview <?php if($page_header=='pengajuan'){?>menu-open<?php } ?>">
          <a href="<?php echo site_url('tagihan_siswa_kelas/list_siswa') ?>" class="nav-link <?php if($active=='ajukan'){?>active<?php } ?>">
            <i class="nav-icon fa fa-th"></i>
            <p>
              Pengajuan Keringanan
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>

        </li>




      <?php } ?>

          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <!--menu tagihan-->


        </ul>
      </nav>
      <!-- Sidebar Menu -->
            <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
