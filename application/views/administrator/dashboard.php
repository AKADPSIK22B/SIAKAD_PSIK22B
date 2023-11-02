<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-gauge-high"></i> Dashboard
</div>

<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Selamat Datang!</h4>
  <p>Selamat Datang <strong><?php echo $username; ?></strong> di Sistem Informasi Akademik Universitas Negeri Medan Ilmu Komputer 22 B, Anda Login sebagai <strong><?php echo $level; ?></strong>  </p>
<hr>
  <!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="fa-solid fa-gears"></i> Control Panel
</button>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa-solid fa-gears"></i> Control Panel</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url() ?>"><p class = "nav-link small text-info">MAHASISWA</p></a>
                <i class="fa-solid fa-3x fa-graduation-cap"></i>
            </div>

            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url() ?>"><p class = "nav-link small text-info">TAHUN AKADEMIK</p></a>
                <i class="fa-solid fa-3x fa-calendar-days"></i>
            </div>

            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url() ?>"><p class = "nav-link small text-info">KRS</p></a>
                <i class="fa-solid fa-3x fa-edit"></i>
            </div>

            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url() ?>"><p class = "nav-link small text-info">KHS</p></a>
                <i class="fa-solid fa-3x fa-file-alt"></i>
            </div>
        </div><hr>

        <div class="row">
            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url() ?>"><p class = "nav-link small text-info">INPUT NILAI</p></a>
                <i class="fa-solid fa-3x fa-sort-numeric-down"></i>
            </div>

            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url() ?>"><p class = "nav-link small text-info">CETAK TRANSKIP</p></a>
                <i class="fa-solid fa-3x fa-print"></i>
            </div>

            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url() ?>"><p class = "nav-link small text-info">KATEGORI</p></a>
                <i class="fa-solid fa-3x fa-list-ul"></i>
            </div>

            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url() ?>"><p class = "nav-link small text-info">INFO KAMPUS</p></a>
                <i class="fa-solid fa-3x fa-bullhorn"></i>
            </div>
        </div><hr>

        <div class="row">
            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url() ?>"><p class = "nav-link small text-info">IDENTITAS</p></a>
                <i class="fa-solid fa-3x fa-id-card-alt"></i>
            </div>

            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url() ?>"><p class = "nav-link small text-info">TENTANG KAMPUS</p></a>
                <i class="fa-solid fa-3x fa-info-circle"></i>
            </div>

            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url() ?>"><p class = "nav-link small text-info">FASILITAS</p></a>
                <i class="fa-solid fa-3x fa-laptop"></i>
            </div>

            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url() ?>"><p class = "nav-link small text-info">GALLERY</p></a>
                <i class="fa-solid fa-3x fa-images"></i>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>