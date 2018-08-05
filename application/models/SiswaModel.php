<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SiswaModel extends CI_Model {
	public function view(){
		return $this->db->get('siswa')->result(); // Tampilkan semua data yang ada di tabel siswa
	}
}
