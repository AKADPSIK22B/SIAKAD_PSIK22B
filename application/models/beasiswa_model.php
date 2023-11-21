<?php

class Beasiswa_model extends CI_Model
{

    public $table = 'beasiswa';
    public $id = 'id_beasiswa';

    public function get_all_beasiswa()
    {
        return $this->db->get('beasiswa')->result();
    }

    public function get_beasiswa_by_id($id_beasiswa)
    {
        return $this->db->get_where('beasiswa', ['id_beasiswa' => $id_beasiswa])->row();
    }

    public function ajukan_beasiswa($data)
    {
        $this->db->insert('pengajuan_beasiswa', $data);
        return $this->db->insert_id();
    }

    public function get_pengajuan_by_mahasiswa($id_mahasiswa)
    {
        return $this->db->get_where('pengajuan_beasiswa', ['id_mahasiswa' => $id_mahasiswa])->result();
    }

    public function get_all_pengajuan()
    {
        return $this->db->get('pengajuan_beasiswa')->result();
    }

    public function setujui_pengajuan($id_pengajuan)
    {
        $this->db->where('id_pengajuan', $id_pengajuan);
        $this->db->update('pengajuan_beasiswa', ['status' => 'Disetujui']);
    }

    public function tolak_pengajuan($id_pengajuan, $alasan)
    {
        $this->db->where('id_pengajuan', $id_pengajuan);
        $this->db->update('pengajuan_beasiswa', ['status' => 'Ditolak', 'alasan' => $alasan]);
    }

    public function insert_data($data,$table){
        $this->db->insert($table, $data);
    }

    public function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
        }
}
