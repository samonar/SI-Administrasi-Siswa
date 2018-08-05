<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pesan_model extends CI_Model
{
    public $table = 'pesan';
    public $id = 'id_pesan';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    function cr_pesan($nis)
    {
      $this->db->where('nis',$nis);
      $this->db->order_by($this->id, $this->order);
      return $this->db->get($this->table);
    }

    function cr_blm_lunas($bln)
    {
      $this->db->where('th_akademik.status',1);
      $this->db->where('tagihan_siswa_kls.bulan',$bln);
      $this->db->where('tagihan_siswa_kls.status_bayar',0);
      $this->db->join('kelas_siswa','tagihan_siswa_kls.id_kelas_siswa = kelas_siswa.id_kelas_siswa');
      $this->db->join('th_akademik','kelas_siswa.id_th_akademik = th_akademik.id_th_akademik');
      $this->db->group_by('kelas_siswa.nis');
      return $this->db->get('tagihan_siswa_kls');
    }

    function insert($data)
    {
      $this->db->insert($this->table, $data);
    }

    function delete($nis)
    {
        $this->db->where('nis',$nis);
        $this->db->delete($this->table);
    }


}
