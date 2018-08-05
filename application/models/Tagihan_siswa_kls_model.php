<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tagihan_siswa_kls_model extends CI_Model
{

    public $table = 'tagihan_siswa_kls';
    public $id = 'id_tagihan_siswa_kelas';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->join('tagihan_bulanan','tagihan_siswa_kls.id_tagihan_bulanan=tagihan_bulanan.id_tagihan_bulanan');
        $this->db->join('kelas_siswa','tagihan_siswa_kls.id_kelas_siswa = kelas_siswa.id_kelas_siswa');
        $this->db->join('siswa','kelas_siswa.nis = siswa.nis');
        $this->db->join('th_akademik','kelas_siswa.id_th_akademik = th_akademik.id_th_akademik');
        $this->db->join('kelas','kelas_siswa.id_kelas = kelas.id_kelas');
        $this->db->join('jn_tagihan','tagihan_bulanan.jn_tagihan = jn_tagihan.id_jn_tagihan');
        $this->db->where('th_akademik.status', 1);
        $this->db->group_by('siswa.nis');
        $this->db->order_by('kelas_siswa.nis, tagihan_siswa_kls.bulan, jn_tagihan.jn_tagihan');
        return $this->db->get($this->table)->result();
    }

    function tghTiapKelas($nis)
    {
      $this->db->join('tagihan_bulanan','tagihan_siswa_kls.id_tagihan_bulanan=tagihan_bulanan.id_tagihan_bulanan');
      $this->db->join('kelas_siswa','tagihan_siswa_kls.id_kelas_siswa = kelas_siswa.id_kelas_siswa');
      $this->db->join('siswa','kelas_siswa.nis = siswa.nis');
      $this->db->join('th_akademik','kelas_siswa.id_th_akademik = th_akademik.id_th_akademik');
      $this->db->join('kelas','kelas_siswa.id_kelas = kelas.id_kelas');
      $this->db->join('jn_tagihan','tagihan_bulanan.jn_tagihan = jn_tagihan.id_jn_tagihan');
      $this->db->group_start();
        $this->db->where('th_akademik.status', 1);
        $this->db->where('kelas_siswa.nis',$nis );
      $this->db->group_end();
      $this->db->or_where('jn_tagihan.id_jn_tagihan ', 2);
      $this->db->where('kelas_siswa.nis',$nis );
      $this->db->order_by('kelas_siswa.nis, tagihan_siswa_kls.bulan, jn_tagihan.jn_tagihan');
      return $this->db->get($this->table)->result();
    }

    function row_tagihan_aktf($nis)
    {
      $this->db->select('COUNT(siswa.id_virtual) AS jumlah');
      $this->db->join('tagihan_bulanan','tagihan_siswa_kls.id_tagihan_bulanan=tagihan_bulanan.id_tagihan_bulanan');
      $this->db->join('kelas_siswa','tagihan_siswa_kls.id_kelas_siswa = kelas_siswa.id_kelas_siswa');
      $this->db->join('siswa','kelas_siswa.nis = siswa.nis');
      $this->db->join('th_akademik','kelas_siswa.id_th_akademik = th_akademik.id_th_akademik');
      $this->db->join('kelas','kelas_siswa.id_kelas = kelas.id_kelas');
      $this->db->join('jn_tagihan','tagihan_bulanan.jn_tagihan = jn_tagihan.id_jn_tagihan');
      $this->db->where('th_akademik.status', 1);
      $this->db->where('kelas_siswa.nis',$nis );
      $this->db->where('tagihan_siswa_kls.status_bayar',0 );
      $this->db->order_by('siswa.nama_siswa, jn_tagihan.jn_tagihan, tagihan_siswa_kls.bulan');
      return $this->db->get($this->table);
    }

    function tagihan_lunas($nis)
    {
      $this->db->join('tagihan_bulanan','tagihan_siswa_kls.id_tagihan_bulanan=tagihan_bulanan.id_tagihan_bulanan');
      $this->db->join('kelas_siswa','tagihan_siswa_kls.id_kelas_siswa = kelas_siswa.id_kelas_siswa');
      $this->db->join('siswa','kelas_siswa.nis = siswa.nis');
      $this->db->join('th_akademik','kelas_siswa.id_th_akademik = th_akademik.id_th_akademik');
      $this->db->join('kelas','kelas_siswa.id_kelas = kelas.id_kelas');
      $this->db->join('jn_tagihan','tagihan_bulanan.jn_tagihan = jn_tagihan.id_jn_tagihan');
      $this->db->where('th_akademik.status', 1);
      $this->db->where('kelas_siswa.nis',$nis );
      $this->db->where('tagihan_siswa_kls.status_bayar',0 );
      $this->db->order_by('kelas_siswa.nis, tagihan_siswa_kls.bulan, jn_tagihan.jn_tagihan');
      return $this->db->get($this->table)->result();
    }

    function totTagihan($nis)
    {
      $this->db->select('sum(tagihan_siswa_kls.nominal_tagihan) as total');
      $this->db->join('tagihan_bulanan','tagihan_siswa_kls.id_tagihan_bulanan=tagihan_bulanan.id_tagihan_bulanan');
      $this->db->join('kelas_siswa','tagihan_siswa_kls.id_kelas_siswa = kelas_siswa.id_kelas_siswa');
      $this->db->join('siswa','kelas_siswa.nis = siswa.nis');
      $this->db->join('th_akademik','kelas_siswa.id_th_akademik = th_akademik.id_th_akademik');
      $this->db->join('kelas','kelas_siswa.id_kelas = kelas.id_kelas');
      $this->db->join('jn_tagihan','tagihan_bulanan.jn_tagihan = jn_tagihan.id_jn_tagihan');
      $this->db->where('th_akademik.status', 1);
      $this->db->where('kelas_siswa.nis',$nis );
      $this->db->where('tagihan_siswa_kls.status_bayar',0 );
      $this->db->order_by('siswa.nama_siswa, jn_tagihan.jn_tagihan, tagihan_siswa_kls.bulan');
      return $this->db->get($this->table);
    }

    function cari_tagihan($id)
    {
      //$this->db->select('sum(tagihan_siswa_kls.nominal_tagihan) as total');
      $this->db->join('tagihan_bulanan','tagihan_siswa_kls.id_tagihan_bulanan=tagihan_bulanan.id_tagihan_bulanan');
      $this->db->join('kelas_siswa','tagihan_siswa_kls.id_kelas_siswa = kelas_siswa.id_kelas_siswa');
      $this->db->join('siswa','kelas_siswa.nis = siswa.nis');
      $this->db->join('th_akademik','kelas_siswa.id_th_akademik = th_akademik.id_th_akademik');
      $this->db->join('kelas','kelas_siswa.id_kelas = kelas.id_kelas');
      $this->db->join('jn_tagihan','tagihan_bulanan.jn_tagihan = jn_tagihan.id_jn_tagihan');
      // $this->db->where('th_akademik.status', 1);
      $this->db->where('id_tagihan_siswa_kelas',$id);
      $this->db->order_by('siswa.nama_siswa, jn_tagihan.jn_tagihan, tagihan_siswa_kls.bulan');
      return $this->db->get($this->table);
    }

    function count_export_pembayaran($idkls,$bln)
    {
      // $this->db->select('COUNT(siswa.nis) AS jumlah');
      $this->db->join('tagihan_bulanan','tagihan_siswa_kls.id_tagihan_bulanan=tagihan_bulanan.id_tagihan_bulanan');
      $this->db->join('kelas_siswa','tagihan_siswa_kls.id_kelas_siswa = kelas_siswa.id_kelas_siswa');
      $this->db->join('siswa','kelas_siswa.nis = siswa.nis');
      $this->db->join('th_akademik','kelas_siswa.id_th_akademik = th_akademik.id_th_akademik');
      $this->db->join('kelas','kelas_siswa.id_kelas = kelas.id_kelas');
      $this->db->join('jn_tagihan','tagihan_bulanan.jn_tagihan = jn_tagihan.id_jn_tagihan');
      $this->db->where('th_akademik.status', 1);
      $this->db->where('tagihan_siswa_kls.status_bayar ',1);
      $this->db->where('kelas_siswa.id_kelas',$idkls);
      $this->db->where('tagihan_siswa_kls.bulan',$bln);
      $this->db->where('jn_tagihan.id_jn_tagihan',1);
      $this->db->group_by('siswa.nis');
      $this->db->order_by('kelas_siswa.nis, tagihan_siswa_kls.bulan, jn_tagihan.jn_tagihan');
      return $this->db->get($this->table);
    }

    function sum_export_pembayaran($idkls,$bln)
    {
      $this->db->select('SUM(tagihan_siswa_kls.nominal_tagihan) AS total');
      $this->db->join('tagihan_bulanan','tagihan_siswa_kls.id_tagihan_bulanan=tagihan_bulanan.id_tagihan_bulanan');
      $this->db->join('kelas_siswa','tagihan_siswa_kls.id_kelas_siswa = kelas_siswa.id_kelas_siswa');
      $this->db->join('siswa','kelas_siswa.nis = siswa.nis');
      $this->db->join('th_akademik','kelas_siswa.id_th_akademik = th_akademik.id_th_akademik');
      $this->db->join('kelas','kelas_siswa.id_kelas = kelas.id_kelas');
      $this->db->join('jn_tagihan','tagihan_bulanan.jn_tagihan = jn_tagihan.id_jn_tagihan');
      $this->db->where('th_akademik.status', 1);
      $this->db->where('tagihan_siswa_kls.status_bayar ',1);
      $this->db->where('kelas_siswa.id_kelas',$idkls);
      $this->db->where('tagihan_siswa_kls.bulan',$bln);
      $this->db->order_by('kelas_siswa.nis, tagihan_siswa_kls.bulan, jn_tagihan.jn_tagihan');
      return $this->db->get($this->table);
    }

    function export_pembayaran_bulanan($idkls,$bln)
    {
      $this->db->join('tagihan_bulanan','tagihan_siswa_kls.id_tagihan_bulanan=tagihan_bulanan.id_tagihan_bulanan');
      $this->db->join('kelas_siswa','tagihan_siswa_kls.id_kelas_siswa = kelas_siswa.id_kelas_siswa');
      $this->db->join('siswa','kelas_siswa.nis = siswa.nis');
      $this->db->join('th_akademik','kelas_siswa.id_th_akademik = th_akademik.id_th_akademik');
      $this->db->join('kelas','kelas_siswa.id_kelas = kelas.id_kelas');
      $this->db->join('jn_tagihan','tagihan_bulanan.jn_tagihan = jn_tagihan.id_jn_tagihan');
      $this->db->where('th_akademik.status', 1);
      $this->db->where('tagihan_siswa_kls.status_bayar ',1);
      $this->db->where('kelas_siswa.id_kelas',$idkls);
      $this->db->where('tagihan_siswa_kls.bulan',$bln);
      // $this->db->where('jn_tagihan.id_jn_tagihan',1);
      // $this->db->group_by('siswa.nis');
      $this->db->order_by('kelas_siswa.nis, tagihan_siswa_kls.bulan, jn_tagihan.jn_tagihan');
      return $this->db->get($this->table);
    }

    function count_export_tagihan($idkls,$bln)
    {
      // $this->db->select('COUNT(siswa.nis) AS jumlah');
      $this->db->join('tagihan_bulanan','tagihan_siswa_kls.id_tagihan_bulanan=tagihan_bulanan.id_tagihan_bulanan');
      $this->db->join('kelas_siswa','tagihan_siswa_kls.id_kelas_siswa = kelas_siswa.id_kelas_siswa');
      $this->db->join('siswa','kelas_siswa.nis = siswa.nis');
      $this->db->join('th_akademik','kelas_siswa.id_th_akademik = th_akademik.id_th_akademik');
      $this->db->join('kelas','kelas_siswa.id_kelas = kelas.id_kelas');
      $this->db->join('jn_tagihan','tagihan_bulanan.jn_tagihan = jn_tagihan.id_jn_tagihan');
      $this->db->where('th_akademik.status', 1);
      $this->db->where('tagihan_siswa_kls.status_bayar ',0);
      $this->db->where('kelas_siswa.id_kelas',$idkls);
      $this->db->where('tagihan_siswa_kls.bulan',$bln);
      $this->db->where('jn_tagihan.id_jn_tagihan',1);
      $this->db->group_by('siswa.nis');
      $this->db->order_by('kelas_siswa.nis, tagihan_siswa_kls.bulan, jn_tagihan.jn_tagihan');
      return $this->db->get($this->table);
    }

    function sum_export_tagihan($idkls,$bln)
    {
      // $this->db->select('COUNT(siswa.nis) AS jumlah');
      $this->db->join('tagihan_bulanan','tagihan_siswa_kls.id_tagihan_bulanan=tagihan_bulanan.id_tagihan_bulanan');
      $this->db->join('kelas_siswa','tagihan_siswa_kls.id_kelas_siswa = kelas_siswa.id_kelas_siswa');
      $this->db->join('siswa','kelas_siswa.nis = siswa.nis');
      $this->db->join('th_akademik','kelas_siswa.id_th_akademik = th_akademik.id_th_akademik');
      $this->db->join('kelas','kelas_siswa.id_kelas = kelas.id_kelas');
      $this->db->join('jn_tagihan','tagihan_bulanan.jn_tagihan = jn_tagihan.id_jn_tagihan');
      $this->db->where('th_akademik.status', 1);
      $this->db->where('tagihan_siswa_kls.status_bayar ',0);
      $this->db->where('kelas_siswa.id_kelas',$idkls);
      $this->db->where('tagihan_siswa_kls.bulan',$bln);
      $this->db->where('jn_tagihan.id_jn_tagihan',1);
      $this->db->group_by('siswa.nis');
      $this->db->order_by('kelas_siswa.nis, tagihan_siswa_kls.bulan, jn_tagihan.jn_tagihan');
      return $this->db->get($this->table);
    }

    function export_tagihan_bulanan($idkls,$bln)
    {
      $this->db->join('tagihan_bulanan','tagihan_siswa_kls.id_tagihan_bulanan=tagihan_bulanan.id_tagihan_bulanan');
      $this->db->join('kelas_siswa','tagihan_siswa_kls.id_kelas_siswa = kelas_siswa.id_kelas_siswa');
      $this->db->join('siswa','kelas_siswa.nis = siswa.nis');
      $this->db->join('th_akademik','kelas_siswa.id_th_akademik = th_akademik.id_th_akademik');
      $this->db->join('kelas','kelas_siswa.id_kelas = kelas.id_kelas');
      $this->db->join('jn_tagihan','tagihan_bulanan.jn_tagihan = jn_tagihan.id_jn_tagihan');
      $this->db->where('th_akademik.status', 1);
      $this->db->where('tagihan_siswa_kls.status_bayar ',0);
      $this->db->where('kelas_siswa.id_kelas',$idkls);
      $this->db->where('tagihan_siswa_kls.bulan',$bln);
      // $this->db->where('jn_tagihan.id_jn_tagihan',1);
      // $this->db->group_by('siswa.nis');
      $this->db->order_by('kelas_siswa.nis, tagihan_siswa_kls.bulan, jn_tagihan.jn_tagihan');
      return $this->db->get($this->table);
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
          $this->db->order_by($this->id, $this->order);
         $this->db->join('jn_tagihan','tagihan_siswa_kls.id_jn_tagihan = jn_tagihan.id_jn_tagihan');
         $this->db->join('kelas_siswa','tagihan_siswa_kls.id_kelas_siswa = kelas_siswa.id_kelas_siswa');
         $this->db->join('siswa','kelas_siswa.nis = siswa.nis');
         $this->db->join('th_akademik','kelas_siswa.id_th_akademik = th_akademik.id_th_akademik');
         $this->db->join('kelas','kelas_siswa.id_kelas = kelas.id_kelas');
         //$this->db->join('pembayaran','tagihan_siswa_kls.id_pembayaran = pembayaran.id_pembayaran');
         $this->db->where('th_akademik.status', 1);
        return $this->db->get($this->table)->row();
    }

    function get_by_nis($nis)
    {
         $this->db->where('kelas_siswa.nis', $nis);
         $this->db->order_by('tagihan.bulan','asc');
         $this->db->join('tagihan','tagihan_siswa_kls.id_tagihan = tagihan.id_tagihan');
         $this->db->join('kelas_siswa','tagihan_siswa_kls.id_kelas_siswa = kelas_siswa.id_kelas_siswa');
         $this->db->join('siswa','kelas_siswa.nis = siswa.nis');
         $this->db->join('th_akademik','kelas_siswa.id_th_akademik = th_akademik.id_th_akademik');
         $this->db->join('kelas','kelas_siswa.id_kelas = kelas.id_kelas');
         $this->db->join('jn_tagihan','tagihan.id_jn_tagihan = jn_tagihan.id_jn_tagihan');
         $this->db->join('pembayaran','tagihan_siswa_kls.id_pembayaran = pembayaran.id_pembayaran');
         $this->db->where('th_akademik.status', 1);

        return $this->db->get($this->table)->result();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_det_tagihan', $q);
    $this->db->or_like('id_kelas_siswa', $q);
    $this->db->or_like('id_tagihan', $q);
    $this->db->or_like('id_pembayaran', $q);
    $this->db->or_like('nominal', $q);
    $this->db->or_like('status_bayar', $q);
    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_det_tagihan', $q);
    $this->db->or_like('id_kelas_siswa', $q);
    $this->db->or_like('id_tagihan', $q);
    $this->db->or_like('id_pembayaran', $q);
    $this->db->or_like('nominal', $q);
    $this->db->or_like('status_bayar', $q);
    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function input_pengajuan($data)
    {
        $this->db->insert('pengajuan_keringanan', $data);
    }

    // update data
    function update_bayar_cicil($id,$id_pembayaran,$tgl,$saldo)
    {
      $data = array(
        'id_pembayaran' => $id_pembayaran ,
        'date' => $tgl ,
        'nominal_tagihan' => $saldo,
      );
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function update_bayar_lunas($id,$id_pembayaran,$tgl)
    {
      $data = array(
        'id_pembayaran' => $id_pembayaran ,
        'date' => $tgl ,
        'nominal_tagihan' => "0",
        'status_bayar' => "1" ,
      );
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    //cek data Generate
    function cekgenerate($data)
    {
      $this->db->where('tagihan_bulanan.id_th_akademik',$data['id_th_akademik']);
      $this->db->join('tagihan_bulanan','tagihan_siswa_kls.id_tagihan_bulanan = tagihan_bulanan.id_tagihan_bulanan');
      return $this->db->get($this->table);
    }

    function tagihan_siswa($data)
    {
      $this->db->select(' tagihan_bulanan.bulan,
      tagihan_bulanan.nominal,
      kelas_siswa.nis,
      kelas_siswa.id_kelas_siswa,
      kelas_siswa.id_kelas,
      tagihan_bulanan.jn_tagihan,
      tagihan_bulanan.id_tagihan_bulanan,
      tagihan_bulanan.id_th_akademik,
      tagihan_bulanan.kelas');
      // $this->db->from('kelas_siswa');
      // $this->db->where('tagihan_bulanan.jn.tagihan','2');
      // $this->db->join('tagihan_bulanan','kelas_siswa.id_th_akademik = tagihan_bulanan.id_th_akademik and kelas_siswa.id_kelas = tagihan_bulanan.kelas');
      $this->db->join('tagihan_bulanan','kelas_siswa.id_th_akademik = tagihan_bulanan.id_th_akademik');
      $this->db->where('kelas_siswa.id_th_akademik',$data['id_th_akademik']);
      return $this->db->get('kelas_siswa');

    }

    function inputGenerate($id_kelas_siswa,$id_tagihan_bulanan,$bayar,$bulan,$nominal,$status)
    {

        $this->db->set('id_kelas_siswa',$id_kelas_siswa);
        $this->db->set('id_tagihan_bulanan',$id_tagihan_bulanan);
    $this->db->set('id_pembayaran',$bayar);
        $this->db->set('bulan',$bulan);
        $this->db->set('nominal_tagihan',$nominal);
        $this->db->set('status_bayar',$status);
        $this->db->set('date',date('Y-m-d'));
        $this->db->insert($this->table);
    }

}

/* End of file Tagihan_siswa_kls_model.php */
/* Location: ./application/models/Tagihan_siswa_kls_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-15 17:33:44 */
/* http://harviacode.com */
