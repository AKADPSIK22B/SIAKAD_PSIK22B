<?php

class Beasiswa extends CI_Controller{

    public function index(){
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

    public function tambah_beasiswa(){
        $data_admin = $this->getAdminData();
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/sidebar',$data_admin);
        $this->load->view('user/beasiswa_form');
        $this->load->view('templates_user/footer');
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