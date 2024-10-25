<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Karyawan</h1>
        <?php if (session()->getFlashdata('error')): ?>
            <div style="color: red;">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <a href="<?= base_url('tambahkaryawan') ?>" class="btn btn-primary btn-sm" data-toggle="" data-target="">Tambah Lemburan</a>

    </div>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Absensi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>TANGGAL</th>
                            <th>NAMA</th>
                            <th>KEHADIRAN</th>
                            <th>LEMBUR</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tabel as $row): ?>
                            <tr>
                                <td><?= $row['tanggal'] ?></td>
                                <td><?= $row['nama_karyawan']; ?></td>
                                <td><?= $row['keterangan']; ?></td>
                                <td><?php if (is_null($row['id_lembur'])): ?>
                                        <!-- Jika id_lembur null, tampilkan icon silang merah -->
                                        <i class="fas fa-times text-danger"></i> <!-- Ikon silang merah -->
                                    <?php else: ?>
                                        <!-- Jika id_lembur tidak null, tampilkan icon ceklis hijau -->
                                        <i class="fas fa-check text-success"></i> <!-- Ikon ceklis hijau -->
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('addlembur') ?>/<?= $row['id_absensi'] ?>" class="btn btn-success btn-sm" data-toggle="" data-target="">Tambahkan Lemburan</a>
                                    <a href="<?= base_url('hapuslembur') ?>/<?= $row['id_lembur'] ?>" class="btn btn-danger btn-sm" data-toggle="" data-target="">Hapus Lemburan</a>

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