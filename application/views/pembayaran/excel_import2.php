<html>
<head>
	<title>Excel import thousand row data in second's coba</title>
</head>
<body>
	<h1>Excel import thousand row data in second's coba ciba</h1>
	<div class="card-body">
		<div class="form-group row">
	<?php
	echo form_open_multipart('excel_import2/import_data');
	echo form_upload('file');
	echo '<br/>';
	echo form_submit(null, 'Upload');
	echo form_close();
	?>
</div>
</div>
	<h4>Total data : <?php echo $num_rows;?></h4>
</body>
</html>
