<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-eye"></i> Detail Mata Kuliah
</div>

<table class="table tabel-hover table-striped table-bordered">
<?php foreach($detail as $dt) : ?>
<tr>
    <th>Kode Mata Kuliah</th>
    <td><?php echo $dt->kode_matakuliah; ?></td>
</tr>
<tr>
    <th>Nama Mata Kuliah</th>
    <td><?php echo $dt->nama_matakuliah; ?></td>
</tr>
<tr>
    <th>SKS</th>
    <td><?php echo $dt->sks; ?></td>
</tr>
<tr>
    <th>Semester</th>
    <td><?php echo $dt->semester; ?></td>
</tr>
<tr>
    <th>Nama Program Studi</th>
    <td><?php echo $dt->nama_prodi; ?></td>
</tr>

<?php endforeach; ?>
</table>

<?php echo anchor('administrator/matakuliah','<div class="btn btn-sm btn-primary">Kembali</div>
')?>


</div>