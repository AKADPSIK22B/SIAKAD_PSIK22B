<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-university"></i> Beasiswa
</div>

<?php echo $this->session->flashdata('pesan') ?>

<?php echo anchor('user/beasiswa/lihat_beasiswa', '<button class = "btn btn-sm btn-primary mb-3"><i class="fas fa-eye fa-sm"></i> Lihat Pengajuan</button>') ?>


<?php

foreach ($beasiswa as $bws) : ?>
    <div class="card mb-3">
    <div class="card-header">
        BEASISWA <span style="color: green;" class="font-weight-bold"><?= $bws->status?></span>
    </div>
    <div class="card-body ">
        <h5 class="card-title"><?= $bws->nama_beasiswa?></h5>
        <p class="card-text"><?= character_limiter($bws->deskripsi, 100); ?></p>
        <div class="d-flex justify-content-between">
        
        <?php echo anchor('user/beasiswa/detail_beasiswa/' .$bws->id_beasiswa, '<div class="btn btn-sm btn-primary">Lihat Detail</div>') ?>
        <?php echo anchor('user/beasiswa/ajukan/' .$bws->id_beasiswa, '<div class="btn btn-sm btn-outline-success">AJUKAN</div>') ?>
    </div>
    </div>
    </div>

    
    
</tr>

<?php endforeach; ?>

</table>


</div>