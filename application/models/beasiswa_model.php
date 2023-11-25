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

    public function get_pengajuan_by_id($id_pengajuan)
    {
        return $this->db->get_where('pengajuan_beasiswa', ['id_pengajuan' => $id_pengajuan])->row();
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

    public function get_beasiswa_by_pengajuan_id($id_pengajuan) {
        $this->db->select('beasiswa.*');
        $this->db->from('beasiswa');
        $this->db->join('pengajuan_beasiswa', 'beasiswa.id_beasiswa = pengajuan_beasiswa.id_beasiswa');
        $this->db->where('pengajuan_beasiswa.id_pengajuan', $id_pengajuan);
        return $this->db->get()->row();
    }

    public function get_all_pengajuan_with_details() {
        // Assuming you have a relationship between pengajuan_beasiswa and mahasiswa
        $this->db->select('pengajuan_beasiswa.*, mahasiswa.nim, mahasiswa.nama_lengkap, beasiswa.nama_beasiswa');
        $this->db->from('pengajuan_beasiswa');
        $this->db->join('mahasiswa', 'pengajuan_beasiswa.id_mahasiswa = mahasiswa.id');
        $this->db->join('beasiswa', 'pengajuan_beasiswa.id_beasiswa = beasiswa.id_beasiswa');
        $query = $this->db->get();
        return $query->result();
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
