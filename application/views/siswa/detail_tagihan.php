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
                   <b> Saldo</b> <a class="float-right"><?php echo "Rp ".number_format($nama->nominal,"0",".",".") ?></a>
                 </li>
                 <li class="list-group-item">
                   <b>Tagihan</b> <a class="float-right">
                     <?php echo "Rp ".number_format($totTagihan->total,"0",".",".")  ?></a>
                 </li>
                 <a href="<?php echo base_url('tagihan_siswa_kelas/excel/'.$nama->nis) ?>" class="btn btn-primary btn-block"><b>Laporan Administrasi</b></a>

               </ul>


             </div>
             <!-- /.card-body -->
           </div>
         </div>
         <!--tagihan dan pembayaran-->
         <div class="col-md-9">
           <!--tagihan siswa header-->
           <div class="card">
              <div class="card-header row">
                <h3 class="card-title">Tagihan Siswa</h3>
                <h5 class="col-md-5 offset-md-3" style="font-weight:  bold;"><?php echo $this->session->userdata('message') ?></h5>
              </div>
              <!-- isi tagihan -->
              <div class="card-body">
                <table class="table table-bordered table-striped" id="example1">
                    <thead>
                      <tr>
                        <th style="width: 10px">No</th>
                        <th>Jenis Tagihan</th>
                        <th>Bulan</th>
                        <th>Nominal</th>
                        <th style="width: 40px">Status</th>
                        <th style=" text-align:center">Action</th>
                      </tr>
                    </thead>

                    <tbody>
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
                        <td><?php echo "Rp ".number_format($row->nominal_tagihan,"0",".",".")?></td>

                        <td>
                          <?php if ($row->status_bayar==1 ) {
                            echo '<span class="badge bg-success"><i class="icon fa fa-check"></i> Lunas </span></span>';
                          } else {echo '<span class="badge bg-danger"><i class="icon fa fa-times"></i> Belum </span></span>';} ?>
                        </td>
                        <td style=" text-align:center">
                          <?php if ($row->status_bayar==1 ) { ?>
                            <a href="<?php echo base_url('Tagihan_siswa_kelas/kwitansi')?>/<?php echo $row->id_tagihan_siswa_kelas ?>"
                            <?php echo '<span class="btn btn-info btn-sm"><i class="icon fa fa-credit-card"></i> &nbsp Cetak Kwitansi </span></span>';
                          } else {?>
                            <a href="<?php echo base_url('pembayaran/create_bayar')?>/<?php echo $row->id_tagihan_siswa_kelas ?>/<?php echo $row->nis ?>"
                            <?php echo '<span class="btn btn-success btn-sm"><i class="icon fa fa-credit-card"></i> &nbsp Bayar </span></span>';
                          } ?>
                          </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                </table>
              </div>
            </div>

            <div class="card">
              <!--header pembayaran-->
               <div class="card-header">
                 <h3 class="card-title">Pembayaran Siswa</h3>
               </div>
               <!-- isi pembayaranr -->
               <div class="card-body">
                 <table class="table table-bordered table-striped" id="example3">
                     <thead>
                       <tr>
                         <th style="width: 10px">No</th>
                         <th style="text-align:center">Jenis Tagihan</th>
                         <th style="text-align:center">Jenis Pembayaran</th>
                         <th style="text-align:center">Id briva</th>
                         <th style="text-align:center">Nominal</th>
                         <th style=" text-align:center">Keterangan</th>
                       </tr>
                     </thead>

                     <tbody>
                       <?php
                       $start=0;
                        foreach($pembayaran as $row){?>
                       <tr>
                         <td><?php echo ++$start ?></td>
                         <td><?php echo $row->jn_tagihan ?></td>
                         <td><?php echo $row->ket ?></td>
                         <td><?php if ($row->id_briva==0) {
                           echo "-";
                         }else {
                           echo $row->id_briva;
                         }   ?></td>
                         <td style="text-align:right"><?php echo "Rp ".number_format($row->nominal_bayar,"0",".",".")?></td>
                         <td><span class="badge bg-success"><?php echo $row->tgl ?> </span></span></td>
                       </tr>
                     <?php } ?>
                     </tbody>
                 </table>
               </div>
             </div>

         </div>
         <!-- /.col -->
       </div>
       <!-- /.row -->
     </div><!-- /.container-fluid -->
   </section>
