<?php 

class Complete_profile extends CI_Controller{
    public function index(){
        $this->load->view('templates_user/header');

        $this->load->view('user/complete_profile');
        $this->load->view('templates_user/footer');
    }

    public function proses_biodata(){
        $id_mahasiswa = $this->session->userdata('id_mahasiswa');

        $data_mahasiswa = array(
            'id_mahasiswa' => $id_mahasiswa,
            'nama_depan' => $this->input->post('namaDepan'),
            'nama_belakang' => $this->input->post('namaBelakang'),
            'jenis_kelamin' => $this->input->post('jenisKelamin'),
            'tempat_lahir' => $this->input->post('tempatLahir'),
            'tanggal_lahir' => $this->input->post('tanggalLahir'),
            'alamat' => $this->input->post('alamat'),
            'nomor_telepon' => $this->input->post('nomorTelepon'),
            'email' => $this->input->post('email'),
            'agama' => $this->input->post('agama'),
            'nama_ayah' => $this->input->post('namaAyah'),
            'pekerjaan_ayah' => $this->input->post('pekerjaanAyah'),
            'gaji_ayah' => $this->input->post('gajiAyah'),
            'nama_ibu' => $this->input->post('namaIbu'),
            'pekerjaan_ibu' => $this->input->post('pekerjaanIbu'),
            'gaji_ibu' => $this->input->post('gajiIbu'),
        );
        var_dump($data_mahasiswa);
        // Memasukkan data ke dalam tabel biodata_mahasiswa
        $this->user_model->insert_biodata_mahasiswa($data_mahasiswa);

        // Mengupdate status_biodata di tabel mahasiswa menjadi 'sudah'
        $this->user_model->update_status_biodata($id_mahasiswa);

        // Redirect ke halaman sukses atau halaman lain sesuai kebutuhan
        redirect('user/dashboard');
    }
    }

?>