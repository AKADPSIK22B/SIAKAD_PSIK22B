<?php 
        class Konfirmasi_pembayaran extends CI_Controller{

            public function detail($id_tagihan){
                $id_mahasiswa = $this->session->userdata('id_mahasiswa');
                $data = $this->user_model->get_user_by_id($id_mahasiswa);
                $tagihan = $this->tagihan_model->get_by_id($id_tagihan);
            
                $data_view = array(
                    'username' => $data->username,
                    'level' => $data->level,
                    'profil_mahasiswa' => $data,
                    'tagihan' => $tagihan,
                );
                $this->load->view('templates_user/header');
                $this->load->view('templates_user/sidebar',$data_view);

                if ($data && $tagihan && $tagihan->status_tagihan === 'BELUM LUNAS') {
                $this->load->view('user/konfirmasi_pembayaran', $data_view);
            } else {
                // If either $data or $tagihan is empty, load a different view
                $this->load->view('user/no_tagihan', $data_view);
            }
            $this->load->view('templates_user/footer');
        }

        public function form_pembayaran($id_tagihan){
            $id_mahasiswa = $this->session->userdata('id_mahasiswa');
            $data = $this->user_model->get_user_by_id($id_mahasiswa);
            $tagihan_data = $this->tagihan_model->get_tagihan_by_id($id_mahasiswa);
            $tagihan = $this->tagihan_model->get_by_id($id_tagihan);
            
        
            $data_view = array(
                'username' => $data->username,
                'level' => $data->level,
                'profil_mahasiswa' => $data,
                'tagihan' => $tagihan,
            );
            $this->load->view('templates_user/header');
            $this->load->view('templates_user/sidebar',$data_view);

            if ($data && $tagihan) {
            $this->load->view('user/form_pembayaran', $data_view);
        } else {
            // If either $data or $tagihan is empty, load a different view
            $this->load->view('user/no_tagihan', $data_view);
        }
        $this->load->view('templates_user/footer');
    
        }

    
        public function proses_pembayaran(){
            $this->_rules();
            if($this->form_validation->run() == FALSE){
                $this->form_pembayaran($this->input->post('id_tagihan'));
        }else {
            $id_tagihan = $this->input->post('id_tagihan');
            $nominal_pembayaran = $this->input->post('nominal_pembayaran');

            $tagihan = $this->tagihan_model->get_by_id($id_tagihan);
            
            // Validasi jumlah pembayaran
            if ($nominal_pembayaran < $tagihan->jumlah) {
            // Handle jika nominal pembayaran kurang dari jumlah tagihan
            redirect('user/dashboard');
            }
            $no_transaksi = time() . '-' . $id_tagihan;
            $status_pembayaran = ($nominal_pembayaran == $tagihan->jumlah) ? 'LUNAS' : 'BELUM LUNAS';
            

            // Hitung selisih dan update jumlah di tabel tagihan jika belum lunas
            $selisih = $tagihan->jumlah - $nominal_pembayaran;
            $data_tagihan = array('jumlah' => $selisih, 'status_tagihan' => $status_pembayaran);
            
            // Logika untuk menyimpan data pembayaran ke database
            $data_pembayaran = array(
                'id_tagihan' => $id_tagihan,
                'no_transaksi' => $no_transaksi,
                'nominal_pembayaran' => $nominal_pembayaran,
                'status_pembayaran' => $status_pembayaran,
            );
            
            $this->pembayaran_model->insert_pembayaran($data_pembayaran);
            $this->tagihan_model->update_tagihan_user($id_tagihan, $data_tagihan);
            

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Pembayaran Sukses! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
                setTimeout(function(){
                    $("#alert").alert("close");
                }, 2000);
            </script>');
            redirect('user/dashboard');
        }

        }

        public function _rules(){
            $this->form_validation->set_rules('nominal_pembayaran','nominal_pembayaran', 'required', ['required' => 'Nominal Pembayaran wajib diisi!']);
            
        }
    }
?>