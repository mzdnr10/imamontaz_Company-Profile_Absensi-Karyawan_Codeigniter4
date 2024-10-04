<div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">PRODUCT</h1>
                        <a href="<?= base_url('tambahproduct')?>" class="btn btn-primary btn-sm" data-toggle="" data-target="">Tambah Produk</a>
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
                                            <th>NO</th>
                                            <th>NAMA</th>
                                            <th>KATEGORI</th>
                                            <th>IMAGE</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($product as $row): ?>
                                        <tr>
                                            <td><?= $row['number']; ?></td>
                                            <td><?= $row['nama_product']; ?></td>
                                            <td><?= $row['nama_kategori']; ?></td>
                                            <td><img src="<?=base_url('assets/img/product/')?><?= $row['img_product']; ?>" alt="" style="max-width: 100px;"></td>
                                            <td></td>
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