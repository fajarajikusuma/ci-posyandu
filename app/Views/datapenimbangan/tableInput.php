<?= $this->extend('dashboard/dashboard'); ?>
<?= $this->section('content'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title><?= $title ?></title>
</head>

<body>
    <div class="container-fluid mb-5">
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        <b>Input Data Penimbangan</b>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <div class="container-fluid">
                            <div class="card">
                                <div class="card-header bg-dark text-white">
                                    <h4>Table Data Anak</h4>
                                </div>
                                <div class="card-body overflow-auto">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">ID Anak</th>
                                                <th scope="col">NIK</th>
                                                <th scope="col">Nama Anak</th>
                                                <th scope="col">Nama Ibu</th>
                                                <th scope="col">Nama Ayah</th>
                                                <th scope="col">Tanggal Lahir</th>
                                                <th scope="col">Jenis Kelamin</th>
                                                <th scope="col">BBL</th>
                                                <th scope="col">PBL</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($lihat as $value) : ?>
                                                <tr>
                                                    <th scope="row"><?= $no++; ?></th>
                                                    <td><?= $value['id_anak']; ?></td>
                                                    <td><?= $value['nik']; ?></td>
                                                    <td><?= $value['nama_anak']; ?></td>
                                                    <td><?= $value['nama_ibu']; ?></td>
                                                    <td><?= $value['nama_ayah']; ?></td>
                                                    <td><?= $value['tanggal_lahir']; ?></td>
                                                    <td><?= $value['jenis_kelamin']; ?></td>
                                                    <td><?= $value['bbl']; ?></td>
                                                    <td><?= $value['pbl']; ?></td>
                                                    <td><?= $value['alamat']; ?></td>
                                                    <td>
                                                        <a href="/datapenimbangan/inputData/<?= $value['id_anak']; ?>" class="btn btn-success">Input Data Penimbangan</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        <b>Table Data Penimbangan</b>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <div class="container-fluid">
                            <div class="card">
                                <div class="card-header bg-dark text-white">
                                    <h4>Table Data Penimbangan</h4>
                                </div>
                                <div class="card-body overflow-auto">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Id Timbang</th>
                                                <th scope="col">NIK</th>
                                                <th scope="col">Nama Anak</th>
                                                <th scope="col">Nama Ibu</th>
                                                <th scope="col">Nama Ayah</th>
                                                <th scope="col">Tanggal Lahir</th>
                                                <th scope="col">Jns Kelamin</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">Umur</th>
                                                <th scope="col">BBL</th>
                                                <th scope="col">PBL</th>
                                                <th scope="col">BB</th>
                                                <th scope="col">TB</th>
                                                <th scope="col">Ket</th>
                                                <th scope="col">Tanggal Timbang</th>
                                                <th scope="col">Petugas</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($showDataTimbang as $value) : ?>
                                                <tr>
                                                    <th scope="row"><?= $no++; ?></th>
                                                    <td><?= $value->id_penimbangan; ?></td>
                                                    <td><?= $value->nik; ?></td>
                                                    <td><?= $value->nama_anak; ?></td>
                                                    <td><?= $value->nama_ibu; ?></td>
                                                    <td><?= $value->nama_ayah; ?></td>
                                                    <td><?= $value->tanggal_lahir; ?></td>
                                                    <td><?= $value->jenis_kelamin; ?></td>
                                                    <td><?= $value->alamat; ?></td>
                                                    <td><?= $value->umur; ?></td>
                                                    <td><?= $value->bbl; ?></td>
                                                    <td><?= $value->pbl; ?></td>
                                                    <td><?= $value->berat_badan; ?></td>
                                                    <td><?= $value->tinggi_badan; ?></td>
                                                    <?php if ($value->posisi === "") {
                                                        echo '<td>' . $value->keterangan . '</td>';
                                                    } else if ($value->keterangan == "") {
                                                        echo '<td>' . $value->posisi . '</td>';
                                                    } else {
                                                        echo '<td>' . $value->keterangan . ", " . $value->posisi . '</td>';
                                                    } ?>
                                                    <td><?= $value->tanggal_input; ?></td>
                                                    <td><?= $value->petugas; ?></td>
                                                    <td>
                                                        <a href="/datapenimbangan/edit/<?= $value->id_penimbangan; ?>" class="btn btn-warning">Edit</a>
                                                        <a href="/datapenimbangan/delete/<?= $value->id_penimbangan; ?>" class="btn btn-danger" onclick="return confirm('Yakin data <?= $value->id_penimbangan; ?> akan di hapus?')">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
<?= $this->endSection(); ?>