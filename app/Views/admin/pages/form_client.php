<div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <form action="/login/authenticate" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="id_user" name="id_user" placeholder="" readonly>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Upload Image</label>
                                            <input type="file" class="form-control form-control-user" id="image_kategori" name="image_kategori" accept="image/*" required>
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
                    <div class="small">Copyright &copy; Your Website 2024</div>
                </div>
            </div>
        </div>