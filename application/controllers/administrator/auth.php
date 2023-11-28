<?php

class Auth extends CI_Controller{

    public function index(){
        // $this->login_model->check_visited();
        $this->load->view('templates_administrator/header');
        $this->load->view('administrator/login');
        $this->load->view('templates_administrator/footer');
    }

    public function proses_login(){
        $this->form_validation->set_rules('username','username','required', ['required' => 'Username Wajib disi!']);
        $this->form_validation->set_rules('password','password','required', ['required' => 'Password Wajib disi!']);
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates_administrator/header');
            $this->load->view('administrator/login');
            $this->load->view('templates_administrator/footer');
        }

        else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $username;

            $hashed_password_from_db = $this->login_model->get_hashed_password($username);

            $cek = $this->login_model->cek_login($user, $hashed_password_from_db);

            if ($cek->num_rows() > 0) {
                foreach ($cek->result() as $ck) {

                
                    $sess_data['username'] = $ck->username;
                    $sess_data['email'] = $ck->email;
                    $sess_data['level'] = $ck->level;
                    $sess_data['id_mahasiswa'] = $ck->id_mahasiswa;

                    $this->session->set_userdata($sess_data);
                }

                if($sess_data['level'] == 'admin'){
                    redirect('administrator/dashboard');

                }elseif ($sess_data['level'] == 'user') {
                    redirect('user/dashboard');
                }

                
                else{
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username Atau Password Salah! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>');
                    redirect('administrator/auth');
                }
                
            }

            else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username Atau Password Salah! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                redirect('administrator/auth');
            }
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('administrator/auth');
    }
}

?>