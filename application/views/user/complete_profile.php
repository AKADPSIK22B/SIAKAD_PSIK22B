<div class="container mt-5">
        <h2 class="mb-4">Form Biodata Mahasiswa</h2>
        <div class="alert alert-success" role="alert">
<i class="fa-solid fa-university"></i> Silahkan Lengkapi Data Biodata Anda
</div>
        <?php echo form_open_multipart('user/complete_profile/proses_biodata')?>
            <!-- Informasi Mahasiswa -->
            <h4>Informasi Mahasiswa</h4>
            <hr>

            <div class="form-group row">
                <label for="namaDepan" class="col-sm-2 col-form-label">Nama Depan</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="namaDepan" placeholder="Nama Depan">
                </div>
                <label for="namaBelakang" class="col-sm-2 col-form-label">Nama Belakang</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="namaBelakang" placeholder="Nama Belakang">
                </div>
            </div>

            <div class="form-group row">
                <label for="jenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-4">
                    <select class="form-control" name="jenisKelamin">
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
                <label for="tempatLahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="tempatLahir" placeholder="Tempat Lahir">
                </div>
            </div>

            <div class="form-group row">
                <label for="tanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" name="tanggalLahir">
                </div>
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-4">
                    <textarea class="form-control" name="alamat" rows="2" placeholder="Alamat"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" name="email">
                </div>
                <label for="telepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="nomorTelepon">
                </div>
                <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                <div class="col-sm-4 mt-2">
                    <input type="text" class="form-control" name="agama">
                </div>
                
            </div>

            <!-- Informasi Orang Tua -->
            <h4 class="mt-4">Informasi Orang Tua</h4>
            <hr>

            <div class="form-group row">
                <label for="namaAyah" class="col-sm-2 col-form-label">Nama Ayah</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="namaAyah" placeholder="Nama Ayah">
                </div>
                <label for="pekerjaanAyah" class="col-sm-2 col-form-label">Pekerjaan Ayah</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="pekerjaanAyah" placeholder="Pekerjaan Ayah">
                </div>
                <label for="gajiAyah" class="col-sm-2 col-form-label">Gaji Ayah</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="gajiAyah" placeholder="Gaji Ayah">
                </div>
            </div>

            <div class="form-group row">
                
                <label for="namaIbu" class="col-sm-2 col-form-label">Nama Ibu</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="namaIbu" placeholder="Nama Ibu">
                </div>
                <label for="pekerjaanIbu" class="col-sm-2 col-form-label">Pekerjaan Ibu</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="pekerjaanIbu" placeholder="Pekerjaan Ibu">
                </div>
                <label for="gajiIbu" class="col-sm-2 col-form-label">Gaji Ibu</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="gajiIbu" placeholder="Gaji Ibu">
                </div>
            </div>

    

            <!-- Tombol Submit -->
            <div class="form-group row mt-4">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Simpan </button>
                    <?php form_close(); ?>
                </div>
            </div>
        </form>
    </div>