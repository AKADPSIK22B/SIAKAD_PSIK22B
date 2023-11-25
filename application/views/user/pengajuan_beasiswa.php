<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fa-solid fa-university"></i> Pengajuan Beasiswa
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Beasiswa</th>
                <th>Deskripsi Beasiswa</th>
                <th>Status Pengajuan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pengajuan_beasiswa as $pengajuan) : ?>
                <?php
                // Find the corresponding scholarship information for the current application
                $bws = null;
                foreach ($beasiswa as $scholarship) {
                    if ($scholarship->id_beasiswa == $pengajuan->id_beasiswa) {
                        $bws = $scholarship;
                        break;
                    }
                }
                ?>

                <tr>
                    <!-- Display scholarship information if found -->
                    <?php if ($bws) : ?>
                        <td><?= $bws->nama_beasiswa; ?></td>
                        <td><?= $bws->deskripsi; ?></td>
                    <?php else : ?>
                        <td colspan="2">No scholarship information found for this application.</td>
                    <?php endif; ?>

                    <!-- Display application status -->
                    <?php
                    $statusClass = '';
                    
                    if ($pengajuan->status == 'Menunggu') {
                        $statusClass = 'btn btn-sm btn-warning';
                    } elseif ($pengajuan->status == 'Disetujui') {
                        $statusClass = 'btn btn-sm btn-success';
                    } elseif ($pengajuan->status == 'Ditolak') {
                        $statusClass = 'btn btn-sm btn-danger';
                    }
                ?>
                    <td class=""><div class="<?= $statusClass; ?>"><?= $pengajuan->status; ?></div></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
