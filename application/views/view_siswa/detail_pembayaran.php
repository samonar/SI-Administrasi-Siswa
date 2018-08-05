

         <!--tagihan dan pembayaran-->
         <div class="col-md-9">
            <div class="card">
              <!--header pembayaran-->
               <div class="card-header">
                 <h3 class="card-title">Pembayaran Siswa</h3>
               </div>
               <!-- isi pembayaranr -->
               <div class="card-body">
                 <table class="table table-bordered table-striped" id="example1">
                   <tbody><tr>
                     <th style="width: 10px">No</th>
                     <th>Metode Pembayaran</th>
                     <th>No Virtual</th>
                     <th>Jenis Pembayaran</th>
                     <th>Nominal</th>
                     <th>Tanggal</th>
                   </tr>

                     <?php
                     $start=0;
                     foreach($pembayaran as $row){?>
                       <tr>
                       <td><?php echo ++$start ?></td>
                       <td><?php echo $row->ket ?></td>
                       <td style="text-align: center;"><?php if ($row->id_briva==0) {
                         echo '-';
                       }else {
                         echo $row->id_briva;
                       }  ?>
                       </td>
                       <td><?php echo $row->jn_tagihan ?></td>
                       <td><?php echo "Rp ".number_format($row->nominal_bayar,"0",".",".")?></td>
                       <td><span class="badge bg-success"><?php echo $row->tgl ?> </span></span></td>
                       </tr>
                <?php     }
                     ?>


                 </tbody></table>
               </div>
               <!-- footer pembayaran-->  
             </div>

         </div>
         <!-- /.col -->
       <!-- /.row -->
