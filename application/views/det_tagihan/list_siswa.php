
<div style="margin-top: 4px" class="text-center" id="message">
    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
</div>

<table class="table table-bordered table-striped" id="example1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nis</th>
            <th>nama siswa</th>
            <th>kelas</th>
            <th>semester</th>
            <th>Action</th>

        </tr>
    </thead>

    <tbody>
    <?php
        $start = 0;
        foreach ($det_tagihan_model_data as $det_tagihan){
    ?>
            <tr>
            <td><?php echo ++$start ?></td>
            <td><?php echo $det_tagihan->nama_siswa ?></td>
            <td><?php echo $det_tagihan->nis ?></td>
            <td><?php echo $det_tagihan->tingkat .' '.$det_tagihan->nama_kelas ?></td>
            <td><?php $det_tagihan->semester ?>
              <?php   if ($det_tagihan->semester==1) {
                    echo 'ganjil' ;
              }else{echo "genap";}
              ?>
            </td>
            <td>
              <a href="<?php echo base_url('tagihan_siswa_kelas/daftar_pengajuan')?>/<?php echo $det_tagihan->nis?>"
              <?php echo '<span class="btn btn-success btn-sm"><i class="icon fa fa-credit-card"></i> &nbsp Ajukan Keringanan </span></span>';?>
          </td>
            </td>
        </tr>
    <?php
        }
    ?>

    </tbody>
</table>
<div class="col-md-4">
                <?php echo anchor(site_url('tagihan_siswa_kelas/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
