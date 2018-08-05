<section class="content">
     <div class="container-fluid">


         <!--tagihan dan pembayaran-->
         <div class="col">
           <!--tagihan siswa header-->

           <div class="card">
              <div class="card-header row">
                <h3 class="card-title">Pembayaran Via Bank</h3>
                <h4 class="col-md-4 offset-md-3" style="color: #28a745;"><?php echo $this->session->userdata('message') ?></h4>
              </div>

                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-md-2 offset-md-2" for="exampleInputFile">File input</label>
                      <div class="col-md-4">
                        <div class="form-group">
                          <?php echo form_open_multipart('excel_import2/import_data');?>
                          <div class="custom-file">
                        <input type="file" class="form-control" name="file">
                      </div>

                        </div>
                    </div>
                  </div>
                  <div class="form-group row">
                      <div class="offset-4">
                        <button id="Upload" name="upload" type="Upload" class="btn btn-success">&nbsp&nbsp&nbspUpload &nbsp&nbsp&nbsp</button>
                      </div>&nbsp&nbsp&nbsp&nbsp
                      <?php echo form_close()?>
                      <div class="offset">
                          <button id="Upload" name="upload" onclick="window.location.href='<?php echo base_url('pembayaran/sinkron') ?>'" class="btn btn-info">&nbsp&nbsp&nbsp Syncronize &nbsp&nbsp&nbsp</button>
                      </div>

                  </div>


                    <div class="form-group row">
                      <label class="col-md-3 " for="exampleInputFile">Data Pembayaran Bank</label>
                  <table id="example1" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th style="text-align: center">no</th>
                        <th style="text-align: center">date</th>
                        <th style="text-align: center">time</th>
                        <th style="text-align: center">briva</th>
                        <th style=" width:120px; text-align: center ">jumlah</th>
                      </tr>
                    </thead>
                  <tbody>
                    <?php
                    $start=0;
                    foreach ($briva as $row) {?>
                      <tr>
                        <td><?php echo ++$start ?></td>
                        <td><?php echo $row->date ?></td>
                        <td><?php echo $row->time ?></td>
                        <td><?php echo $row->briva ?></td>
                        <td style="text-align: right"> <?php echo "Rp ".number_format($row->jumlah,"0",".",".")  ?></td>
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
