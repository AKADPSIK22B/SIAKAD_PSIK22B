<?php

class Dashboard extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        if (!isset($this->session->userdata['username'])) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');

            redirect('administrator/auth');
        }
    }

    public function index()
    {

        $id_mahasiswa = $this->session->userdata('id_mahasiswa');
        $data = $this->user_model->get_user_by_id($id_mahasiswa);
        $data_event = array(
            3  => 'Link to Event 1',
            7  => 'Link to Event 2',
            13 => 'Link to Event 3',
        );
        
    
        if ($data) {
            $data_view = array(
                'username' => $data->username,
                'level' => $data->level,
                'profil_mahasiswa' => $data,
            );

            $this->load->library('calendar');
            $year  = date('Y');
            $month = date('m');
            
            $calendar = $this->calendar->generate($year, $month, $data_event);
            
            $this->load->view('templates_user/header');
            $this->load->view('templates_user/sidebar', $data_view);
            $this->load->view('user/dashboard', array_merge($data_view, ['calendar' => $calendar]));
            $this->load->view('templates_user/footer');
        } else {
            // Handle if the user data is not found
            $this->load->view('templates_user/header');
            $this->load->view('templates_user/sidebar');
            $this->load->view('user/dashboard_not_found');
            $this->load->view('templates_user/footer');
        }
    }
    
    
}

?>