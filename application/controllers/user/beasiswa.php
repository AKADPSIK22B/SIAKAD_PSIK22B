<?php

class Beasiswa extends CI_Controller{

    public function index(){
        $this->load->helper('text');
        $data_admin = $this->getAdminData();
        $beasiswa = $this->beasiswa_model->get_all_beasiswa();
        $data = array(
            'beasiswa' => $beasiswa
        );
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/sidebar',$data_admin);
        $this->load->view('user/beasiswa', $data);
        $this->load->view('templates_user/footer');
    }

    public function detail_beasiswa($id_beasiswa){
        
        $data_admin = $this->getAdminData();
        $beasiswa = $this->beasiswa_model->get_beasiswa_by_id($id_beasiswa);
        $data = array(
            'beasiswa' => $beasiswa
        );
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/sidebar',$data_admin);
        $this->load->view('user/beasiswa_detail', $data);
        $this->load->view('templates_user/footer');
    }
    
    public function lihat_beasiswa(){
        $id_mahasiswa = $this->session->userdata('id_mahasiswa');
        $pengajuan_beasiswa = $this->beasiswa_model->get_pengajuan_by_mahasiswa($id_mahasiswa);
        
        $data = $this->user_model->get_user_by_id($id_mahasiswa);
        $data_admin = $this->getAdminData();
        
        $beasiswa = array();
    foreach ($pengajuan_beasiswa as $pengajuan) {
        $beasiswa[] = $this->beasiswa_model->get_beasiswa_by_pengajuan_id($pengajuan->id_pengajuan);
    }
    
        $data = array(
            'profil_mahasiswa' => $data,
            'beasiswa' => $beasiswa,
            'pengajuan_beasiswa' => $pengajuan_beasiswa
        );
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/sidebar',$data_admin);
        $this->load->view('user/pengajuan_beasiswa', $data);
        $this->load->view('templates_user/footer');
    }


    public function ajukan($id_beasiswa){
        
        // Ambil data user yang sedang login
        $id_mahasiswa = $this->session->userdata('id_mahasiswa');

        // Cek apakah pengajuan beasiswa sudah pernah dilakukan sebelumnya
        $is_pengajuan_exist = $this->db
            ->where('id_beasiswa', $id_beasiswa)
            ->where('id_mahasiswa', $id_mahasiswa)
            ->get('pengajuan_beasiswa')
            ->row();

        if ($is_pengajuan_exist) {
            // Jika pengajuan sudah ada, tampilkan pesan atau redirect ke halaman tertentu
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Beasiswa Sudah Pernah Diajukan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>');
            redirect('user/beasiswa');
        }

        // Jika belum pernah mengajukan, lakukan pengajuan
        $data_pengajuan = [
            'id_mahasiswa' => $id_mahasiswa,
            'id_beasiswa' => $id_beasiswa,
            'tanggal_pengajuan' => date('Y-m-d H:i:s'), // Tanggal dan waktu saat pengajuan
            'status' => 'Menunggu', // Default status pengajuan
            // Jika ada data tambahan yang perlu dimasukkan, tambahkan di sini
        ];

        $this->db->insert('pengajuan_beasiswa', $data_pengajuan);

        // Tampilkan pesan sukses atau redirect ke halaman tertentu
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Beasiswa Berhasil Diajukan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>');
        redirect('user/beasiswa');
    }



    

    public function _rules(){
        $this->form_validation->set_rules('nama_beasiswa','nama_beasiswa', 'required', ['required' => 'nama_beasiswa wajib diisi!']);
        $this->form_validation->set_rules('deskripsi','deskripsi', 'required', ['required' => 'Deskripsi wajib diisi!']);
        $this->form_validation->set_rules('persyaratan','persyaratan', 'required', ['required' => 'persyaratan wajib diisi!']);
        $this->form_validation->set_rules('status','status', 'required', ['required' => 'status wajib diisi!']);
    }

    private function getAdminData() {
        $id_mahasiswa = $this->session->userdata('id_mahasiswa');
        $data = $this->user_model->get_user_by_id($id_mahasiswa);
        $dataa = $this->user_model->ambil_data($this->session->userdata('username'));
        return array(
            'username' => $dataa->username,
            'level' => $dataa->level, 
            'profil_mahasiswa' => $data
        );
    }

}

?>