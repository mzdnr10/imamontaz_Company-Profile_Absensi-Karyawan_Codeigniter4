<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-8">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <?php if (session()->getFlashdata('error')): ?>
                                    <div style="color: red;">
                                        <?= session()->getFlashdata('error') ?>
                                    </div>
                                <?php endif; ?>
                                <form action="<?= base_url('dotambahproduct') ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="id_product" name="id_product" value="<?= $id_product ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nama_product" name="nama_product" placeholder="Nama Product" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_kategori">Pilih Kategori</label>
                                        <select class="form-control form-control-user" id="id_kategori" name="id_kategori" required>
                                            <option value="">Pilih Kategori</option>
                                            <?php foreach ($nama_kategori as $kat): ?>
                                                <option value="<?= $kat['id_kategori'] ?>"><?= $kat['nama_kategori'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="img_product">Upload Image</label>
                                        <input type="file" class="form-control form-control-user" id="img_product" name="img_product" accept="image/*" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Submit
                                    </button>
                                    <hr>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <div class="small">Copyright &copy; PT. IMA MONTAZ TEKNINDO 2024</div>
            </div>
        </div>
    </div>