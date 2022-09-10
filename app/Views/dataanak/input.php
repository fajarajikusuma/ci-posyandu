<?= $this->extend('dashboard/dashboard'); ?>
<?= $this->section('content'); ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container-fluid mb-5">
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        <b>Input Data Anak</b>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <div class="container">
                            <div class="card">
                                <div class="card-header bg-dark text-white">
                                    <h4>Form Input Data Anak</h4>
                                </div>
                                <div class="card-body">
                                    <form action="/dataanak/save" method="POST">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">ID Anak</label>
                                            <input type="text" class="form-control" id="exampleInputID" value="<?= $id_anak ?>" id="id_anak" name="id_anak" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Nama Anak</label>
                                            <input type="text" class="form-control" id="exampleInputNama" placeholder="Input Nama Anak" name="nama_anak">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Nama Ibu</label>
                                            <input type="text" class="form-control" id="exampleInputNama" placeholder="Input Nama Ibu" name="nama_ibu">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Nama Ayah</label>
                                            <input type="text" class="form-control" id="exampleInputNama" placeholder="Input Nama Ayah" name="nama_ayah">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="exampleInputNama" name="tanggal_lahir">
                                        </div>
                                        <div class="mb-3">
                                            <label for="disabledSelect" class="form-label">Jenis Kelamin</label>
                                            <select id="disabledSelect" class="form-select" name="jenis_kelamin">
                                                <option selected="true" disabled>Pilih Jenis Kelamin</option>
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="lingkar_kepala" class="form-label">Berat Badan Lahir</label>
                                            <input type="number" step="any" class="form-control" id="bbl" name="bbl">
                                        </div>
                                        <div class="mb-3">
                                            <label for="lingkar_dada" class="form-label">Panjang Badan Lahir</label>
                                            <input type="number" step="any" class="form-control" id="pbl" name="pbl">
                                        </div>
                                        <label for="">Alamat</label>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="alamat"></textarea>
                                            <label for="floatingTextarea">Input Alamat</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Input</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        <b>Table Data Anak</b>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
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
                                                <th scope="col">Nama Anak</th>
                                                <th scope="col">Nama Ibu</th>
                                                <th scope="col">Nama Ayah</th>
                                                <th scope="col">Tanggal Lahir</th>
                                                <th scope="col">Jenis Kelamin</th>
                                                <th scope="col">Berat Badan Lahir</th>
                                                <th scope="col">Panjang Badan Lahir</th>
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
                                                    <td><?= $value['nama_anak']; ?></td>
                                                    <td><?= $value['nama_ibu']; ?></td>
                                                    <td><?= $value['nama_ayah']; ?></td>
                                                    <td><?= $value['tanggal_lahir']; ?></td>
                                                    <td><?= $value['jenis_kelamin']; ?></td>
                                                    <td><?= $value['bbl']; ?></td>
                                                    <td><?= $value['pbl']; ?></td>
                                                    <td><?= $value['alamat']; ?></td>
                                                    <td>
                                                        <a href="/dataanak/edit/<?= $value['id_anak']; ?>" class="btn btn-warning">Edit</a>
                                                        <a href="/dataanak/delete/<?= $value['id_anak']; ?>" class="btn btn-danger" onclick="return confirm('Yakin data <?= $value['id_anak']; ?> akan di hapus?')">Delete</a>
                                                    </td>
                                                    <!-- Delete Modal-->
                                                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">Yakin Data <?= $value['id_anak']; ?> akan di Hapus?</div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                                    <a class="btn btn-danger" href="/dataanak/delete/<?= $value['id_anak']; ?>">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
        </div>



        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
<?= $this->endSection(); ?>