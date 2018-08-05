<!doctype html>
<html>
    <body>
        <h2 style="margin-top:0px">Th_akademik List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('th_akademik/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('th_akademik/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('th_akademik'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table id="example1" class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Tahun</th>
		<th>Semester</th>
		<th>Status</th>
		<th>Action</th>
            </tr><?php
            foreach ($th_akademik_data as $th_akademik)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $th_akademik->tahun ?></td>
			<td><?php echo $th_akademik->semester ?></td>
			<td><?php echo $th_akademik->status ?></td>
			<td style="text-align:center" width="200px">
				<?php
				echo anchor(site_url('th_akademik/read/'.$th_akademik->id_th_akademik),'Read');
				echo ' | ';
				echo anchor(site_url('th_akademik/update/'.$th_akademik->id_th_akademik),'Update');
				echo ' | ';
				echo anchor(site_url('th_akademik/delete/'.$th_akademik->id_th_akademik),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
