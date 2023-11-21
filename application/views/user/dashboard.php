<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-gauge-high"></i> Dashboard
</div>

<?php echo $this->session->flashdata('pesan') ?>

<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Selamat Datang!</h4>
  <?php if ($profil_mahasiswa): ?>
    <p>Selamat Datang <strong><?= $profil_mahasiswa->nama_lengkap; ?></strong> di Sistem Informasi Akademik Universitas Negeri Medan Ilmu Komputer 22 B, Anda Login sebagai <strong><?php echo $level; ?></strong>  </p>
  <?php else: ?>
    <p>Profil mahasiswa tidak ditemukan.</p>
  <?php endif; ?>
  <?php if ($profil_mahasiswa): ?>
    
  
<hr>
</div>
  <div class="row">
    <div class="col-sm-8">
      <div class="container row ">
        <div class="card col-sm-4  ">
          <div class="card-body text-center">
            <h5 class="card-title">PROFILE MAHASISWA</h5>
            <img class = "mx-auto mt-2" src="<?php echo base_url('assets/uploads/').$profil_mahasiswa->photo ?>" style="width: 50%;" alt="">
          </div>
        </div>
        <div class="card col-sm-8">
          <div class="card-body">
            <h5 class="card-title mb-2">DATA MAHASISWA</h5>
            <table class="table mt-3">
                <tbody>
                    <tr>
                        <th scope="row">NIM</th>
                        <td><?php echo $profil_mahasiswa->nim; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Nama Lengkap</th>
                        <td><?php echo $profil_mahasiswa->nama_lengkap; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td><?php echo $profil_mahasiswa->email; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Alamat</th>
                        <td><?php echo $profil_mahasiswa->alamat; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Telepon</th>
                        <td><?php echo $profil_mahasiswa->telepon; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Tempat Lahir</th>
                        <td><?php echo $profil_mahasiswa->tempat_lahir; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Tanggal Lahir</th>
                        <td><?php echo $profil_mahasiswa->tanggal_lahir; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Jenis Kelamin</th>
                        <td><?php echo $profil_mahasiswa->jenis_kelamin; ?></td>
                    </tr>
                    
                </tbody>
            </table>
            
          </div>
        </div>
      </div>
        
      </div>
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body text-center">
          <h5 class="card-title">KALENDER AKADEMIK </h5>
          <div class="d-flex justify-content-center">
            <div id="calendar" > 
              <?= $calendar?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
</div>
