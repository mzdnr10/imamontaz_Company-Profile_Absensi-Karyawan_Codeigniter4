<?php

namespace App\Controllers;

use App\Models\KaryawanModel;
use App\Models\KalModel;
use App\Models\AbsensiModel;
use Carbon\Carbon;
use App\Models\LemburModel;
use PHPUnit\Event\TestSuite\Loaded;
use Predis\Command\Argument\Server\To;
use SebastianBergmann\CodeUnitReverseLookup\Wizard;

class KaryawanController extends BaseController
{
    public function index()
    {

        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth');
        }

        $model = new KaryawanModel();
        $modellemburan = new LemburModel();


        $data['karyawan'] = $model->getkaryawan();

        foreach ($data['karyawan'] as $index => $karyawwan) {
            $data['karyawan'][$index]['number'] = $index + 1;
        }

        $data['totallemburankaryawan'] = $modellemburan
            ->select('lemburan.id_karyawan, karyawan.nama_karyawan, SUM(lemburan.jumlah_lemburan) as total_lembur')
            ->join('karyawan', 'karyawan.id_karyawan = lemburan.id_karyawan')
            ->groupBy('lemburan.id_karyawan')
            ->orderBy('lemburan.id_karyawan', 'ASC')
            ->findAll();




        // Mendapatkan jumlah field dari setiap tabel


        $data['title'] = 'PT. Ima Montaz Teknindo';
        echo view('admin/temp/lheader', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/karyawan/datakaryawan', $data);

        // echo '<pre>';
        // print_r($data);
    }

    public function tambahkaryawan()
    {

        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }



        $modelkaryawan = new KaryawanModel();
        $data['id_karyawan'] = $modelkaryawan->getid();

        $data['title'] = 'PT. Ima Montaz Teknindo';
        echo view('admin/temp/lheader', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/karyawan/form_karyawan', $data);

        // echo '<pre>';
        //     print_r($data);

    }


    public function dotambahkaryawan()
    {
        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak!');
        }

        $modelkaryawan = new KaryawanModel();

        // Mengambil data dari form
        $id_karyawan = $this->request->getPost('id_karyawan');
        $nama_karyawan = $this->request->getPost('nama_karyawan');
        $no_hp = $this->request->getPost('no_hp');

        // Cek apakah id_karyawan sudah ada di database
        $existingKaryawan = $modelkaryawan->where('id_karyawan', $id_karyawan)->first();

        if ($existingKaryawan) {
            // Jika id_karyawan sudah ada, kirim pesan error
            return redirect()->to('karyawan')->with('error', 'ID Karyawan sudah terdaftar!');
        }

        // Data untuk insert
        $data = [
            'id_karyawan' => $id_karyawan,
            'nama_karyawan' => $nama_karyawan,
            'no_hp' => $no_hp
        ];

