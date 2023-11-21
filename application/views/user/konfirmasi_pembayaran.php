    <div class="container-fluid">

    <div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fa-solid fa-gauge-high"></i> KONFIRMASI TAGIHAN
    </div>

    <?php if (!empty($tagihan)): ?>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-2">KONFIRMASI TAGIHAN</h5>
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
                                <th scope="row">Program Studi</th>
                                <td><?php echo $profil_mahasiswa->nama_prodi; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Nama Tagihan</th>
                                <td class="text-danger font-weight-bold"><?php echo $tagihan->nama_tagihan; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Jumlah Tagihan</th>
                                <td class="text-danger font-weight-bold"><?= "Rp." . $tagihan->jumlah; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Tenggat </th>
                                <td class="text-danger font-weight-bold"><?= $tagihan->tenggat_tagihan; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Status </th>
                                <td class="text-danger font-weight-bold"><?= $tagihan->status_tagihan; ?></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php else: ?>
        <p>Tidak ada data tagihan atau tagihan sudah lunas.</p>
    <?php endif; ?>
<div class="container mt-3">
    <?php echo anchor('user/dashboard', '<div class="btn btn-sm btn-primary">Kembali</div>') ?>
    <?php echo anchor('user/konfirmasi_pembayaran/form_pembayaran/'. $tagihan->id_tagihan, '<div class="btn btn-sm btn-success">Proses</div>') ?>

</div>
</div>




    <!-- LAMA -->
    
</div>
