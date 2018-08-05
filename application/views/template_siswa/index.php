<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view('template_siswa/header');
$this->load->view('template_siswa/sidebar');
$this->load->view($content);
$this->load->view('template_siswa/foot');
