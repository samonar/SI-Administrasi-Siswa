<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">
<head>

    <!-- Basic -->
    <title>SD Al Firdaus Surakarta</title>

    <!-- DATA TABLES -->
    <link href="<?=base_url('assets/template/AdminLTE/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet" type="text/css" />

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
         <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/datatables/dataTables.bootstrap4.min.css">
       <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>dist/css/adminlte.min.css">


    <!-- Faficon -->
    <link rel="shortcut icon" sizes="16x16" href="<?=base_url('assets/template/margo/images/logo_sd.png');?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/font-awesome/css/font-awesome.min.css">
      <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://unpkg.com/ionicons@4.2.2/dist/css/ionicons.min.css" rel="stylesheet">

    <!-- Define Charset -->
    <meta charset="utf-8">

    <!-- Responsive Metatag -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Page Description and Author -->
    <meta name="description" content="Margo - Responsive HTML5 Template">
    <meta name="author" content="iThemesLab">

    <!-- Bootstrap CSS  -->


    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/template/margo/css/font-awesome.min.css');?>" media="screen">

    <!-- Margo CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/template/margo/css/style.css');?>" media="screen">

    <!-- Responsive CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/template/margo/css/responsive.css');?>" media="screen">

    <!-- Css3 Transitions Styles  -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/template/margo/css/animate.css');?>" media="screen">

    <!-- Color CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/template/margo/css/colors/red.css');?>" title="red" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/template/margo/css/colors/jade.css');?>" title="jade" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/template/margo/css/colors/green.css');?>" title="green" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/template/margo/css/colors/blue.css');?>" title="blue" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/template/margo/css/colors/beige.css');?>" title="beige" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/template/margo/css/colors/cyan.css');?>" title="cyan" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/template/margo/css/colors/orange.css');?>" title="orange" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/template/margo/css/colors/peach.css');?>" title="peach" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/template/margo/css/colors/pink.css');?>" title="pink" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/template/margo/css/colors/purple.css');?>" title="purple" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/template/margo/css/colors/sky-blue.css');?>" title="sky-blue" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/template/margo/css/colors/yellow.css');?>" title="yellow" media="screen" />


    <!-- Margo JS  -->



    <!--[if IE 8]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

</head>

<body>

    <!-- Full Body Container -->
    <div id="container" class="boxed-page">
        <!-- Start Header Section -->
        <div class="hidden-header"></div>
        <header class="clearfix">

            <!-- Start Top Bar -->
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <!-- Start Contact Info -->
                            <ul class="contact-details">
                                <li><a href="#"><i class="fa fa-map-marker"></i> Jalan Monginsidi No. 40, Kota Surakarta, Jawa Tengah 57134</a>
                                </li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i> surat@sman1-slo.sch.id</a>
                                </li>
                                <li><a href="#"><i class="fa fa-phone"></i> (0271) 652975</a>
                                </li>
                            </ul>
                            <!-- End Contact Info -->
                        </div><!-- .col-md-6 -->

                    </div><!-- .row -->
                </div><!-- .container -->
            </div><!-- .top-bar -->
            <div class="navbar navbar-default navbar-top">
                <div class="container">
                    <div class="navbar-header">
                        <!-- End Toggle Nav Link For Mobiles -->
                        <a class="navbar-brand" href="<?= base_url() ?>">
                            <img alt="" src="<?=base_url('assets/dist/img/sma1.jpg');?>" style="margin-right:20px;height: 42px;"><b><font color="green">SMA Negeri 1 Surakarta</font></b>
                        </a>
                    </div>

        <a href="<?php echo base_url('').'spp_siswa/logout' ?>" class="btn btn-info btn-sm offset-sm-7">
          <span class="ion ion-md-log-out"></span> Log out

        </a>
      </p>
                </div>
            </div>

        </header>
        <!-- End Header Section -->

        <?php

        $user=$this->session->userdata('username');

        ?>
        <!-- Start Page Banner -->
      </br></br></br></br></br></br></br>
        <div class="page-banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">

                        <h3>
                        </h3>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumbs">
                            <li><a href="<?= base_url() ?>">Beranda</a></li>
                            <li>Siakad</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Banner -->
