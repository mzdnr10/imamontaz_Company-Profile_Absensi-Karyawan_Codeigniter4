<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">KATEGORI</h1>
        <a href="<?= base_url('/addkategori') ?>" class="btn btn-primary btn-sm">Tambah Produk</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>KATEGORI</th>
                            <th>IMAGE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kategori as $row): ?>
                            <tr>
                                <td><?= $row['id_kategori']; ?></td>
                                <td><?= $row['nama_kategori']; ?></td>
                                <td><img src="<?= base_url('assets/img/img_kategori/') ?><?= $row['img_kategori']; ?>" alt="" style="max-width: 100px;"></td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addProductModal">Tambah Produk</a>
                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteProductModal">Hapus Produk</a>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->