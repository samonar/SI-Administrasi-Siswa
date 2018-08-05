<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>LOGIN ah</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>"/>
    <script src="<?php echo base_url('assets/js/jquery-1.11.2.min');?>"></script>
  </head>
  <body>
    <div class="login">
      <div></div>
      <h2 class="login-header">Sign in</h2>
      <?php echo form_open('user/proses_login','class="login-container"');?>
        <p>
          <?php echo validation_errors();?>
          <?php echo $this->session->flashdata('notification');?>
        </p>
        <p>
          <input type="text" name="username" placeholder="Username" required="required" value="<?php echo set_value('username');?>">
        </p>
        <p>
          <input type="password" name="password" placeholder="Password" required="required" value="<?php echo set_value('password');?>">
        </p>
        <p><input type="submit" value="Sign in"></p>
      </form>
    </div>
  </body>
</html>
