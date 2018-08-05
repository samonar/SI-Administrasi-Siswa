<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Sistem Administrasi</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?=base_url('assets/template/login/bootstrap/css/bootstrap.min.css');?>">
        <link rel="stylesheet" href="<?=base_url('assets/template/login/font-awesome/css/font-awesome.min.css');?>">
        <link rel="stylesheet" href="<?=base_url('assets/template/login/css/form-elements.css')?>">
        <link rel="stylesheet" href="<?=base_url('assets/template/login/css/style.css');?>">

        <!-- Favicon and touch icons -->
        <!-- <link rel="shortcut icon" href="<?=base_url('assets/template/login/ico/favicon.png');?>"> -->
        <link rel="shortcut icon" sizes="16x16" href="<?=base_url('assets/dist/img/sma1.jpg');?>">
        <link rel="apple-touch-icon-precomposed" href="<?=base_url('assets/template/login/ico/apple-touch-icon-144-precomposed.png');?>" sizes="144x144">
        <link rel="apple-touch-icon-precomposed" href="<?=base_url('assets/template/login/ico/apple-touch-icon-114-precomposed.png');?>" sizes="114x114">
        <link rel="apple-touch-icon-precomposed" href="<?=base_url('assets/template/login/ico/apple-touch-icon-72-precomposed.png');?>" sizes="72x72">
        <link rel="apple-touch-icon-precomposed" href="<?=base_url('assets/template/login/ico/apple-touch-icon-57-precomposed.png');?>">

    </head>

    <body background="<?=base_url('assets/template/login/img/backgrounds/3.jpg');?>">

        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Login SPP</h3>
                                    <p>Masukkan username dan password</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form role="form" action="<?php echo base_url('User/login');?>" method="post" class="login-form">
                                    <?php echo $this->session->flashdata('message');?>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">Username</label>
                                        <input type="text" name="username" placeholder="Username / NIS..." class="form-username form-control" id="form-username">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                                    </div>
                                    <button type="submit" class="btn btn-danger btn-lg">Log In!</button>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <!-- Javascript -->
        <script src="<?=base_url('assets/template/login/js/jquery-1.11.1.min.js');?>"></script>
        <script src="<?=base_url('assets/template/login/bootstrap/js/bootstrap.min.js');?>"></script>
        <script src="<?=base_url('assets/template/login/js/jquery.backstretch.min.js');?>"></script>
        <script src="<?=base_url('assets/template/login/js/scripts.js');?>"></script>

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
