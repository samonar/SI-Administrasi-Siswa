<section class="content">
     <div class="container-fluid">
       <div class="row">
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

               <p class="text-muted text-center"><?php echo $nama->nis; ?></p>

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
                   <b> Saldo</b> <a class="float-right"><?php echo $nama->nominal ?></a>
                 </li>
                 <li class="list-group-item">
                   <b>Tagihan</b> <a class="float-right">
                     <?php echo "Rp ".number_format($totTagihan->total,"0",".",".")  ?>
                   </a>
                 </li>
               </ul>

               
             </div>
             <!-- /.card-body -->
           </div>
         </div>
         <!--tagihan dan pembayaran-->
         <div class="col-md-9">
           <!--tagihan siswa header-->
           <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pengajuan keringanan</h3>
              </div>
              <!-- isi tagihan -->
              <div class="card-body">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                    <th style="width: 10px">No</th>
                    <th>Jenis Tagihan</th>
                    <th>Bulan</th>
                    <th>Nominal</th>
                    <th style=" text-align:center">Action</th>
                  </tr>

                  <?php
                  $start=0;
                   foreach($data_tagihan as $row){?>
                  <tr>
                    <td><?php echo ++$start ?></td>
                    <td><?php echo $row->jn_tagihan ?></td>
                    <td><?php $row->bulan ?>
                      <?php
                         $bulan = array('1'=>'Januari','Februari','Maret' ,'April' ,'Mei','Juni','Juli','Agustus', 'September','Oktober','November','Desember');

                  foreach ($bulan as $index => $nama_bulan) {
                    if ($row->bulan==$index) {
                          echo $nama_bulan ;
                    }
                  }
                      ?>
                  </td>
                    <td><?php echo "Rp ".number_format($row->nominal_tagihan,"0",".",".")  ?></td>
                    <td style=" text-align:center">
                      <?php if ($row->status_bayar==1 ) {
                        echo '<span class="btn btn-success btn-sm disabled"><i class="icon fa fa-credit-card"></i> Bayar </span></span>';
                      } if($row->status_bayar==0) {?>
                        <a href="<?php echo base_url('tagihan_siswa_kelas/pengajuan_keringanan')?>/<?php echo $row->id_tagihan_siswa_kelas ?>/<?php echo $row->nis ?>"
                        <?php echo '<span class="btn btn-info btn-sm"><i class="icon fa fa-credit-card"></i> &nbsp Ajukan </span></span>';
                      }if ($row->status_bayar==2) {
                        echo '<span class="btn btn-warning btn-sm disabled"><i class="fa fa-exclamation"></i> Proses </span></span>';
                      } ?>
                    </td>
                  </tr>
                <?php } ?>
                </tbody></table>
              </div>
            </div>

         </div>
         <!-- /.col -->
       </div>
       <!-- /.row -->
     </div><!-- /.container-fluid -->
   </section>
