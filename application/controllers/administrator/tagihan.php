<?php 
        class Tagihan extends CI_Controller{

            public function index(){
                $data['mahasiswa'] = $this->mahasiswa_model->tampil_data('mahasiswa')->result();
                $data['tagihan'] = $this->tagihan_model->tampil_data('tagihan')->result();
                $data_admin = $this->getAdminData();
                $this->load->view('templates_administrator/header');
                $this->load->view('templates_administrator/sidebar', $data_admin);
                $this->load->view('administrator/tagihan', $data);
                $this->load->view('templates_administrator/footer');
            }

            public function detail($id){    
                $detail = $this->mahasiswa_model->ambil_id_mahasiswa($id);
                $tagihan = $this->db->query("SELECT * FROM tagihan WHERE id_mahasiswa='$id'")->result();
                $tagihan_belum_lunas = $this->tagihan_model->get_belum_lunas_by_id($id);
                $data = array(
                
                    'profil_mahasiswa' => $detail,
                    'tagihan_belum_lunas' => $tagihan_belum_lunas,
                    'tagihan' => $tagihan,
                    
                );
                $data_admin = $this->getAdminData();
                $this->load->view('templates_administrator/header');
                $this->load->view('templates_administrator/sidebar',$data_admin);
                $this->load->view('administrator/tagihan_detail', $data);
                $this->load->view('templates_administrator/footer');
            }

            public function history($id){
                $tagihan = $this->db->query("SELECT * FROM tagihan WHERE id_mahasiswa='$id'")->result();
                $payment_history = $this->pembayaran_model->get_payment_history($id);
            
                $detail = $this->mahasiswa_model->ambil_id_mahasiswa($id);
                $data = array(
                    'profil_mahasiswa' => $detail,
                    'tagihan' => $tagihan,
                    'payment_history' => $payment_history
                );
                $data_admin = $this->getAdminData();
                $this->load->view('templates_administrator/header');
                $this->load->view('templates_administrator/sidebar',$data_admin);
                $this->load->view('administrator/payment_history', $data);
                $this->load->view('templates_administrator/footer');


            }

            public function tambah_tagihan($id){
                $data['mahasiswa'] = $this->db->query("select * from mahasiswa mhs, prodi prd where mhs.nama_prodi=prd.nama_prodi and mhs.id='$id'")->result();
                $data['prodi'] = $this->matakuliah_model->tampil_data('prodi')->result();
                $data['detail'] = $this->mahasiswa_model->ambil_id_mahasiswa($id);
                $data_admin = $this->getAdminData();
                $this->load->view('templates_administrator/header');
                $this->load->view('templates_administrator/sidebar',$data_admin);
                $this->load->view('administrator/form_Tagihan', $data);
                $this->load->view('templates_administrator/footer');
            }


            public function tambah_tagihan_aksi(){
                $this->_rules();
                if($this->form_validation->run() == FALSE){
                    $this->tambah_tagihan($this->input->post('id'));
            }
            else{
                $nama_tagihan = $this->input->post('nama_tagihan');
                $jumlah=$this->input->post('jumlah_tagihan');
                $tgl_pembuatan = date('Y-m-d H:i:s');
                $id = $this->input->post('id');
                $status_tagihan = $this->input->post('status_tagihan');
                $tenggat_tagihan = $this->input->post('tenggat_tagihan');
                
                
            
                $data = array(
                    'nama_tagihan' => $nama_tagihan,
                    'jumlah' => (int)$jumlah,
                    'tgl_pembuatan' => $tgl_pembuatan,
                    'id_mahasiswa' => $id,
                    'status_tagihan' => $status_tagihan,
                    'tenggat_tagihan' => $tenggat_tagihan
                );
                
        
                $this->tagihan_model->insert_data($data,'tagihan');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Tagihan Mahasiswa Berhasil Ditambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script>
                    setTimeout(function(){
                        $("#alert").alert("close");
                    }, 200);
                </script>');
                redirect('administrator/tagihan');
            }
            }

            public function _rules(){
                $this->form_validation->set_rules('jumlah_tagihan','jumlah_tagihan', 'required', ['required' => 'jumlah tagihan wajib diisi!']);
                $this->form_validation->set_rules('nama_tagihan','nama_tagihan', 'required', ['required' => 'nama tagihan wajib diisi!']);
                $this->form_validation->set_rules('status_tagihan', 'Status Tagihan', 'required|in_list[BELUM LUNAS,LUNAS]');
                $this->form_validation->set_rules('tenggat_tagihan', 'Tenggat Tagihan', 'required|date');
            }

            public function hapus_tagihan($id_tagihan) {
                // Assume $id_mahasiswa is passed as a parameter representing the tagihan ID to be deleted
                $data['tagihan'] = $this->tagihan_model->get_by_id($id_tagihan);
                $id_mahasiswa = $data['tagihan']->id_mahasiswa;
                // Check if the tagihan exists
                $tagihan_exists = $this->tagihan_model->cek_tagihan_exists($id_mahasiswa);
            
                if ($tagihan_exists) {
                    // Delete the tagihan entry
                    $this->tagihan_model->hapus_tagihan($id_tagihan);
            
                    // Set flashdata or any success message
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Tagihan Mahasiswa Berhasil Dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <script>
                    setTimeout(function(){
                        $("#alert").alert("close");
                    }, 5000);
                </script>');
                } else {
                    // Set flashdata or any error message
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Tagihan Mahasiswa tidak ditemukan atau sudah dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                }
            
                // Redirect to the appropriate page
                redirect('administrator/tagihan');
            }

            public function edit_tagihan($id_tagihan) {
                // Assume $id_mahasiswa is passed as a parameter representing the tagihan ID to be edited
            
                // Retrieve existing tagihan data
                $data['tagihan'] = $this->tagihan_model->get_by_id($id_tagihan);
                $id_mahasiswa = $data['tagihan']->id_mahasiswa;
                $data['mahasiswa'] = $this->db->query("select * from mahasiswa mhs, prodi prd where mhs.nama_prodi=prd.nama_prodi and mhs.id='$id_mahasiswa'")->result();
                $data_admin = $this->getAdminData();
                if (!$data['tagihan']) {
                    // Set flashdata or any error message if the tagihan is not found
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Tagihan Mahasiswa tidak ditemukan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
            
                    // Redirect to the appropriate page
                    redirect('administrator/tagihan');
                }
            
                // Load view with edit form
                $this->load->view('templates_administrator/header');
                $this->load->view('templates_administrator/sidebar',$data_admin);
                $this->load->view('administrator/tagihan_update', $data);
                $this->load->view('templates_administrator/footer');
            }
            
            public function update_tagihan($id_tagihan) {
                // Assume $id_mahasiswa is passed as a parameter representing the tagihan ID to be updated
            
                // Handle form submission
                $this->_rules();
                // Add more validation rules as needed
            
                if ($this->form_validation->run() == FALSE) {
                    // If validation fails, redisplay the form with validation errors
                    $this->edit_tagihan($id_tagihan);
                } else {
                    // If validation passes, update the tagihan data
                    $nama_tagihan = $this->input->post('nama_tagihan');
                    $jumlah = $this->input->post('jumlah_tagihan');
                    $tgl_pembuatan = date('Y-m-d H:i:s');
                    $status_tagihan = $this->input->post('status_tagihan');
                    $tenggat_tagihan = $this->input->post('tenggat_tagihan');
                    
            
                    $data = array(
                        'nama_tagihan' => $nama_tagihan,
                        'jumlah' => (int)$jumlah,
                        'tgl_pembuatan' => $tgl_pembuatan,
                        'status_tagihan' => $status_tagihan,
                        'tenggat_tagihan' => $tenggat_tagihan
                        
                    );
            
                    $this->tagihan_model->update_tagihan($id_tagihan, $data);
            
                    // Set flashdata or any success message
                    $this->session->set_flashdata('pesan', '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
                    Tagihan Mahasiswa Berhasil Diperbarui! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                    setTimeout(function(){
                        $("#alert").alert("close");
                    }, 5000);
                </script>');
                    // Redirect to the appropriate page
                    redirect('administrator/tagihan');
                }
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