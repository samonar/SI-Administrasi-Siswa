<section class="content">
     <div class="container-fluid">


         <!--tagihan dan pembayaran-->
         <div class="col">
           <!--tagihan siswa header-->

           <div class="card">
              <div class="card-header">
                <h3 class="card-title">List Pengajuan Keringanan</h3>
              </div>

                <div class="card-body">
                  <div class="form-group row">
                      <label class="col-md-3 " for="exampleInputFile">File input</label>
                  <table id="example1" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th style="text-align: center">no</th>
                        <th style="text-align: center">nama</th>
                        <th style="text-align: center">jenis tagihan</th>
                        <th style="text-align: center">Bulan</th>
                        <th style="text-align: center">tagihan awal</th>
                        <th style="text-align: center">pengajuan nominal</th>
                        <th style="text-align: center">status</th>
                        <th style="text-align: center">aksi</th>
                      </tr>
                    </thead>
                  <tbody>
                    <?php
                      $start = 0;
                      foreach ($list_pengajuan as $row ) {?>


                      <tr>
                        <td><?php echo ++$start  ?></td>
                        <td><?php echo $row->nama_siswa ?></td>
                        <td><?php echo $row->jn_tagihan ?></td>
                        <td>
                            <?php
                               $bulan = array('1'=>'Januari','Februari','Maret' ,'April' ,'Mei','Juni','Juli','Agustus', 'September','Oktober','November','Desember');

                        foreach ($bulan as $index => $nama_bulan) {
                          if ($row->bulan==$index) {
                                echo $nama_bulan ;
                          }
                        }
                            ?>
                        </td>
                        <td style="text-align: right"> <?php echo "Rp ".number_format($row->nominal_tagihan,"0",".",".")  ?></td>
                        <td style="text-align: right"> <?php echo "Rp ".number_format($row->nominal_akhir,"0",".",".")  ?></td>
                        <td style="text-align: center">
                          <?php if ($row->status_pengajuan==0){?>
                            <span class="badge bg-warning">Menunggu</span>
                          <?php }if($row->status_pengajuan==1) {?>
                            <span class="badge bg-success"><i></i>&nbsp Setujui &nbsp </span>
                          <?php }if ($row->status_pengajuan==2){ ?>
                            <span class="badge bg-danger"><i></i>&nbsp tolak &nbsp </span>
                          <?php } ?>
                        </td>
                        <td>
                          <?php if ($row->status_pengajuan==0){?>
                            <a href="<?php echo base_url('pengajuan/update_terima/1/'.$row->id_tagihan_siswa.'/'.$row->nominal_akhir) ?>" class="btn btn-success btn-sm"><i class="icon fa fa-check"></i>&nbsp;Setujui</a>
                            <a href="<?php echo base_url('pengajuan/update_tolak/2/'.$row->id_pengajuan) ?>" class="btn btn-danger btn-sm"><i class="icon fa fa-times"></i>&nbsp;Tolak</a>

                          <?php } else{?>
                          <a href="" class="btn btn-success btn-sm disabled"><i class="icon fa fa-check"></i>&nbsp Setujui</a>
                          <button type="button" class="btn btn-danger btn-sm disabled" ><i class="icon fa fa-times"></i>&nbsp Tolak</button>
                        <?php } ?>
                        </td>
                      </tr>
                     <?php } ?>
                  </tbody>
                  </table>
                </div>

                <!--card body end-->
                </div>

              <!-- isi tagihan -->

            </div>

         </div>
         <!-- /.col -->

       <!-- /.row -->
     </div><!-- /.container-fluid -->
   </section>
