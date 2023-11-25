<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-university"></i> Beasiswa
</div>

<?php echo $this->session->flashdata('pesan') ?>
<div class="d-flex gap-2">
    <?php echo anchor('administrator/beasiswa/tambah_beasiswa', '<button class = "btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Beasiswa</button>') ?>
    <?php echo anchor('administrator/beasiswa/lihat_pengajuan', '<button class = "btn btn-sm btn-outline-primary mb-3"><i class="fas fa-eye fa-sm"></i> Lihat Pengajuan</button>') ?>

</div>


<?php

foreach ($beasiswa as $mhs) : ?>
    <div class="card">
    <div class="card-header">
        BEASISWA <span style="color: green;" class="font-weight-bold"><?= $mhs->status?></span>
    </div>
    <div class="card-body ">
        <h5 class="card-title"><?= $mhs->nama_beasiswa?></h5>
        <p class="card-text"><?= character_limiter($mhs->deskripsi, 100); ?></p>
        <div class="d-flex justify-content-between">
        <a href="#" class="btn btn-primary">Lihat Detail</a>
        <?php echo anchor('administrator/beasiswa/delete/' .$mhs->id_beasiswa, '<div class="btn btn-sm btn-danger"><i class = "fa fa-trash"> </i></div>') ?>
        </div>
    </div>
    </div>

    
    
</tr>

<?php endforeach; ?>

</table>


</div>