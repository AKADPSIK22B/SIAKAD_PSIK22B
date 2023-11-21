<?php

class Mahasiswa extends CI_Controller{
    public function index() {
        $data_admin = $this->getAdminData();
        $data['mahasiswa'] = $this->mahasiswa_model->tampil_data('mahasiswa')->result();
        
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data_admin);
        $this->load->view('administrator/mahasiswa', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function detail($id){
        $data['detail'] = $this->mahasiswa_model->ambil_id_mahasiswa($id);
        $data_admin = $this->getAdminData();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar', $data_admin);
        $this->load->view('administrator/mahasiswa_detail', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function tambah_mahasiswa(){
        $data_admin = $this->getAdminData();
        $data['prodi'] = $this->mahasiswa_model->tampil_data('prodi')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar', $data_admin);
        $this->load->view('administrator/mahasiswa_form', $data);
        $this->load->view('templates_administrator/footer');
}
public function tambah_mahasiswa_aksi(){
    $this->_rules();
    if($this->form_validation->run() == FALSE){
        $this->tambah_mahasiswa();
}
else{
    $nim=$this->input->post('nim');
    $nama_lengkap=$this->input->post('nama_lengkap');
    $alamat=$this->input->post('alamat');
    $email=$this->input->post('email');
    $telepon=$this->input->post('telepon');
    $tempat_lahir=$this->input->post('tempat_lahir');
    $tanggal_lahir=$this->input->post('tanggal_lahir');
    $jenis_kelamin=$this->input->post('jenis_kelamin');
    $nama_prodi=$this->input->post('nama_prodi');
    $level = $this->input->post('level');
    $photo=$_FILES['photo'];
    $password = password_hash($nim, PASSWORD_DEFAULT);
   
    if($photo=''){}else{
        $config ['upload_path']= './assets/uploads';
        $config ['allowed_types']= 'jpg|png|jpeg';
        $this->load->library ('upload',$config);
        if(!$this->upload->do_upload('photo')){
            echo "Gagal Upload"; die();
    }
    else{
        $photo=$this->upload->data('file_name');
        }}

    $data = array(
        'nim' => $nim,
        'nama_lengkap'=> $nama_lengkap,
        'alamat'=> $alamat,
        'email'=> $email,
        'telepon'=> $telepon,
        'tempat_lahir'=> $tempat_lahir,
        'tanggal_lahir'=> $tanggal_lahir,
        'jenis_kelamin'=> $jenis_kelamin,
        'nama_prodi'=> $nama_prodi,
        'photo'=> $photo
    );
    
    $this->mahasiswa_model->insert_data($data,'mahasiswa');
    $id_mahasiswa = $this->db->insert_id();
    //buat user
    $user_data = array(
        'username' => $nim,
        'password' => $password,
        'email' => $email,
        'level' => $level,
        'blokir' => "N",
        'id_mahasiswa' => $id_mahasiswa
    );

    $this->user_model->insert_user($user_data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Data Mahasiswa Berhasil Ditambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>');
    redirect('administrator/mahasiswa');
}
}

public function update($id){
    $where = array('id'=>$id);
    $data['mahasiswa'] = $this->db->query("select * from mahasiswa mhs, prodi prd where mhs.nama_prodi=prd.nama_prodi and mhs.id='$id'")->result();
    $data['prodi'] = $this->matakuliah_model->tampil_data('prodi')->result();
    $data['detail'] = $this->mahasiswa_model->ambil_id_mahasiswa($id);
    $data_admin = $this->getAdminData();
    $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar', $data_admin);
        $this->load->view('administrator/mahasiswa_update', $data);
        $this->load->view('templates_administrator/footer');
}
public function update_mahasiswa_aksi($id){
    $this->_rules();
    if($this->form_validation->run() == FALSE){
        $this->update($id);
}
else{
    $id = $this->input->post('id');
    $nim=$this->input->post('nim');
    $nama_lengkap=$this->input->post('nama_lengkap');
    $alamat=$this->input->post('alamat');
    $email=$this->input->post('email');
    $telepon=$this->input->post('telepon');
    $tempat_lahir=$this->input->post('tempat_lahir');
    $tanggal_lahir=$this->input->post('tanggal_lahir');
    $jenis_kelamin=$this->input->post('jenis_kelamin');
    $nama_prodi=$this->input->post('nama_prodi');
    $photo = $_FILES['userfile']['name'];

    if($photo){
        $config ['upload_path']= './assets/uploads';
        $config ['allowed_types']= 'jpg|png|jpeg';

        $this->load->library ('upload',$config);
        if($this->upload->do_upload('userfile')){
            $userfile = $this->upload->data('file_name');
            $this->db->set('photo', $userfile);

    }
    else{
        echo "Gagal Upload";
        }

       
    }

    $data = array(
        'nim' => $nim,
        'nama_lengkap'=> $nama_lengkap,
        'alamat'=> $alamat,
        'email'=> $email,
        'telepon'=> $telepon,
        'tempat_lahir'=> $tempat_lahir,
        'tanggal_lahir'=> $tanggal_lahir,
        'jenis_kelamin'=> $jenis_kelamin,
        'nama_prodi'=> $nama_prodi
    );

    $where  = array(
        'id' => $id
    );

    $this->mahasiswa_model->update_data($where,$data,'mahasiswa');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Data Mahasiswa Berhasil Diupdate! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>');
    redirect('administrator/mahasiswa');

}
}

public function _rules(){
    $this->form_validation->set_rules('nim','nim', 'required', ['required' => 'NIM wajib diisi!']);
    $this->form_validation->set_rules('nama_lengkap','nama_lengkap', 'required', ['required' => 'Nama Mahasiswa wajib diisi!']);
    $this->form_validation->set_rules('alamat','alamat', 'required', ['required' => 'Alamat wajib diisi!']);
    $this->form_validation->set_rules('email','email', 'required', ['required' => 'Email wajib diisi!']);
    $this->form_validation->set_rules('telepon','telepon', 'required', ['required' => 'Telepon wajib diisi!']);
    $this->form_validation->set_rules('tempat_lahir','tempat_lahir', 'required', ['required' => 'Tempat Lahir wajib diisi!']);
    $this->form_validation->set_rules('tanggal_lahir','tanggal_lahir', 'required', ['required' => 'Tanggal Lahir wajib diisi!']);
    $this->form_validation->set_rules('jenis_kelamin','jenis_kelamin', 'required', ['required' => 'Jenis Kelamin wajib diisi!']);
    $this->form_validation->set_rules('nama_prodi','nama_prodi', 'required', ['required' => 'Program Studi wajib diisi!']);
    $this->form_validation->set_rules('level','level', 'required', ['required' => 'Level wajib diisi!']);
}

public function delete($id){
    $where = array('id'=> $id);
    $this->prodi_model->hapus_data($where,'mahasiswa');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Data Mahasiswa Berhasil Dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>');
    redirect('administrator/mahasiswa');
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