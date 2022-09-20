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
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>
        <!--  -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    <b>Table Data Pasca Timbang</b>
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header bg-dark text-white">
                                <h4>Table Data Pasca Timbang</h4>
                            </div>
                            <div class="card-body overflow-auto">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">NIK</th>
                                            <th scope="col">Nama Anak</th>
                                            <th scope="col">Nama Ibu</th>
                                            <th scope="col">Nama Ayah</th>
                                            <th scope="col">Tanggal Lahir</th>
                                            <th scope="col">L / P</th>
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
                                        <?php foreach ($showDataPascaTimbang as $value) : ?>
                                            <tr>
                                                <th scope="row"><?= $no++; ?></th>
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
                                                    <center>
                                                        <a href="/datapenimbangan/edit/<?= $value->id_penimbangan; ?>" class="btn btn-warning"><i class="fa-solid fa-file-pen"></i></a>
                                                        <a href="/datapenimbangan/delete/<?= $value->id_penimbangan; ?>" class="btn btn-danger" onclick="return confirm('Yakin data <?= $value->nama_anak; ?> akan di hapus?')"><i class="fa-solid fa-trash-can"></i></a>
                                                    </center>
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