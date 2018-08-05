
<body>

  <form action="<?php echo $action ?>" method="post" class="form" novalidate="">
    <div class="col col-lg-4 offset-md-5" >
    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
    </div>
        <div class="form-group row" >
                    <label class="col col-lg-2 offset-md-3">Tahun Periode<?php echo form_error('id_th_akademik')?></label>
                    <div class="col-md-4" >
                      <select name="id_th_akademik" class="form-control">
                          <option disabled="" selected="">-- Pilih Tahun --</option>
                          <?php foreach ($id_th_akademik->result() as $row) {?>
                          <option value="<?php echo $row->id_th_akademik ?>"><?php echo $row->tahun?> - <?php if ($row->semester==1) {
                            echo "Ganjil";
                          }else {
                            echo "Genap";
                          } ?> </option>
                          <?php } ?>

                      </select>
                    </div>
                  </div>
        <div class="ln_solid"></div>
            <div class="form-group">
                    <div class="col-md-6 offset-5">
                      <button id="send" type="submit" class="btn btn-success">Cari Tagihan</button>
                      <?php echo anchor(site_url('tagihan_bulanan/create'),'Input Tagihan', 'class="btn btn-primary"'); ?>
            </div>
        </div>
  </form>

  <table id="example1" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Jenis Biaya</th>
          <th>Kelas</th>
          <th>Bulan</th>
          <th>Nominal</th>
          <th>Tahun Periode</th>
          <th>Semester</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
          $start = 0;

          foreach ($query as $row){

        ?>
        <tr>
          <td><?php echo ++$start ?></td>
          <td><?php echo $row->jn_tagihan?></td>
          <td><?php echo $row->kelas ?></td>

          <td><?php $row->bulan ?>
            <?php
               $bulan = array('1'=>'Januari','Februari','Maret' ,'April' ,'Mei','Juni','Juli','agustus', 'September','Oktober','November','Desember');

        foreach ($bulan as $index => $nama_bulan) {
          if ($row->bulan==$index) {
                echo $nama_bulan ;
          }
        }
            ?>
        </td>

          <td><?php echo $row->nominal ?></td>
          <td><?php echo $row->tahun ?></td>
          <td><?php echo $row->semester?></td>


        </tr>
        <?php
          }
        ?>
                </tbody>
  </table>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
