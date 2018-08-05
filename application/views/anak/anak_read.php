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
        <h2 style="margin-top:0px">Anak Read</h2>
        <table class="table">
	    <tr><td>Siswa</td><td><?php echo $siswa; ?></td></tr>
	    <tr><td>Kelas</td><td><?php echo $kelas; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('anak') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>