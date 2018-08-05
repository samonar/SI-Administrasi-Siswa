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
        <h2 style="margin-top:0px">Tagihan_siswa_kls List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('tagihan_siswa_kls/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('tagihan_siswa_kls/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('tagihan_siswa_kls'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Kelas Siswa</th>
		<th>Id Tagihan Bulanan</th>
		<th>Id Pembayaran</th>
		<th>Bulan</th>
		<th>Nominal Tagihan</th>
		<th>Status Bayar</th>
		<th>Date</th>
		<th>Action</th>
            </tr><?php
            foreach ($tagihan_siswa_kls_data as $tagihan_siswa_kls)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $tagihan_siswa_kls->id_kelas_siswa ?></td>
			<td><?php echo $tagihan_siswa_kls->id_tagihan_bulanan ?></td>
			<td><?php echo $tagihan_siswa_kls->id_pembayaran ?></td>
			<td><?php echo $tagihan_siswa_kls->bulan ?></td>
			<td><?php echo $tagihan_siswa_kls->nominal_tagihan ?></td>
			<td><?php echo $tagihan_siswa_kls->status_bayar ?></td>
			<td><?php echo $tagihan_siswa_kls->date ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('tagihan_siswa_kls/read/'.$tagihan_siswa_kls->id_tagihan_siswa_kelas),'Read'); 
				echo ' | '; 
				echo anchor(site_url('tagihan_siswa_kls/update/'.$tagihan_siswa_kls->id_tagihan_siswa_kelas),'Update'); 
				echo ' | '; 
				echo anchor(site_url('tagihan_siswa_kls/delete/'.$tagihan_siswa_kls->id_tagihan_siswa_kelas),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('tagihan_siswa_kls/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>