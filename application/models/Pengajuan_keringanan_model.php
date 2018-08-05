<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengajuan_keringanan_model extends CI_Model
{
    public $table = 'pengajuan_keringanan';
    public $id = 'id_pengajuan';
    public $order = 'DESC';

    function __construct()
    {
      parent::__construct();
      // $this->load->model(array('Pengajuan_keringanan_model','Tagihan_siswa_kls_model','Siswa_model','Kelas_model',
      // 'Pembayaran_model','Th_akademik_model','Jn_tagihan_model','Kelas_siswa_model'));
    }

    function get_all()
    {

      $this->db->join('tagihan_siswa_kls','tagihan_siswa_kls.id_tagihan_siswa_kelas = pengajuan_keringanan.id_tagihan_siswa');
      $this->db->join('kelas_siswa','tagihan_siswa_kls.id_kelas_siswa = kelas_siswa.id_kelas_siswa');
      $this->db->join('siswa','kelas_siswa.nis = siswa.nis');
      $this->db->join('tagihan_bulanan','tagihan_siswa_kls.id_tagihan_bulanan = tagihan_bulanan.id_tagihan_bulanan');
      $this->db->join('jn_tagihan','tagihan_bulanan.jn_tagihan = jn_tagihan.id_jn_tagihan');
      return $this->db->get($this->table)->result();
    }

    function update_terima($id,$ubah)
    {
      $data = array('status_pengajuan' => $ubah , );
      $this->db->where('id_tagihan_siswa', $id);
      $this->db->update($this->table, $data);
    }
    function update_tolak($id,$ubah)
    {
      $data = array('status_pengajuan' => $ubah , );
      $this->db->where($this->id, $id);
      $this->db->update($this->table, $data);
    }


}
?>
