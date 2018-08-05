<div style="margin-top: 4px" class="text-center" id="message">
    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
</div>

<table class="table table-bordered table-striped" id="example1">
    <thead>
        <tr>
            <th>No</th>
            <th>nis</th>
            <th>nama siswa</th>
            <th>tingkat</th>
            <th>kelas</th>
            <th>tahun akedmik</th>
            <th>bulan</th>
            <th>semester</th>
            <th>jenis tagihan</th>
            <th>nominal tagihan</th>
            <th>dibayarkan</th>
            <th>status</th>
             <th>status</th>
        </tr>
    </thead>

    <tbody>
    <?php
        $start = 0;
        foreach ($det_tagihan_model_data as $det_tagihan){
    ?>
            <tr>
            <td><?php echo ++$start ?></td>
            <td><?php echo $det_tagihan->nis ?></td>
            <td><?php echo $det_tagihan->nama_siswa ?></td>
            <td><?php echo $det_tagihan->tingkat ?></td>
            <td><?php echo $det_tagihan->nama_kelas ?></td>
            <td><?php echo $det_tagihan->tahun ?></td>
            <td><?php $det_tagihan->bulan ?>
                <?php
                   $bulan = array('1'=>'Januari','Februari','Maret' ,'April' ,'Mei','Juni','Juli','agustus', 'September','Oktober','November','Desember');

            foreach ($bulan as $index => $nama_bulan) {
              if ($det_tagihan->bulan==$index) {
                    echo $nama_bulan ;
              }
            }
                ?>
            </td>
            <td><?php $det_tagihan->semester ?>
              <?php   if ($det_tagihan->semester==1) {
                    echo 'ganjil' ;
              }else{echo "genap";}
              ?>
            </td>
            <td><?php echo $det_tagihan->jn_tagihan ?></td>
            <td><?php echo $det_tagihan->nominal  ?></td>
            <td><?php echo $det_tagihan->nominal_bayar ?></td>
            <td><?php echo $det_tagihan->status_bayar ?></td>
            <td style="text-align:center" width="200px">
                <?php
                echo anchor(site_url('det_tagihan/read/'.$det_tagihan->id_det_tagihan),'Read');
                echo ' | ';
                echo anchor(site_url('det_tagihan/update/'.$det_tagihan->id_det_tagihan),'Update');
                echo ' | ';
                echo anchor(site_url('det_tagihan/delete/'.$det_tagihan->id_det_tagihan),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                ?>
            </td>
        </tr>
    <?php
        }
    ?>
    </tbody>
</table>
