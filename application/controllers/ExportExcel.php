<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ExportExcel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tagihan_siswa_kls_model');
         $this->load->model('Jn_tagihan_model');
         $this->load->model('Kelas_siswa_model');
         $this->load->model('Siswa_model');
         $this->load->model('Kelas_model');
         $this->load->model('Pembayaran_model');
         $this->load->model('Tagihan_bulanan_model');
         $this->load->model('Th_akademik_model');
          $this->load->model('User_model');
        $this->load->library(array('form_validation','upload','image_lib','template','session'));
        $this->load->helper(array('form', 'url', 'html'));

        $session_login=$this->session->userdata('logged_in');
        $user_data=$this->User_model->get_by_id($this->session->userdata('nik'));
        $cek=$this->session->userdata('nama_jabatan');

        $session_jabatan=$this->session->userdata('nama_jabatan');
        if($session_jabatan!='admin TU'){
            redirect('user');
        }

    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tagihan_siswa_kls.xls";
        $judul = "tagihan_siswa_kls";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kelas Siswa");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Tagihan Bulanan");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Pembayaran");
	xlsWriteLabel($tablehead, $kolomhead++, "Bulan");
	xlsWriteLabel($tablehead, $kolomhead++, "Nominal Tagihan");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Bayar");
	xlsWriteLabel($tablehead, $kolomhead++, "Date");

	foreach ($this->Tagihan_siswa_kls_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kelas_siswa);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_tagihan_bulanan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_pembayaran);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bulan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nominal_tagihan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_bayar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->date);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function export_pembayaran($idkls,$bln)
    {
        $this->load->helper('exportexcel');
        $namaFile = "Rekap Pembayran Siswa.xls";
        $judul = "Rekap Pembayaran Siswa";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "NIS");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Siswa");
	xlsWriteLabel($tablehead, $kolomhead++, "Tingkat");
	xlsWriteLabel($tablehead, $kolomhead++, "Kelas");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Tagihan");
  xlsWriteLabel($tablehead, $kolomhead++, "Bulan");
  xlsWriteLabel($tablehead, $kolomhead++, "Nominal");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Date");

	foreach ($this->Tagihan_siswa_kls_model->export_pembayaran_bulanan($idkls,$bln)->result() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nis);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_siswa);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tingkat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kelas);
      xlsWriteLabel($tablebody, $kolombody++, $data->jn_tagihan);
         $bulan = array('1'=>'Januari','Februari','Maret' ,'April' ,'Mei','Juni','Juli','Agustus', 'September','Oktober','November','Desember');
      foreach ($bulan as $index => $nama_bulan) {
        if ($data->bulan==$index) {
          $bulan=$nama_bulan ;
        }
      }
      xlsWriteLabel($tablebody, $kolombody++,$bulan );
	    xlsWriteNumber($tablebody, $kolombody++, $data->nominal_tagihan);
      if ($data->status_bayar=1) {
        $ket='Lunas';
      }
	    xlsWriteLabel($tablebody, $kolombody++, $ket);
      xlsWriteLabel($tablebody, $kolombody++, $data->date);

	    $tablebody++;
            $nourut++;
        }
        $judul=$tablebody+2;
        xlsWriteLabel($judul,0, "Total Uang Masuk =");
        foreach ($this->Tagihan_siswa_kls_model->sum_export_pembayaran($idkls,$bln)->result() as $col ) {
          xlsWriteNumber($judul++, 1, $col->total);
        }

        xlsEOF();
        exit();
    }

    public function export_tagihan($idkls,$bln)
    {
        $this->load->helper('exportexcel');
        $namaFile = "Rekap Pembayran Siswa.xls";
        $judul = "Rekap Pembayaran Siswa";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "NIS");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Siswa");
	xlsWriteLabel($tablehead, $kolomhead++, "Tingkat");
	xlsWriteLabel($tablehead, $kolomhead++, "Kelas");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Tagihan");
  xlsWriteLabel($tablehead, $kolomhead++, "Bulan");
  xlsWriteLabel($tablehead, $kolomhead++, "Nominal");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Date");

	foreach ($this->Tagihan_siswa_kls_model->export_tagihan_bulanan($idkls,$bln)->result() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nis);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_siswa);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tingkat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kelas);
      xlsWriteLabel($tablebody, $kolombody++, $data->jn_tagihan);
         $bulan = array('1'=>'Januari','Februari','Maret' ,'April' ,'Mei','Juni','Juli','Agustus', 'September','Oktober','November','Desember');
      foreach ($bulan as $index => $nama_bulan) {
        if ($data->bulan==$index) {
          $bulan=$nama_bulan ;
        }
      }
      xlsWriteLabel($tablebody, $kolombody++,$bulan );
	    xlsWriteNumber($tablebody, $kolombody++, $data->nominal_tagihan);
      if ($data->status_bayar==1) {
        $ket='Lunas';
      }else{
        $ket='Belum Lunas';
      }
	    xlsWriteLabel($tablebody, $kolombody++, $ket);
      xlsWriteLabel($tablebody, $kolombody++, $data->date);

	    $tablebody++;
            $nourut++;
        }
        // $judul=$tablebody+2;
        // xlsWriteLabel($judul,0, "Total Uang Masuk =");
        // foreach ($this->Tagihan_siswa_kls_model->sum_export_pembayaran($idkls,$bln)->result() as $col ) {
        //   xlsWriteNumber($judul++, 1, $col->total);
        // }

        xlsEOF();
        exit();
    }


    public function _rules()
    {
	$this->form_validation->set_rules('id_kelas_siswa', 'id kelas siswa', 'trim|required');
	$this->form_validation->set_rules('id_jn_tagihan', 'id tagihan', 'trim|required');
	$this->form_validation->set_rules('id_pembayaran', 'id pembayaran', 'trim|required');
	$this->form_validation->set_rules('nominal_tagihan', 'nominal', 'trim|required');
	$this->form_validation->set_rules('status_bayar', 'status_bayar', 'trim|required');

	$this->form_validation->set_rules('id_tagihan_siswa_kelas', 'id_tagihan_siswa_kelas', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    public function _rules2()
    {
	$this->form_validation->set_rules('id_th_akademik', 'id_th_akademik', 'trim|required');


	$this->form_validation->set_rules('id_tagihan_siswa_kelas', 'id_tagihan_siswa_kelas', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules3()
    {
	$this->form_validation->set_rules('tagihan_akhir', 'tagihan_akhir', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Det_tagihan.php */
/* Location: ./application/controllers/Det_tagihan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-04 21:51:27 */
/* http://harviacode.com */
