<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-university"></i> Beasiswa
</div>

<?php echo $this->session->flashdata('pesan') ?>
<div class="d-flex gap-2">
    <?php echo anchor('administrator/beasiswa', '<button class = "btn btn-sm btn-outline-primary mb-3"><i class="fas fa-backward fa-sm"></i> Kembali </button>') ?>
    

</div>


<?php

foreach ($beasiswa as $mhs) : ?>
    <div class="card">
    <div class="card-header">
        <span  class="font-weight-bold"><?= $mhs->nama_lengkap ?></span>
    </div>
    <div class="card-body ">
        <h5 class="card-title"><?= $mhs->nama_beasiswa?></h5>
        <?php
        $statusClass = '';
        
        if ($mhs->status == 'Menunggu') {
            $statusClass = 'btn btn-sm btn-warning';
        } elseif ($mhs->status == 'Disetujui') {
            $statusClass = 'btn btn-sm btn-success';
        } elseif ($mhs->status == 'Ditolak') {
            $statusClass = 'btn btn-sm btn-danger';
        }
    ?>
        <p class="card-text <?= $statusClass;?>"><?= $mhs->status ?></p>
        <div class="d-flex justify-content-between">
        <a href="#" class="btn btn-primary">Lihat Detail</a>
        <div>

        <?php if ($mhs->status == 'Menunggu'): ?>
                    <div>
                        <?php echo anchor('administrator/beasiswa/setuju/' .$mhs->id_pengajuan, '<div class="btn btn-sm btn-success"><i class="fa fa-check"></i> SETUJU</div>') ?>
                        <?php echo anchor('administrator/beasiswa/beasiswa_tolak/' .$mhs->id_pengajuan, '<div class="btn btn-sm btn-danger"><i class="fa fa-xmark"></i> TOLAK</div>') ?>
                    </div>
                <?php endif; ?>
        </div>
        </div>
    </div>
    </div>

    
    
</tr>

<?php endforeach; ?>

</table>


</div>