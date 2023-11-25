<?php

class Beasiswa extends CI_Controller{

    public function index(){
        $this->load->helper('text');
        $data_admin = $this->getAdminData();
        $beasiswa = $this->beasiswa_model->get_all_beasiswa();
        $data = array(
            'beasiswa' => $beasiswa
        );
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data_admin);
        $this->load->view('administrator/beasiswa', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function lihat_pengajuan(){
        $data_admin = $this->getAdminData();
        $beasiswa = $this->beasiswa_model->get_all_pengajuan_with_details();
        $data = array(
            'beasiswa' => $beasiswa
        );
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data_admin);
        $this->load->view('administrator/beasiswa_pengajuan', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function setuju($id_pengajuan){
        
        $this->beasiswa_model->setujui_pengajuan($id_pengajuan);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Beasiswa Berhasil Disetujui! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('administrator/beasiswa');
    }

    public function tambah_beasiswa(){
        $data_admin = $this->getAdminData();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data_admin);
        $this->load->view('administrator/beasiswa_form');
        $this->load->view('templates_administrator/footer');
    }

    public function beasiswa_tolak($id_pengajuan){
        $data_admin = $this->getAdminData();
        $pengajuan_data = $this->beasiswa_model->get_pengajuan_by_id($id_pengajuan);
    
    // Check if the application data exists
    if ($pengajuan_data) {
        // Get additional data related to the scholarship
        $beasiswa_data = $this->beasiswa_model->get_beasiswa_by_id($pengajuan_data->id_beasiswa);
        $mahasiswa_data = $this->user_model->get_user_by_id($pengajuan_data->id_mahasiswa);
        // Check if the scholarship data exists
        if ($beasiswa_data) {
            // Combine data for the view
            $data_view = array(
                'pengajuan_data' => $pengajuan_data,
                'beasiswa_data' => $beasiswa_data,
                'mahasiswa_data' => $mahasiswa_data
            );

            // Load the view
            $this->load->view('templates_administrator/header');
            $this->load->view('templates_administrator/sidebar', $data_admin);
            $this->load->view('administrator/beasiswa_tolak_form', $data_view);
            $this->load->view('templates_administrator/footer');
        } else {
            // Handle the case where scholarship data is not found
            echo 'Scholarship data not found.';
        }
    } else {
        // Handle the case where application data is not found
        echo 'Application data not found.';
    }
    }

    public function tolak_beasiswa_aksi(){
        
        $id_pengajuan = $this->input->post('id_pengajuan');
        $alasan=$this->input->post('alasan');
        
        
        $this->beasiswa_model->tolak_pengajuan($id_pengajuan, $alasan);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Beasiswa Berhasil Ditolak! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>');
        redirect('administrator/beasiswa');
    }
    
    

    public function tambah_beasiswa_aksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->tambah_beasiswa();
    }
    else{
        $nama_beasiswa=$this->input->post('nama_beasiswa');
        $deskripsi=$this->input->post('deskripsi');
        $persyaratan=$this->input->post('persyaratan');
        $status=$this->input->post('status');
    
        $data = array(
            'nama_beasiswa' => $nama_beasiswa,
            'deskripsi'=> $deskripsi,
            'persyaratan'=> $persyaratan,
            'status'=> $status
        );
        
        $this->beasiswa_model->insert_data($data,'beasiswa');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Beasiswa Berhasil Ditambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>');
        redirect('administrator/beasiswa');
    }}
    

    public function delete($id){
        $where = array('id_beasiswa'=> $id);
        $this->prodi_model->hapus_data($where,'beasiswa');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Mahasiswa Berhasil Dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>');
        redirect('administrator/beasiswa');
    }

    public function _rules(){
        $this->form_validation->set_rules('nama_beasiswa','nama_beasiswa', 'required', ['required' => 'nama_beasiswa wajib diisi!']);
        $this->form_validation->set_rules('deskripsi','deskripsi', 'required', ['required' => 'Deskripsi wajib diisi!']);
        $this->form_validation->set_rules('persyaratan','persyaratan', 'required', ['required' => 'persyaratan wajib diisi!']);
        $this->form_validation->set_rules('status','status', 'required', ['required' => 'status wajib diisi!']);
        $this->form_validation->set_rules('alasan','alasan', 'required', ['required' => 'alasan wajib diisi!']);
    }

    private function getAdminData() {
        $dataa = $this->user_model->ambil_data($this->session->userdata('username'));
        return array(
            'username' => $dataa->username,
            'level' => $dataa->level, 
        );
    }

}

?>