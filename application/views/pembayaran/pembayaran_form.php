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
        <h2 style="margin-top:0px">Pembayaran <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nis <?php echo form_error('nis') ?></label>
            <input type="text" class="form-control" name="nis" id="nis" placeholder="Nis" value="<?php echo $nis; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Jn Tagihan <?php echo form_error('id_jn_tagihan') ?></label>
            <input type="text" class="form-control" name="id_jn_tagihan" id="id_jn_tagihan" placeholder="Id Jn Tagihan" value="<?php echo $id_jn_tagihan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nominal Bayar <?php echo form_error('nominal_bayar') ?></label>
            <input type="text" class="form-control" name="nominal_bayar" id="nominal_bayar" placeholder="Nominal Bayar" value="<?php echo $nominal_bayar; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl <?php echo form_error('tgl') ?></label>
            <input type="text" class="form-control" name="tgl" id="tgl" placeholder="Tgl" value="<?php echo $tgl; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ket <?php echo form_error('ket') ?></label>
            <input type="text" class="form-control" name="ket" id="ket" placeholder="Ket" value="<?php echo $ket; ?>" />
        </div>
	    <input type="hidden" name="id_pembayaran" value="<?php echo $id_pembayaran; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('pembayaran') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
