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
        <h2 style="margin-top:0px">Tagihan Read</h2>
        <table class="table">
	    <tr><td>Id Th Akademik</td><td><?php echo $id_th_akademik; ?></td></tr>
	    <tr><td>Bulan</td><td><?php echo $bulan; ?></td></tr>
	    <tr><td>Id Jn Tagihan</td><td><?php echo $id_jn_tagihan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tagihan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>