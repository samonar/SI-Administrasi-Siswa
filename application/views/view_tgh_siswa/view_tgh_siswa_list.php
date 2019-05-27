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
        <h2 style="margin-top:0px">View_tgh_siswa List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('view_tgh_siswa/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('view_tgh_siswa/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('view_tgh_siswa'); ?>" class="btn btn-default">Reset</a>
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
		<th>Nominal</th>
		<th>Status</th>
		<th>Bulan</th>
		<th>Jn Tagihan</th>
		<th>Tahun</th>
		<th>Semester</th>
		<th>Id Det Tagihan</th>
		<th>Nis</th>
		<th>Nama Siswa</th>
		<th>Jk</th>
		<th>Nama Kelas</th>
		<th>Tingkat</th>
		<th>Id Pembayaran</th>
		<th>Nominal Bayar</th>
		<th>Action</th>
            </tr><?php
            foreach ($view_tgh_siswa_data as $view_tgh_siswa)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $view_tgh_siswa->nominal ?></td>
			<td><?php echo $view_tgh_siswa->status ?></td>
			<td><?php echo $view_tgh_siswa->bulan ?></td>
			<td><?php echo $view_tgh_siswa->jn_tagihan ?></td>
			<td><?php echo $view_tgh_siswa->tahun ?></td>
			<td><?php echo $view_tgh_siswa->semester ?></td>
			<td><?php echo $view_tgh_siswa->id_det_tagihan ?></td>
			<td><?php echo $view_tgh_siswa->nis ?></td>
			<td><?php echo $view_tgh_siswa->nama_siswa ?></td>
			<td><?php echo $view_tgh_siswa->jk ?></td>
			<td><?php echo $view_tgh_siswa->nama_kelas ?></td>
			<td><?php echo $view_tgh_siswa->tingkat ?></td>
			<td><?php echo $view_tgh_siswa->id_pembayaran ?></td>
			<td><?php echo $view_tgh_siswa->nominal_bayar ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('view_tgh_siswa/read/'.$view_tgh_siswa),'Read'); 
				echo ' | '; 
				echo anchor(site_url('view_tgh_siswa/update/'.$view_tgh_siswa),'Update'); 
				echo ' | '; 
				echo anchor(site_url('view_tgh_siswa/delete/'.$view_tgh_siswa),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>