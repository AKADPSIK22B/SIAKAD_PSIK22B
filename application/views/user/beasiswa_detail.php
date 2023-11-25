<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-university"></i> Beasiswa
</div>

<?php echo $this->session->flashdata('pesan') ?>

<?php echo anchor('user/beasiswa/lihat_beasiswa', '<button class = "btn btn-sm btn-primary mb-3"><i class="fas fa-eye fa-sm"></i> Lihat Pengajuan</button>') ?>





    <div class="card">
    <div class="card-header">
        BEASISWA <span style="color: green;" class="font-weight-bold"><?= $beasiswa->status?></span>
    </div>
    <div class="card-body ">
        <h5 class="card-title"><?= $beasiswa->nama_beasiswa?></h5>
        <p class="card-text"><?= $beasiswa->deskripsi ?></p>
        <p class="card-text"><?= $beasiswa->persyaratan ?></p>
        
        
        
        <?php echo anchor('user/beasiswa/ajukan/' .$beasiswa->id_beasiswa, '<div class="btn btn-sm btn-outline-success">AJUKAN</div>') ?>
        <?php echo anchor('user/beasiswa' , '<div class="btn btn-sm btn-primary"> Kembali </div>') ?>
    
    </div>
    </div>

    
    
</tr>



</table>


</div>