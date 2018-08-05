        <!-- Start Content -->
        <div id="content">
            <div class="container">
                <div class="row sidebar-page">

                    <!--Sidebar-->
                    <div class="col-md-3">
                      <!-- Profile Siswa -->
                      <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                          <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                 src=" <?php echo base_url('assets/foto/murid.png') ?> "
                                 alt="User profile picture">
                          </div>

                          <h3 class="profile-username text-center"><?php echo $nama->nama_siswa ?></h3>

                          <a href="<?php echo base_url('spp_siswa') ?>" class="btn btn-primary btn-block"><b>Beranda</b></a>
                          <a href="<?php echo base_url('spp_siswa/detail_tagihan') ?>" class="btn btn-success btn-block"><b>Tagihan</b></a>
                          <a href="<?php echo base_url('spp_siswa/detail_pembayaran') ?>" class="btn btn-success btn-block"><b>Pembayaran</b></a>
                          <a href="<?php echo base_url('spp_siswa/pesan') ?>" class="btn btn-warning btn-block"><b>Pesan Masuk</b></a>

                          <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                              <b>Jenis Kelamin</b> <a class="float-right"><?php if ($nama->jk='l') {
                                echo 'Laki-Laki';} else {echo 'Perempuan';} ?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Kelas</b> <a class="float-right"><?php echo $nama->tingkat.' '.$nama->nama_kelas ?></a>
                            </li>
                            <li class="list-group-item">
                              <b>No Virtual</b> <a class="float-right"><?php echo $nama->id_virtual ?></a>
                            </li>
                            <li class="list-group-item">
                              <b> Saldo</b> <a class="float-right"><?php echo "Rp ".number_format($nama->nominal,"0",".",".") ?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Tagihan</b> <a class="float-right">
                                <?php echo "Rp ".number_format($totTagihan->total,"0",".",".")  ?>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <!--End sidebar-->
