<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-university"></i> Form Tambah Beasiswa
</div>

<?php echo form_open_multipart('administrator/beasiswa/tambah_beasiswa_aksi')?>

<div class="form-group">
    <label for="">Nama Beasiswa</label>
    <input type="text" name="nama_beasiswa" class="form-control" id="">
    <?php echo form_error('nama_beasiswa', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Deskripsi Beasiswa</label>
    <input type="text" size="100" width="30" name="deskripsi" class="form-control" id="">
    <?php echo form_error('deskripsi', '<div class="text-danger small ml-3">','</div>') ?>

    <div class="form-group">
    <label for="">Persyaratan</label>
    <input type="text" size="30"  name="persyaratan" class="form-control" id="">
    <?php echo form_error('persyaratan', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
<label for="">Status</label>
    <select name="status" class="form-control">
        <option value="Aktif">Aktif</option>
        <option value="Tidak Aktif">Tidak Aktif</option>
    </select>
    <?php echo form_error('status', '<div class="text-danger small ml-3">', '</div>'); ?>
</div>


<button type="submit" class="btn btn-sm btn-primary">Simpan</button>

<?php form_close(); ?>

</div>