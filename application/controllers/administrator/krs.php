<?php 

class Krs extends CI_Controller{
    public function index(){
        $data = array(
            'nim' => set_value('nim'),
            'id_thn_akad' => set_value('id_thn_akad')
        );

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/masuk_krs', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function krs_aksi() {
        $this->_rulesKrs();
        if($this->form_validation->run() == FALSE) {
            $this->index();
            } else {
                $nim=$this->input->post('nim',TRUE);
                $thn_akad=$this->input->post('id_thn_akad',TRUE);
                
}
        if($this->mahasiswa_model->get_by_id($nim)==null){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Mahasiswa yang Anda Input Belum Terdaftar <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>');
            redirect('administrator/krs');
        }

        $data = array(
            'nim' => $nim,
            'id_thn_akad'=>$thn_akad,
            'nama_lengkap' =>$this->mahasiswa_model->get_by_id($nim)->nama_lengkap
        );
        $dataKrs = array(
            'krs_data' => $this->baca_krs($nim,$thn_akad),
            'nim' => $nim,
            'id_thn_akad' => $thn_akad,
            'tahun_akademik' => $this->tahunakademik_model->get_by_id($thn_akad)->tahun_akademik,
            'semester' => $this->tahunakademik_model->get_by_id($thn_akad)->semester== 1?'Ganjil' : 'Genap',
            'nama_lengkap' => $this->mahasiswa_model->get_by_id($nim)->nama_lengkap,
            'prodi' => $this->mahasiswa_model->get_by_id($nim)->nama_prodi,
        );

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/krs_list', $dataKrs);
        $this->load->view('templates_administrator/footer');


    }

    public function baca_krs($nim,$thn_akad){
        $this->db->select('k.id_krs,k.kode_matakuliah, m.nama_matakuliah,m.sks');
        $this->db->from('krs as k');
        $this->db->where('k.nim', $nim);
        $this->db->where('k.id_thn_akad', $thn_akad);
        $this->db->join('matakuliah as m', 'm.kode_matakuliah = k.kode_matakuliah');

        $krs = $this->db->get()->result();
        return $krs;
    }

    public function _rulesKrs() {
        $this->form_validation->set_rules('nim','nim','required');
        $this->form_validation->set_rules('id_thn_akad','id_thn_akad','required');
        
    }

    public function tambah_krs($nim,$thn_akad){
        $data = array(
            'id_krs' => set_value('id_krs'),
            'id_thn_akad' => $thn_akad,
            'thn_akad_smt' => $this->tahunakademik_model->get_by_id($thn_akad)->tahun_akademik,
            'semester' => $this->tahunakademik_model->get_by_id($thn_akad)->semester== 1?'Ganjil' : 'Genap',
            'nim' => $nim,
            'kode_matakuliah' => set_value('kode_matakuliah'),
        );

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/krs_form', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_krs_aksi(){
        $this->_rulesKrs();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_krs($this->input->post('nim', TRUE),
            $this->input->post('id_thn_akad', TRUE));
            } else{
                $nim = $this->input->post('nim',TRUE);
                $id_thn_akad = $this->input->post('id_thn_akad',TRUE);
                $kode_matakuliah = $this->input->post('kode_matakuliah',TRUE);

                $data = array(
                    'id_thn_akad'=>$id_thn_akad,
                    'nim'=>$nim,
                    'kode_matakuliah'=>$kode_matakuliah,
                );
                $this->krs_model->insert($data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data KRS Berhasil Ditambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>');
                redirect('administrator/krs/krs_aksi');
    }

}

public function _rules() {
    $this->form_validation->set_rules('id_thn_akad','id_thn_akad','required');
    $this->form_validation->set_rules('nim','nim','required');
    $this->form_validation->set_rules('kode_matakuliah','kode_matakuliah','required');
    
}


}

?>