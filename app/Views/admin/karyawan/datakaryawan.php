<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Lemburan Karyawan</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
         
    <?php foreach ($totallemburankaryawan as $row): ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Lemburan
                            <?= $row['nama_karyawan']?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row['total_lembur']?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <?php endforeach; ?>
         
        

    </div>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Karyawan</h1>
            <?php if (session()->getFlashdata('error')): ?>
        <div style="color: red;">
        <?= session()->getFlashdata('error') ?>
        </div>
        <?php endif; ?>
            <a href="<?= base_url('tambahkaryawan') ?>" class="btn btn-primary btn-sm" data-toggle="" data-target="">Tambah Karyawan</a>
            
        </div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Karyawan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>NO HANDPHONE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($karyawan as $row): ?>
                                <tr>
                                    <td><?= $row['number']?></td>
                                    <td><?= $row['nama_karyawan']; ?></td>
                                    <td><?= $row['no_hp']; ?></td>
                                    <td>
                                        <a href="<?= base_url('hadir') ?>/<?= $row['id_karyawan'] ?>" class="btn btn-success btn-sm" data-toggle="" data-target="">Hadir</a>
                                        <a href="<?= base_url('izin') ?>/<?= $row['id_karyawan'] ?>" class="btn btn-warning btn-sm" data-toggle="" data-target="">Izin/Sakit</a>
                                        <a href="<?= base_url('tidakhadir') ?>/<?= $row['id_karyawan'] ?>" class="btn btn-danger btn-sm" data-toggle="" data-target="">Tidak Hadir</a>
                                    
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