<body>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
        <i class="ion ion-clipboard mr-1"></i>
          Data Siswa <?php echo $kelas->tingkat.' '. $kelas->nama_kelas ?> Bulan Ini
      </h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php $i=0;
              foreach ($export_pembayaran as $row){
                $i++;
              } echo $i;?></h3>

              <p>Siswa Lunas</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo base_url('')?>exportexcel/export_pembayaran/<?php echo $idkls ?>/<?php echo $bln ?>" class="small-box-footer">Unduh Laporan<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php $j=0;
              foreach ($export_tagihan as $row){
                $row->nis;
                $j++;
              } echo $j;?><sup style="font-size: 20px"></sup></h3>

              <p>Siswa Belum Lunas</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url('')?>exportexcel/export_tagihan/<?php echo $idkls ?>/<?php echo $bln ?>" class="small-box-footer">Unduh Laporan <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        </div>
        <!-- ./col -->
      </div>
    </div>
  </div>


  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
        <i class="ion ion-clipboard mr-1"></i>
          Pembayaran Siswa <?php echo $kelas->tingkat.' '. $kelas->nama_kelas ?>
      </h3>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped" id="example1">
          <thead>
              <tr>
                   <tr>
                    <th style="text-align: center; width: 40px;">No</th>
                    <th style="text-align: center; width: 100px;">NIS</th>
                    <th style="text-align: center; width: 250px;">Nama Siswa</th>
                    <th style="text-align: center; width: 100px;">Kelas</th>
                    <th style="text-align: center; width: 100px;">Jenis Kelamin</th>
                    <th style="text-align: center; width: 100px;">Data Siswa</th>
              </tr>
          </thead>

          <tbody>
          <?php
              $start = 0;
              foreach ($siswa_data as $siswa){
          ?>
                  <tr>
                  <td style="text-align: center"><?php echo ++$start ?></td>
                  <td style="text-align: center"><?php echo $siswa->nis ?></td>
                  <td><?php echo $siswa->nama_siswa ?></td>
                  <td style="text-align: center"><?php echo $siswa->tingkat.' '.$siswa->nama_kelas ?></td>
                  <td style="text-align: center">
                      <?php   if ($siswa->jk=='l' || $siswa->jk=='L' ) {
                          echo 'Laki Laki' ;
                    }else{echo "Perempuan";}
                    ?>
                  </td>
                  <td style="text-align:center">
                    <?php echo anchor(site_url('tagihan_siswa_kelas/detail_tagihan/'.$siswa->nis) ,
                    '<i class="fa fa-files-o"></i>&nbspPembayaran', 'class="btn btn-success btn-sm"'); ?>
                  </td>
              </tr>

          <?php
              }
          ?>
          <div class="col-md-4">
            <?php echo anchor(site_url('kelas_siswa/create/'.$kelas->tingkat.''.$kelas->nama_kelas),'Tambah Siswa', 'class="btn btn-primary"'); ?>
          </br>
          </div></br>
          </tbody>
      </table>
    </div>
  </div>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
