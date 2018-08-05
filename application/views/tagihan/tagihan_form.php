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
        <h2 style="margin-top:0px">Tagihan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Th Akademik <?php echo form_error('id_th_akademik') ?></label>
            <input type="text" class="form-control" name="id_th_akademik" id="id_th_akademik" placeholder="Id Th Akademik" value="<?php echo $id_th_akademik; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Bulan <?php echo form_error('bulan') ?></label>
            <input type="text" class="form-control" name="bulan" id="bulan" placeholder="Bulan" value="<?php echo $bulan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Jn Tagihan <?php echo form_error('id_jn_tagihan') ?></label>
            <input type="text" class="form-control" name="id_jn_tagihan" id="id_jn_tagihan" placeholder="Id Jn Tagihan" value="<?php echo $id_jn_tagihan; ?>" />
        </div>
	    <input type="hidden" name="id_tagihan" value="<?php echo $id_tagihan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tagihan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>