<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-edit"></i> Form Update Mata Kuliah
</div>

<?php foreach($matakuliah as $mk) : ?>

<form method="post" action="<?php echo base_url('administrator/matakuliah/update_aksi'); ?>">

<div class="form-group">
    <label for="">Nama Mata Kuliah</label>
    <input type="hidden" name="kode_matakuliah" class="form-control" value="<?php echo $mk->kode_matakuliah ?>">
    <input type="text" name="nama_matakuliah" class="form-control" value="<?php echo $mk->nama_matakuliah ?>">
</div>

<div class="form-group">
    <label for="">SKS</label>
    <select name="sks" class="form-control" id="">
        <option><?php echo $mk->sks ?></option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
    </select>
</div>

<div class="form-group">
    <label for="">Semester</label>
    <select name="semester" class="form-control" id="">
        <option><?php echo $mk->semester ?></option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
    </select>
</div>

<div class="form-group">
    <label for="">Program stusi</label>
    <select name="nama_prodi" class="form-control" id="">
        <option value=""><?php echo $mk->nama_prodi ?></option>
        <?php foreach($prodi as $prd) : ?>
        <option value="<?php echo $prd->nama_prodi; ?>"><?php echo $prd->nama_prodi; ?></option>
        <?php endforeach; ?>
    </select>
</div>
<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
</form>
<?php endforeach; ?>
</div>