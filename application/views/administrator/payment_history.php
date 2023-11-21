<div class="container">
    <div class="card text-center">
        <div class="card-header">
            HISTORI TAGIHAN
        </div>
        <div class="card-body">
            <h5 class="card-title"><?= $profil_mahasiswa[0]->nama_lengkap; ?></h5>
            
            <p class="card-text">TAGIHAN YANG SUDAH LUNAS</p>

            <?php if (!empty($tagihan)): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NO. TRANSAKSI</th>
                            <th scope="col">NAMA TAGIHAN </th>
                            <th scope="col">NOMINAL</th>
                            <th scope="col">STATUS</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                        <?php foreach ($tagihan as $tagihanItem): ?>
                            <?php foreach ($payment_history as $payment): ?>
                                <?php if ($payment->id_tagihan == $tagihanItem->id_tagihan): ?>
                                    <tr>
                                        <th scope="row"><?= $no; ?></th>
                                        <td><?= $payment->no_transaksi; ?></td>
                                        <td><?= $tagihanItem->nama_tagihan; ?></td>
                                        <td><?= $payment->nominal_pembayaran; ?></td>
                                        <td><?= $payment->status_pembayaran; ?></td>
                                        
                                    </tr>
                                    <?php $no++; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            
            <?php endif; ?>
            <?php echo anchor('administrator/tagihan', '<div class="btn btn-sm btn-primary">Kembali</div>') ?>
        </div>
        
    </div>
</div>
