<div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-check-square"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sukses</span>
                <span class="info-box-number">
                  <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
</div>
