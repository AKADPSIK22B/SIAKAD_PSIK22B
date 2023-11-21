    <div class="container-fluid">

    <div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fa-solid fa-gauge-high"></i> TAGIHAN MAHASISWA
    </div>

    
    
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-2">TAGIHAN MAHASISWA</h5>
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
                                <th scope="row">Telepon</th>
                                <td><?php echo $profil_mahasiswa->telepon; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Program Studi</th>
                                <td><?php echo $profil_mahasiswa->nama_prodi; ?></td>
                            </tr>
                            </tbody>
                    </table>

                        
                </div>
            </div>
        </div>
        <div class="container row">


        <?php
$no = 1;
foreach ($tagihan_belum_lunas as $bill):
    if (is_object($bill)): // Check if $bill is an object
?>
    <div class="card col-sm-4 mx-auto" style="width: 20rem;">
        <div class="card-header">
            TAGIHAN <?= $no; ?>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <strong>NAMA TAGIHAN :</strong> <?= $bill->nama_tagihan ?>
            </li>
            <li class="list-group-item">
                <strong>JUMLAH TAGIHAN :</strong> <?= "Rp. " . $bill->jumlah ?>
            </li>
            <li class="list-group-item">
                <strong>STATUS :</strong> <?php echo $bill->status_tagihan; ?>
            </li>
            <li class="list-group-item">
                <strong>TENGGAT TAGIHAN :</strong> <?php echo $bill->tenggat_tagihan; ?>
            </li>
        </ul>
        <div class="mx-auto my-2"><?php echo anchor('user/konfirmasi_pembayaran/detail/'.$bill->id_tagihan , '<div class="btn btn-sm btn-success">Konfirmasi Tagihan</div>') ?></div>
    </div>
<?php
    endif;
    $no++;
endforeach;
?>

</div>
<div class="container mt-3">
    <?php echo anchor('user/dashboard', '<div class="btn btn-sm btn-primary">Kembali</div>') ?>
    

</div>
</div>




    <!-- LAMA -->
    
</div>
