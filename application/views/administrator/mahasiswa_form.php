<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-university"></i> Form Input Mahasiswa
</div>

<?php echo form_open_multipart('administrator/mahasiswa/tambah_mahasiswa_aksi')?>

<div class="form-group">
    <label for="">NIM Mahasiswa</label>
    <input type="text" name="nim" class="form-control" id="">
    <?php echo form_error('nim', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Nama Mahasiswa</label>
    <input type="text" name="nama_lengkap" class="form-control" id="">
    <?php echo form_error('nama_lengkap', '<div class="text-danger small ml-3">','</div>') ?>

    <div class="form-group">
    <label for="">Alamat</label>
    <input type="text" name="alamat" class="form-control" id="">
    <?php echo form_error('alamat', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Email</label>
    <input type="text" name="email" class="form-control" id="">
    <?php echo form_error('email', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Telepon</label>
    <input type="text" name="telepon" class="form-control" id="">
    <?php echo form_error('telepon', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Tempat Lahir</label>
    <input type="text" name="tempat_lahir" class="form-control" id="">
    <?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Tanggal Lahir</label>
    <input type="date" name="tanggal_lahir" class="form-control" id="">
    <?php echo form_error('tanggal_lahir', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Jenis Kelamin</label>
    <select name="jenis_kelamin" class="form-control" id="">
        <option>--Pilih Jenis Kelamin--</option>
        <option>Laki-laki</option>
        <option>Perempuan</option>
    </select>
    <?php echo form_error('jenis_kelamin', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Program Studi</label>
    <select name="nama_prodi" class="form-control" id="">
        <option>--Pilih Program studi--</option>
        <?php foreach($prodi as $prd) : ?>
        <option value="<?php echo $prd->nama_prodi ?>"><?php echo $prd->nama_prodi ?></option>
        <?php endforeach; ?>
    </select>
    <?php echo form_error('jenis_kelamin', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Foto</label><br>
    <input type="file" name="photo">
</div>

<button type="submit" class="btn btn-sm btn-primary">Simpan</button>

<?php form_close(); ?>

</div>