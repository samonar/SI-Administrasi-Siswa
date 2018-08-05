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
        <h2 style="margin-top:0px">Tagihan_siswa_kls Read</h2>
        <table class="table">
	    <tr><td>Id Kelas Siswa</td><td><?php echo $id_kelas_siswa; ?></td></tr>
	    <tr><td>Id Tagihan Bulanan</td><td><?php echo $id_tagihan_bulanan; ?></td></tr>
	    <tr><td>Id Pembayaran</td><td><?php echo $id_pembayaran; ?></td></tr>
	    <tr><td>Bulan</td><td><?php echo $bulan; ?></td></tr>
	    <tr><td>Nominal Tagihan</td><td><?php echo $nominal_tagihan; ?></td></tr>
	    <tr><td>Status Bayar</td><td><?php echo $status_bayar; ?></td></tr>
	    <tr><td>Date</td><td><?php echo $date; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tagihan_siswa_kls') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>