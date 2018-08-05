<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">View_tgh_siswa Read</h2>
        <table class="table">
	    <tr><td>Nominal</td><td><?php echo $nominal; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Bulan</td><td><?php echo $bulan; ?></td></tr>
	    <tr><td>Jn Tagihan</td><td><?php echo $jn_tagihan; ?></td></tr>
	    <tr><td>Tahun</td><td><?php echo $tahun; ?></td></tr>
	    <tr><td>Semester</td><td><?php echo $semester; ?></td></tr>
	    <tr><td>Id Det Tagihan</td><td><?php echo $id_det_tagihan; ?></td></tr>
	    <tr><td>Nis</td><td><?php echo $nis; ?></td></tr>
	    <tr><td>Nama Siswa</td><td><?php echo $nama_siswa; ?></td></tr>
	    <tr><td>Jk</td><td><?php echo $jk; ?></td></tr>
	    <tr><td>Nama Kelas</td><td><?php echo $nama_kelas; ?></td></tr>
	    <tr><td>Tingkat</td><td><?php echo $tingkat; ?></td></tr>
	    <tr><td>Id Pembayaran</td><td><?php echo $id_pembayaran; ?></td></tr>
	    <tr><td>Nominal Bayar</td><td><?php echo $nominal_bayar; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('view_tgh_siswa') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>