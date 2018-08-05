

  <?php
  $this->load->view('template/header');
  $this->load->view('template/sidebar');
   ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div><!-- /.col -->
        
        </div><!-- /.row -->

      </div><!-- /.container-fluid -->

    </div>
    <!-- /.content-header -->
    <div class="content">
      <div class="content container-fluid">
        <?php echo $content;?>
      </div>
    </div>
    <!-- Main content -->
    <!-- /.content -->
  </div>
<?php
$this->load->view('template/foot');
 ?>
