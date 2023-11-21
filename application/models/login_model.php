<?php

class Login_model extends CI_Model{

    public function cek_login($username, $password){
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        return $this->db->get('user');
    }

    public function getLoginData($user,$pass){
        $u = $user;
        $p =$pass;

        $query_cekLogin = $this->db->get_where('user', array('username' => $u));


        if ($query_cekLogin->num_rows() > 0) {
            $row = $query_cekLogin->row();
    
            // Gunakan password_verify untuk memeriksa kecocokan password
            if (password_verify($p, $row->password)) {
                echo "ID Mahasiswa retrieved: " . $row->id_mahasiswa;
                $sess_data['logged_in'] = TRUE;
                $sess_data['username'] = $row->username;
                $sess_data['level'] = $row->level;
                $sess_data['id_mahasiswa'] = $row->id_mahasiswa;

                $this->session->set_userdata($sess_data);
                redirect('user/dashboard');
            }
        }


        else{
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Username Atau Password Salah! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('administrator/auth');
        }
    }

    public function get_hashed_password($username) {
        // Gantilah 'nama_tabel' dengan nama tabel yang sesuai di database Anda
        $query = $this->db->get_where('user', array('username' => $username));

        if ($query->num_rows() > 0) {
            // Jika data ditemukan, kembalikan hashed password
            $row = $query->row();
            return $row->password; // Gantilah 'hashed_password' sesuai dengan nama kolom di tabel
        }

        // Jika data tidak ditemukan
        return false;
    }
}

?>