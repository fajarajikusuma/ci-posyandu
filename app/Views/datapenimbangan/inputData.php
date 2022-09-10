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
                <h4>Input Data Penimbangan</h4>
            </div>
            <div class="card-body">
                <form action="/datapenimbangan/save" method="post">
                    <div class="mb-3">
                        <label for="id_penimbangan" class="form-label">ID Penimbangan</label>
                        <input type="text" class="form-control" id="id_penimbangan" name="id_penimbangan" value="<?= $id_penimbangan ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="id_anak" class="form-label">ID Anak</label>
                        <input type="text" class="form-control" id="id_anak" name="id_anak" value="<?= $id_anak ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_penimbangan" class="form-label">Umur</label>
                        <input type="number" step="any" class="form-control" id="umur" name="umur" value="<?= $umur ?>">
                    </div>
                    <div class="mb-3">
                        <label for="berat_badan" class="form-label">Berat Badan</label>
                        <input type="number" step="any" class="form-control" id="berat_badan" name="berat_badan">
                    </div>
                    <div class="mb-3">
                        <label for="tinggi_badan" class="form-label">Tinggi Badan</label>
                        <input type="number" step="any" class="form-control" id="tinggi_badan" name="tinggi_badan">
                    </div>

                    <div class="mb-3">
                        <label for="lingkar_dada" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_penimbangan" class="form-label">Tanggal Penimbangan</label>
                        <input type="date" class="form-control" id="tanggal_input" name="tanggal_input" value="<?= date('Y-m-d'); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="lingkar_lengan" class="form-label">Petugas</label>
                        <input type="text" class="form-control" id="petugas" name="petugas" value="<?= session()->get('username'); ?>" readonly>
                    </div>
                    <button class="btn btn-primary" type="submit">Input</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
<?= $this->endSection(); ?>