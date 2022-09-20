<?= $this->extend('dashboard/dashboard'); ?>
<?= $this->section('content'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Penimbangan</h4>
            </div>
            <div class="card-body">
                <form action="/datapenimbangan/update" method="post">
                    <div class="mb-3">
                        <label for="id_penimbangan" class="form-label">ID Penimbangan</label>
                        <input type="text" class="form-control" id="id_penimbangan" name="id_penimbangan" value="<?= $id_penimbangan ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="id_anak" class="form-label">ID Anak</label>
                        <input type="text" class="form-control" id="id_anak" name="id_anak" value="<?= $id_anak ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama_anak" class="form-label">Nama Anak</label>
                        <input type="text" class="form-control" id="nama_anak" name="nama_anak" value="<?= $nama_anak ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_penimbangan" class="form-label">Umur</label>
                        <input type="number" step="any" class="form-control" id="umur" name="umur" value="<?= $umur ?>" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="berat_badan" class="form-label">Berat Badan</label>
                        <input type="number" step="any" class="form-control" id="berat_badan" name="berat_badan" min="0" value="<?= $berat_badan ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tinggi_badan" class="form-label">Tinggi Badan</label>
                        <input type="number" step="any" class="form-control" id="tinggi_badan" name="tinggi_badan" min="0" value="<?= $tinggi_badan ?>" required>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="keterangan">Keterangan</label>
                                <select class="form-select" name="keterangan" id="keterangan" required>
                                    <option selected="true" disabled value="">Masukan Keterangan</option>
                                    <option value="Naik" <?php if ($keterangan == 'Naik') {
                                                                echo 'selected';
                                                            } ?>>Naik</option>
                                    <option value="Turun" <?php if ($keterangan == 'Turun') {
                                                                echo 'selected';
                                                            } ?>>Turun</option>
                                    <option value="" <?php if ($keterangan == '') {
                                                            echo 'selected';
                                                        } ?>>Tetap</option>
                                    <option value="Tidak Timbang" <?php if ($keterangan == 'Tidak Timbang') {
                                                                        echo 'selected';
                                                                    } ?>>Tidak Timbang</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label" for="posisi">Posisi</label>
                                <select class="form-select" name="posisi" id="posisi" required>
                                    <option selected="true" disabled value="">Masukan Posisi</option>
                                    <option value="" <?php if ($posisi == '') {
                                                            echo 'selected';
                                                        } ?>>0</option>
                                    <option value="BGT" <?php if ($posisi == 'BGT') {
                                                            echo 'selected';
                                                        } ?>>BGT</option>
                                    <option value="BGM" <?php if ($posisi == 'BGM') {
                                                            echo 'selected';
                                                        } ?>>BGM</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_penimbangan" class="form-label">Tanggal Penimbangan</label>
                        <input type="date" class="form-control" id="tanggal_input" name="tanggal_input" value="<?= $tanggal_input ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="lingkar_lengan" class="form-label">Petugas</label>
                        <input type="text" class="form-control" id="petugas" name="petugas" value="<?= session()->get('username'); ?>" readonly>
                    </div>
                    <button class="btn btn-primary" type="submit">Edit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
<?= $this->endSection(); ?>