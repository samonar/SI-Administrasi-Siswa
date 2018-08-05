<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_import2 extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('Saldo_model','Tagihan_siswa_kls_model','Jn_tagihan_model','Kelas_siswa_model','Siswa_model','Kelas_model','Pembayaran_model','User_model','Th_akademik_model'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('template');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('form');
	}

	public function index() {
		$data['num_rows'] = $this->db->get('tmp')->num_rows();

		$this->load->view('pembayaran/excel_import2', $data);
	}

	public function import_data() {
		$config = array(
			'upload_path'   => FCPATH.'upload/',
			'allowed_types' => 'xls|csv'
		);
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file')) {
			$data = $this->upload->data();
			@chmod($data['full_path'], 0777);

			$this->load->library('Spreadsheet_Excel_Reader');
			$this->spreadsheet_excel_reader->setOutputEncoding('CP1251');

			$this->spreadsheet_excel_reader->read($data['full_path']);
			$sheets = $this->spreadsheet_excel_reader->sheets[0];
			error_reporting(1);

			$data_excel = array();
			for ($i = 14; $i <= $sheets['numRows']; $i++) {
				if ($sheets['cells'][$i][1] == '') break;


				$briva=$sheets['cells'][$i][3];
				if( preg_match("/7023/", $briva)){
					$briva2=preg_replace( '/[^0-9]/', '', $briva );
					$briva3=strpos($briva2,'7023');
					$briva4=substr($briva2, $briva3, 14);
					$data_excel[$i - 1]['briva'] =	$briva4;

					$tgl1=$sheets['cells'][$i][1];
					$th=substr($tgl1,6,2);
					$tgl=substr($tgl1,0,2);
					$bl=substr($tgl1,3,2);
					$time = strtotime($bl.'/'.$tgl.'/'.$th);
					$newformat = date('Y-m-d',$time);
					$data_excel[$i - 1]['date']    = $newformat;

					$data_excel[$i - 1]['time']   = $sheets['cells'][$i][2];

					$jumlah=$sheets['cells'][$i][10];
					$jumlah2=preg_replace('/\D/', '', $jumlah);
					$jumlah3=substr($jumlah2, 0, -2);
					$data_excel[$i - 1]['jumlah'] = $jumlah3;
				};
			}
			$this->db->insert_batch('tmp', $data_excel);

			$this->session->set_flashdata('message', 'Upload Sukses !');
			redirect('pembayaran/bayar_bank');
		}
	}

	public function import_siswa()
	{
		$config = array(
			'upload_path'   => FCPATH.'upload/siswa/',
			'allowed_types' => 'xls'
		);

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file')) {
			$data = $this->upload->data();
			@chmod($data['full_path'], 0777);

			$this->load->library('Spreadsheet_Excel_Reader');
			$this->spreadsheet_excel_reader->setOutputEncoding('CP1251');

			$this->spreadsheet_excel_reader->read($data['full_path']);
			$sheets = $this->spreadsheet_excel_reader->sheets[0];
			error_reporting(1);



			$data_excel = array();
			for ($i = 9; $i <= $sheets['numRows']; $i++) {
				if ($sheets['cells'][$i][2] == '') break;
				$data_excel[$i - 1]['nis']   = $sheets['cells'][$i][2];
				$thn = date('Y');
				$data_excel[$i - 1]['id_virtual']   = '70231'.$sheets['cells'][$i][2].$thn;
				$data_excel[$i - 1]['id_saldo']   = 'S'.$sheets['cells'][$i][2];
				$data_excel[$i - 1]['nama_siswa']   = $sheets['cells'][$i][3];
				$data_excel[$i - 1]['jk']   = $sheets['cells'][$i][4];

				$data_excel2[$i - 1]['id_saldo']   = 'S'.$sheets['cells'][$i][2];
				$data_excel2[$i - 1]['nominal']   = 0 ;

				$hasil= $sheets['cells'][$i][5];
				if( preg_match("/MIPA/", $hasil)){
					$filter=preg_replace( '/[\W]/', '', $hasil );
					if (preg_match("/XII/", $filter)) {
						$tingkat=12;
						$kls=substr($filter,3,7);
					}else if(preg_match("/XI/", $filter)) {
						$tingkat=11;
						$kls=substr($filter,2,6);
					}else{
						$tingkat=10;
						$kls=substr($filter,1,5);
					};
					$id_kelas=$this->Kelas_model->cari_kelas2($tingkat,$kls);
				}else {
					$filters=preg_replace( '/[\W]/', '', $hasil );
					if (preg_match("/XII/", $hasil)) {
						$tingkat=12;
						$klss=substr($filters,3,7);
					}else if(preg_match("/XI/", $hasil)) {
						$tingkat=11;
						$klss=substr($filters,2,5);
					}else{
						$tingkat=10;
						$klss=substr($filters,1,4);
					};
					$id_kelas=$this->Kelas_model->cari_kelas2($tingkat,$klss);
				}
				$th_aktif=$this->Th_akademik_model->id_th_aktif();
				($th_aktif->id_th_akademik);
				$data_excel3[$i - 1]['nis']   =  $sheets['cells'][$i][2];
				$data_excel3[$i - 1]['id_kelas']   = $id_kelas->id_kelas;
				$data_excel3[$i - 1]['id_th_akademik']   = $th_aktif->id_th_akademik;

			}

			$this->db->insert_batch('saldo', $data_excel2);
			$this->db->insert_batch('siswa', $data_excel);
			$this->db->insert_batch('kelas_siswa', $data_excel3);
			redirect('siswa/siswa/'.$id_kelas->id_kelas);
		}
	}

}

/* End of file Excel_import.php */
/* Location: ./application/controllers/Excel_import.php */
