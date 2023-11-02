<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-university"></i> Form Update Prodi
</div>

<?php foreach($prodi as $prd) : ?>

    <form method = "post" action="<?php echo base_url('administrator/prodi/update_aksi') ?>">

    <div class="form-group">
        <label for="">Kode Prodi</label>
        <input type="hidden" name ="id_prodi" value="<?php echo $prd->id_jurusan ?>">
        <input type="text" name = "kode_prodi" class ="form-control" value= "<?php echo $prd->kode_prodi ?>">
    </div>

    <div class="form-group">
        <label for="">Nama Prodi</label>
        <input type="text" name = "nama_prodi" class ="form-control" value= "<?php echo $prd->nama_prodi ?>">
    </div>

    <div class="form-group">
        <label for="">Nama jurusan</label>
        <select name="nama_jurusan" class="form-control" id="">
            <option value="<?php echo $prd->nama_jurusan ?>"><?php echo $prd->nama_jurusan; ?></option>
            <?php foreach($jurusan as $jrs) : ?>
            <option value="<?php echo $jrs->nama_jurusan ?>"><?php echo $jrs->nama_jurusan; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type = "submit" class = "btn btn-primary">Simpan</button>

</form>
<?php endforeach ?>

</div>