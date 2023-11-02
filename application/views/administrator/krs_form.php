<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-plus"></i> From Tambah Data KRS
</div>

<form methos="post" action="<?php echo base_url('administrator/krs/tambah_krs_aksi') ?>">

<div class="form_group">
    <label for="">Tahun Akademik</label>
    <input type="hidden" name="id_thn_akad" class="form-control" id="" value ="<?php echo $id_thn_akad; ?>">
    <input type="hidden" name="id_krs" class="form-control" id="" value ="<?php echo $id_krs; ?>">
    <input type="text" name="thn_akad_smt" class="form-control" id="" value ="<?php echo $thn_akad_smt. '/' .$semester; ?>" readonly>
</div>

<div class="form_group">
    <label for="">NIM Mahasiswa</label>
    <input type="text" name="nim" class="form-control" id="" value ="<?php echo $nim; ?>" readonly>
</div>

<div class="form_group">
    <label for="">Mata Kuliah</label>
    <?php $query = $this->db->query('SELECT kode_matakuliah,nama_matakuliah FROM matakuliah');
    
    $dropdowns = $query->result();
    foreach($dropdowns as $dropdown){
        $dropDownList[$dropdown->kode_matakuliah] = $dropdown->nama_matakuliah;
    
    }
    echo form_dropdown('kode_matakuliah',$dropDownList,$kode_matakuliah,'class="form-control" id_="kode_matakuliah"');?>


   


<button type="submit" class="btn btn-primary mt-4">Simpan</button>

<?php echo anchor('administrator/krs/krs_aksi','<div class="btn btn-danger mt-4"> Cancel </div>') ?>
</form>


</div>