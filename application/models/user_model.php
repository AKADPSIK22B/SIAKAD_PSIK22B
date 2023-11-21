<?php

class User_model extends CI_Model{
    public function ambil_data($id){
        $this->db->where('username', $id);
        return $this->db->get('user')->row();
    }

    public function insert_user($data) {
        $this->db->insert('user', $data);
    }

    public function get_user_by_id($id_mahasiswa)
{
    $this->db->select('*');
    $this->db->from('user');
    $this->db->join('mahasiswa', 'user.id_mahasiswa = mahasiswa.id');
    $this->db->where('user.id_mahasiswa', $id_mahasiswa);
    $query = $this->db->get();

    return $query->row(); // Mengembalikan satu baris data
}

}

?>