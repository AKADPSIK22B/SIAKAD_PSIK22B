    <?php 

    class Tagihan_model extends CI_Model{
        public function tampil_data($table){
            return $this->db->get($table);
    }

    public function insert_data($data,$table){
    $this->db->insert($table, $data);
    }

    public function update_data($where,$data,$table){

    $this->db->where($where);
    $this->db->update($table,$data);
    }

    public function cek_tagihan_exists($id_mahasiswa) {
        // Check if the tagihan entry exists
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        $query = $this->db->get('tagihan');

        return $query->num_rows() > 0;
    }

    public function hapus_tagihan($id_tagihan) {
        // Delete the tagihan entry
        $this->db->where('id_tagihan', $id_tagihan);
        $this->db->delete('tagihan');
    }

    public $table = 'tagihan';
    public $id = 'id_tagihan';

    public function get_by_id($id){
        $this->db->where($this->id,$id);
        return $this->db->get($this->table)->row();
    }

    public function get_tagihan_by_id($id_mahasiswa) {
        // Retrieve tagihan data by tagihan ID
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        $query = $this->db->get('tagihan');

        return $query->row();
    }

    public function update_tagihan($id_tagihan, $data) {
        // Update the tagihan entry
        $this->db->where('id_tagihan', $id_tagihan);
        $this->db->update('tagihan', $data);
    }

    public function update_tagihan_user($id_tagihan, $data) {
        // Update the tagihan entry
        $this->db->where('id_tagihan', $id_tagihan);
        $this->db->update('tagihan', $data);
    }
    public function get_belum_lunas_by_id($id_mahasiswa) {
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        $this->db->where('status_tagihan', 'BELUM LUNAS');
        return $this->db->get('tagihan')->result();
    }

    }

    ?>