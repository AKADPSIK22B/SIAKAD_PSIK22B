<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-university"></i> Ubah Tagihan Mahasiswa
</div>

<?php foreach($mahasiswa as $mhs) : ?>
<?php echo form_open_multipart('administrator/tagihan/update_tagihan/' . $tagihan->id_mahasiswa)?>
<div class="form-group">
    <label for="">NIM Mahasiswa</label>
    <input type="hidden" name="id_mahasiswa" class="form-control" id=""  value="<?= set_value('jumlah', $tagihan->id_mahasiswa);?>">
    <input type="text" name="nim" class="form-control" id="" readonly value="<?php echo $mhs->nim  ?>">
    <?php echo form_error('nim', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Nama Mahasiswa</label>
    <input type="text" name="nama_lengkap" class="form-control" readonly id="" value="<?php echo $mhs->nama_lengkap  ?>">
    <?php echo form_error('nama_lengkap', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Jenis Kelamin</label>
    <input type="text" name="jenis_kelamin" readonly class="form-control" id="" value="<?php echo $mhs->jenis_kelamin  ?>">
    <?php echo form_error('jenis_kelamin', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Nama Tagihan</label>
    <input type="text" name="nama_tagihan" class="form-control" value="<?= set_value('jumlah', $tagihan->nama_tagihan);?>" id="">
    <?php echo form_error('nama_tagihan', '<div class="text-danger small ml-3">','</div') ?>
</div>
<div class="form-group">
    <label for="">Jumlah Tagihan</label>
    <input type="text" name="jumlah_tagihan" class="form-control" value="<?= set_value('jumlah', $tagihan->jumlah);?>" id="">
    <?php echo form_error('jumlah_tagihan', '<div class="text-danger small ml-3">','</div') ?>
</div>

<div class="form-group">
    <label for="">Status Tagihan</label>
    <select name="status_tagihan" class="form-control">
        <option value="Aktif" <?= set_select('status_tagihan', 'Aktif', ($tagihan->status_tagihan == 'Aktif')); ?>>Aktif</option>
        <option value="Lunas" <?= set_select('status_tagihan', 'Lunas', ($tagihan->status_tagihan == 'Lunas')); ?>>Lunas</option>
    </select>
    <?php echo form_error('status_tagihan', '<div class="text-danger small ml-3">', '</div>'); ?>
</div>

<div class="form-group">
    <label for="">Tenggat Tagihan</label>
    <input type="date" name="tenggat_tagihan" class="form-control" value="<?= set_value('tenggat_tagihan', $tagihan->tenggat_tagihan); ?>">
    <?php echo form_error('tenggat_tagihan', '<div class="text-danger small ml-3">', '</div>'); ?>
</div>


<button type="submit" class="btn btn-sm btn-primary">UBAH TAGIHAN</button>

<?= form_close(); ?>
<?php endforeach; ?>

</div>