<body>
<table class="table table-bordered table-striped" id="example1">
    <thead>
        <tr>
             <tr>
              <th style="text-align: center; width: 40px;">No</th>
              <th style="text-align: center; width: 100px;">briva</th>
              <th style="text-align: center; width: 250px;">jumlah</th>
        </tr>
    </thead>

    <tbody>
    <?php
        $start = 0;
          foreach (array_keys($bayar) as $i ){

    ?>
            <tr>
            <td style="text-align: center"><?php echo ($i+1) ?></td>
            <td style="text-align: center"><?php print_r ($bayar[$i]->total) ?></td>
            <td><?php print_r ($briva[$i]->briva) ?></td>
        </tr>

    <?php
        }
    ?>
    <div class="col-md-4">
      <?php echo anchor(site_url('kelas_siswa/create/'),'Create', 'class="btn btn-primary"'); ?>
    </div>
    </tbody>
</table>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
