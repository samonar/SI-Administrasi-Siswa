
         <!--end profil-->

         <!--tagihan dan pembayaran-->
         <div class="col-md-9">
           <!--tagihan siswa header-->
           <div class="card">
              <div class="card-header row">
                <h3 class="card-title">Tagihan Siswa</h3>
                <h8 class="col-md-4 offset-md-3"><?php echo $this->session->userdata('message') ?></h8>
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
