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
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>