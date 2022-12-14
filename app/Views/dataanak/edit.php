<?= $this->extend('dashboard/dashboard'); ?>
<?= $this->section('content'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="container">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4 class="mt-2">Edit Data Anak</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <form action="/dataanak/update" method="post">
                        <div class="form-group">
                            <label for="id_anak">ID Anak</label>
                            <input type="text" class="form-control" id="id_anak" name="id_anak" value="<?= $id_anak; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" value="<?= $nik; ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama_anak">Nama Anak</label>
                            <input type="text" class="form-control" id="nama_anak" name="nama_anak" value="<?= $nama_anak; ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama_ibu">Nama Ibu</label>
                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?= $nama_ibu; ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="<?= $nama_ayah; ?>">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $tanggal_lahir; ?>">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="L" <?php if ($jenis_kelamin == 'L') {
                                                        echo 'selected';
                                                    } ?>>Laki-Laki</option>
                                <option value="P" <?php if ($jenis_kelamin == 'P') {
                                                        echo 'selected';
                                                    } ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="lingkar_kepala" class="form-label">Berat Badan Lahir</label>
                            <input type="number" step="any" class="form-control" id="bbl" name="bbl" value="<?= $bbl; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="lingkar_dada" class="form-label">Panjang Badan Lahir</label>
                            <input type="number" step="any" class="form-control" id="pbl" name="pbl" value="<?= $pbl; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="disabledSelect" class="form-label">Alamat</label>
                            <select id="disabledSelect" class="form-select" name="alamat">
                                <option value="RT 40 RW 08" <?php if ($alamat == "RT 40 RW 08") {
                                                                echo 'selected';
                                                            } ?>>RT 40 RW 08</option>
                                <option value="RT 41 RW 08" <?php if ($alamat == "RT 41 RW 08") {
                                                                echo 'selected';
                                                            } ?>>RT 41 RW 08</option>
                                <option value="RT 42 RW 08" <?php if ($alamat == "RT 42 RW 08") {
                                                                echo 'selected';
                                                            } ?>>RT 42 RW 08</option>
                                <option value="RT 43 RW 08" <?php if ($alamat == "RT 43 RW 08") {
                                                                echo 'selected';
                                                            } ?>>RT 43 RW 08</option>
                                <option value="RT 44 RW 08" <?php if ($alamat == "RT 44 RW 08") {
                                                                echo 'selected';
                                                            } ?>>RT 44 RW 08</option>
                                <option value="RT 45 RW 08" <?php if ($alamat == "RT 45 RW 08") {
                                                                echo 'selected';
                                                            } ?>>RT 45 RW 08</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>