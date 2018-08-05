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
        <h2 style="margin-top:0px">Tagihan_siswa_kls <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Kelas Siswa <?php echo form_error('id_kelas_siswa') ?></label>
            <input type="text" class="form-control" name="id_kelas_siswa" id="id_kelas_siswa" placeholder="Id Kelas Siswa" value="<?php echo $id_kelas_siswa; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Tagihan Bulanan <?php echo form_error('id_tagihan_bulanan') ?></label>
            <input type="text" class="form-control" name="id_tagihan_bulanan" id="id_tagihan_bulanan" placeholder="Id Tagihan Bulanan" value="<?php echo $id_tagihan_bulanan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Pembayaran <?php echo form_error('id_pembayaran') ?></label>
            <input type="text" class="form-control" name="id_pembayaran" id="id_pembayaran" placeholder="Id Pembayaran" value="<?php echo $id_pembayaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Bulan <?php echo form_error('bulan') ?></label>
            <input type="text" class="form-control" name="bulan" id="bulan" placeholder="Bulan" value="<?php echo $bulan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nominal Tagihan <?php echo form_error('nominal_tagihan') ?></label>
            <input type="text" class="form-control" name="nominal_tagihan" id="nominal_tagihan" placeholder="Nominal Tagihan" value="<?php echo $nominal_tagihan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status Bayar <?php echo form_error('status_bayar') ?></label>
            <input type="text" class="form-control" name="status_bayar" id="status_bayar" placeholder="Status Bayar" value="<?php echo $status_bayar; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Date <?php echo form_error('date') ?></label>
            <input type="text" class="form-control" name="date" id="date" placeholder="Date" value="<?php echo $date; ?>" />
        </div>
	    <input type="hidden" name="id_tagihan_siswa_kelas" value="<?php echo $id_tagihan_siswa_kelas; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tagihan_siswa_kls') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>