        // Insert data ke database
        $modelkaryawan->insert($data);
        return redirect()->to('karyawan')->with('success', 'Data Berhasil Ditambahkan!');
    }


    public function hadir($id_karyawan)
    {
        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }

        $model = new KaryawanModel();
        $modelabsen = new AbsensiModel();

        // Ambil tanggal hari ini
        $tanggal = date('Y-m-d'); // Format YYYY-MM-DD

        // Cek apakah karyawan sudah hadir hari ini
        $existingAbsence = $modelabsen->where('id_karyawan', $id_karyawan)
            ->where('tanggal', $tanggal)
            ->first();

        // Jika karyawan sudah hadir, kembalikan pesan
        if ($existingAbsence) {
            return redirect()->to('karyawan')->with('error', 'Karyawan sudah hadir hari ini!');
        }

        // Mendapatkan ID absensi
        $id_absensi = $modelabsen->getid();
        $keterangan = 'Hadir';

        $data = [
            'id_absensi' => $id_absensi,
            'id_karyawan' => $id_karyawan,
            'tanggal' => $tanggal,
            'keterangan' => $keterangan
        ];

        // Insert data absensi ke database
        $modelabsen->insert($data);
        return redirect()->to('absensi')->with('success', 'Berhasil Ditambahkan!');
    }

    public function izin($id_karyawan)
    {
        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }

        $model = new KaryawanModel();
        $modelabsen = new AbsensiModel();

        // Ambil tanggal hari ini
        $tanggal = date('Y-m-d'); // Format YYYY-MM-DD

        // Cek apakah karyawan sudah hadir hari ini
        $existingAbsence = $modelabsen->where('id_karyawan', $id_karyawan)
            ->where('tanggal', $tanggal)
            ->first();

        // Jika karyawan sudah hadir, kembalikan pesan
        if ($existingAbsence) {
            return redirect()->to('karyawan')->with('error', 'Karyawan sudah Absensi hari ini!');
        }

        // Mendapatkan ID absensi
        $id_absensi = $modelabsen->getid();
        $keterangan = 'Izin';

        $data = [
            'id_absensi' => $id_absensi,
            'id_karyawan' => $id_karyawan,
            'tanggal' => $tanggal,
            'keterangan' => $keterangan
        ];

        // Insert data absensi ke database
        $modelabsen->insert($data);
        return redirect()->to('absensi')->with('success', 'Berhasil Ditambahkan!');
    }


    public function tidakhadir($id_karyawan)
    {
        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }

        $model = new KaryawanModel();
        $modelabsen = new AbsensiModel();

        // Ambil tanggal hari ini
        $tanggal = date('Y-m-d'); // Format YYYY-MM-DD

        // Cek apakah karyawan sudah hadir hari ini
        $existingAbsence = $modelabsen->where('id_karyawan', $id_karyawan)
            ->where('tanggal', $tanggal)
            ->first();

        // Jika karyawan sudah hadir, kembalikan pesan
        if ($existingAbsence) {
            return redirect()->to('karyawan')->with('error', 'Karyawan sudah Absensi hari ini!');
        }

        // Mendapatkan ID absensi
        $id_absensi = $modelabsen->getid();
        $keterangan = 'Tidak Hadir';

        $data = [
            'id_absensi' => $id_absensi,
            'id_karyawan' => $id_karyawan,
            'tanggal' => $tanggal,
            'keterangan' => $keterangan
        ];

        // Insert data absensi ke database
        $modelabsen->insert($data);
        return redirect()->to('absensi')->with('success', 'Berhasil Ditambahkan!');
    }

    public function absensi()
    {

        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }

        $tabelkaryawan = new KaryawanModel();
        $tabelabsensi = new AbsensiModel();
        $tabellemburan = new LemburModel();

        $data['tabel'] = $tabelabsensi
            ->select('absensi.id_absensi, absensi.id_karyawan, absensi.tanggal, karyawan.nama_karyawan, absensi.keterangan, lemburan.id_lembur')
            ->join('karyawan', 'karyawan.id_karyawan = absensi.id_karyawan')  // Join tabel karyawan dengan absensi
            ->join('lemburan', 'lemburan.id_karyawan = absensi.id_karyawan AND lemburan.id_absensi = absensi.id_absensi', 'left') // Join lemburan berdasarkan id_karyawan dan id_absensi
            ->orderBy('absensi.tanggal', 'DESC') // Urutkan berdasarkan tanggal absensi
            ->findAll();




        $data['title'] = 'PT. Ima Montaz Teknindo';
        echo view('admin/temp/lheader', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/karyawan/dataabsensi', $data);

        // echo ('<pre>');
        // print_r($data);
    }

    public function addlembur($id_absensi)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('auth')->with('error', 'Akses anda ditolak');
        }

        $modellembur = new LemburModel();
        $modelabsen = new AbsensiModel();

        if (!$id_absensi) {
            return redirect()->to('absensi')->with('error', 'Absensi tidak ditemukan');
        }

        // Cek apakah id_absensi sudah ada di tabel lemburan
        $existingLembur = $modellembur->where('id_absensi', $id_absensi)->first();

        if ($existingLembur) {
            // Jika id_absensi sudah ada di tabel lemburan, tampilkan pesan error
            return redirect()->to('absensi')->with('error', 'Lemburan untuk absensi ini sudah ada!');
        }

        // Jika id_absensi belum ada, lanjutkan proses
        $data['id_karyawan'] = $modelabsen->getbyid($id_absensi)['id_karyawan'];
        $data['id_absensi'] = $id_absensi;
        $data['jumlah_lemburan'] = 1;

        // Insert data lembur baru
        $modellembur->insert($data);

        return redirect()->to('absensi')->with('success', 'Lemburan berhasil ditambahkan!');
    }


    public function hapuslembur($id_lembur)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('auth')->with('error', 'Akses anda ditolak');
        }

        $modellembur = new LemburModel();

        if (!$id_lembur) {
            return redirect()->to('absensi')->with('error', 'Lemburan tidak ditemukan');
        }

        // echo('<pre>');
        // print_r($data);

        $modellembur->delete($id_lembur);
        return redirect()->to('absensi')->with('success', 'Lemburan berhasil di tambahkan!');
    }
}
