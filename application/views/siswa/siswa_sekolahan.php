
<body>

  <form action="<?php echo $action ?>" method="post" class="form" novalidate="">
        <div class="form-group row" >
                    <label class="col col-lg-2 offset-md-3">Tahun Periode<?php echo form_error('id_th_akademik')?></label>
                    <div class="col-md-4" >
                      <div class="form-group">
                            <label for="varchar">Nis <?php echo form_error('nis') ?></label>
                            <input type="text" class="form-control" name="nis" id="nis" placeholder="Nis" value="<?php echo $nis; ?>" />
                        </div>
                    </div>
                  </div>
        <div class="ln_solid"></div>
            <div class="form-group">
                    <div class="col-md-6 offset-5">
                      <button id="send" type="submit" class="btn btn-success">Cari Siswa</button>
                      <?php echo anchor(site_url('siswa/create'),'Tambah Siswa', 'class="btn btn-primary"'); ?>
            </div>
        </div>
  </form>

  <table id="example1" class="table table-striped table-bordered">
          <thead>
          <tr>
          <th>No</th>
          <th>NIS</th>
          <th>Nama Siswa</th>
          <th>Jenis Kelamin</th>
          <th>Nama Wali</th>
          <th>Nomer Wali</th>
          <th>Tahun Masuk</th>
          <th>Action</th>
          </tr>
          </thead>
          <tbody>
                    <?php
          $start = 0;

          foreach ($siswa as $row){

        ?>
        <tr>
          <td><?php echo ++$start ?></td>
          <td><?php echo $row->nis?></td>
          <td><?php echo $row->nama_siswa ?></td>
          <td><?php
          if (  $row->jk == 'l') {
            echo "Laki-Laki";
          }else {
            echo "Perempuan";
          }
          ?></td>
          <td><?php echo $row->nama_wali ?></td>
          <td><?php echo $row->no_hp_wali ?></td>
          <td><?php echo $row->th_masuk?></td>
          <td style="text-align:center" width="200px">
                <?php
                echo anchor(site_url('siswa/read/'.$row->nis),'Read');
                echo ' | ';
                echo anchor(site_url('siswa/update/'.$row->nis),'Update');
                echo ' | ';
                echo anchor(site_url('siswa/delete/'.$row->nis),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                ?>

          </td>


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
