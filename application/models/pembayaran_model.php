<?php
class Pembayaran_model extends CI_Model {
    
    public function insert_pembayaran($data_pembayaran) {
        $this->db->insert('pembayaran', $data_pembayaran);
    }

    public function get_payment_history($id_mahasiswa) {
        $this->db->select('pembayaran.*, tagihan.nama_tagihan');
        $this->db->from('pembayaran');
        $this->db->join('tagihan', 'pembayaran.id_tagihan = tagihan.id_tagihan');
        $this->db->where('tagihan.id_mahasiswa', $id_mahasiswa);
        return $this->db->get()->result();
    }
    // Tambahan method lainnya jika dibutuhkan
}

?>