<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-university"></i> Ubah Tagihan Mahasiswa
</div>


<div class="form-group ">
    <label for="">Nama Mahasiswa</label>
    <input type="text" name="nama_lengkap" class="form-control" id="" readonly value="<?php echo $mahasiswa_data->nama_lengkap  ?>">
    <?php echo form_error('nama_lengkap', '<div class="text-danger small ml-3">','</div>') ?>
</div>
<div class="form-group ">
    <label for="">Nama Beasiswa</label>
    <input type="text" name="nama" class="form-control" id="" readonly value="<?php echo $beasiswa_data->nama_beasiswa  ?>">
    <?php echo form_error('nama', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<?php echo form_open_multipart('administrator/beasiswa/tolak_beasiswa_aksi')?>
<div class="form-group ">
    <label for="">Alasan</label>
    <input type="hidden" name="id_pengajuan" class="form-control" id="" readonly value="<?php echo $pengajuan_data->id_pengajuan  ?>">
    
    <input type="text" name="alasan" class="form-control" id="">
    <?php echo form_error('alasan', '<div class="text-danger small ml-3">','</div>') ?>
</div>



<div class="d-flex justify-content-between">
<button type="submit" class="btn btn-sm btn-danger">TOLAK</button>

<?= form_close(); ?>

<?php echo anchor('administrator/tagihan', '<div class="btn btn-sm btn-outline-primary">Kembali</div>') ?>
</div>

</div>