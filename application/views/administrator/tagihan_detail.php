<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-eye"></i> Detail Tagihan Mahasiswa 
</div>

<table class="table table-hover table-bordered table-striped">
<?php foreach($profil_mahasiswa as $dt) : ?>

    <img class = "mb-4 " src="<?php echo base_url('assets/uploads/').$dt->photo ?>" style="width: 20%;" alt="">
<tr>
    <td>NIM</td>
    <td><?php echo $dt->nim; ?></td>
</tr>
<tr>
    <td>NAMA LENGKAP</td>
    <td><?php echo $dt->nama_lengkap; ?></td>
</tr>
<tr>
    <td>ALAMAT</td>
    <td><?php echo $dt->alamat; ?></td>
</tr>
<tr>
    <td>EMAIL</td>
    <td><?php echo $dt->email; ?></td>
</tr>
<tr>
    <td>TELEPON</td>
    <td><?php echo $dt->telepon; ?></td>
</tr>
<tr>
    <td>TEMPAT LAHIR</td>
    <td><?php echo $dt->tempat_lahir; ?></td>
</tr>
<tr>
    <td>TANGGAL LAHIR</td>
    <td><?php echo $dt->tanggal_lahir; ?></td>
</tr>
<tr>
    <td>JENIS KELAMIN</td>
    <td><?php echo $dt->jenis_kelamin; ?></td>
</tr>
<tr>
    <td>PROGRAM STUDI</td>
    <td><?php echo $dt->nama_prodi; ?></td>
</tr>

<?php endforeach; ?>
</table>

<div class="container row">


<?php
$no = 1;
foreach ($tagihan_belum_lunas as $bill):
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
        <div class="d-flex gap-2 ml-3">
            
            <td class="ml-3" width = 20px><?php echo anchor('administrator/tagihan/edit_tagihan/' .$bill->id_tagihan, '<div class="btn btn-sm btn-primary"><i class = "fa fa-edit"> </i></div>') ?></td>
            <td width="20px">
    <?php echo anchor(
        'administrator/tagihan/hapus_tagihan/' . $bill->id_tagihan,
        '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>',
        array('onclick' => "return confirm('Apakah Anda yakin ingin menghapus tagihan ini?')")
    ) ?>
</td>
            <!-- <td width = 20px><?php echo anchor('administrator/tagihan/hapus_tagihan/' .$bill->id_tagihan, '<div class="btn btn-sm btn-danger"><i class = "fa fa-trash"> </i></div>'), array('onclick' => "return confirm('Apakah Anda yakin ingin menghapus tagihan ini?')") ?></td> -->
        </div>
    </div>


    
    
    <!-- Add more details as needed -->
    <?php
$no++; 

endforeach; ?>

</div>
<div class="space-between">
    <?php foreach ($profil_mahasiswa as $dt) {
        echo anchor('administrator/tagihan/history/'. $dt->id , '<div class="btn btn-sm btn-outline-success">Lihat History</div>');
    }?>
    <?php  ?>
    <?php echo anchor('administrator/tagihan', '<div class="btn btn-sm btn-primary">Kembali</div>') ?>

</div>
<br><br><br><br>
</div>