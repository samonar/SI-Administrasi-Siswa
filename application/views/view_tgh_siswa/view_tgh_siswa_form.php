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
        <h2 style="margin-top:0px">View_tgh_siswa <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Nominal <?php echo form_error('nominal') ?></label>
            <input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal" value="<?php echo $nominal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Bulan <?php echo form_error('bulan') ?></label>
            <input type="text" class="form-control" name="bulan" id="bulan" placeholder="Bulan" value="<?php echo $bulan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jn Tagihan <?php echo form_error('jn_tagihan') ?></label>
            <input type="text" class="form-control" name="jn_tagihan" id="jn_tagihan" placeholder="Jn Tagihan" value="<?php echo $jn_tagihan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tahun <?php echo form_error('tahun') ?></label>
            <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Semester <?php echo form_error('semester') ?></label>
            <input type="text" class="form-control" name="semester" id="semester" placeholder="Semester" value="<?php echo $semester; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Det Tagihan <?php echo form_error('id_det_tagihan') ?></label>
            <input type="text" class="form-control" name="id_det_tagihan" id="id_det_tagihan" placeholder="Id Det Tagihan" value="<?php echo $id_det_tagihan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nis <?php echo form_error('nis') ?></label>
            <input type="text" class="form-control" name="nis" id="nis" placeholder="Nis" value="<?php echo $nis; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Siswa <?php echo form_error('nama_siswa') ?></label>
            <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" placeholder="Nama Siswa" value="<?php echo $nama_siswa; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jk <?php echo form_error('jk') ?></label>
            <input type="text" class="form-control" name="jk" id="jk" placeholder="Jk" value="<?php echo $jk; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Kelas <?php echo form_error('nama_kelas') ?></label>
            <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" placeholder="Nama Kelas" value="<?php echo $nama_kelas; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tingkat <?php echo form_error('tingkat') ?></label>
            <input type="text" class="form-control" name="tingkat" id="tingkat" placeholder="Tingkat" value="<?php echo $tingkat; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Pembayaran <?php echo form_error('id_pembayaran') ?></label>
            <input type="text" class="form-control" name="id_pembayaran" id="id_pembayaran" placeholder="Id Pembayaran" value="<?php echo $id_pembayaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nominal Bayar <?php echo form_error('nominal_bayar') ?></label>
            <input type="text" class="form-control" name="nominal_bayar" id="nominal_bayar" placeholder="Nominal Bayar" value="<?php echo $nominal_bayar; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php   ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('view_tgh_siswa') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>