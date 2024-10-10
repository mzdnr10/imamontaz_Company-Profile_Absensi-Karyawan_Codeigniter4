<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\ProductModel;
use App\Models\ClientModel;
use App\Models\DashModel;
use Intervention\Image\ImageManagerStatic as Image;


class DashController extends BaseController
{


    public function index()
    {

        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth');
        }

        $model = new DashModel();

        // Mendapatkan jumlah field dari setiap tabel
        $data = $model->getTableFieldsCount();


        $data['title'] = 'PT. Ima Montaz Teknindo';
        echo view('admin/temp/lheader', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/pages/dashboard', $data);
        
        // echo '<pre>';
        //     print_r($data);
    }

    public function kategori()
    {

        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }

        $data['title'] = 'PT. Ima Montaz Teknindo';
        $kategoriModel = new KategoriModel();

        // Mengambil semua data kategori
        $data['kategori'] = $kategoriModel->getKategori();

        echo view('admin/temp/lheader', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/pages/kategori', $data);
    }

    public function addkategori()
    {

        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }



        $idkategori = new KategoriModel();
        $data['id_kategori'] = $idkategori->getid();

        $data['title'] = 'PT. Ima Montaz Teknindo';
        echo view('admin/temp/lheader', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/pages/form_kategori', $data);

        // echo '<pre>';
        //     print_r($data);

    }




    public function kategoriadd()
    {

        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }
        // Ambil input dari form
        $data['id_kategori'] = $this->request->getPost('id_kategori');
        $data['nama_kategori'] = $this->request->getPost('nama_kategori');
        $image = $this->request->getFile('img_kategori');

        // Inisialisasi model
        $kategoriModel = new KategoriModel();

        // Pastikan file image ada
        if ($image === null) {
            return redirect()->back()->with('error', 'File tidak ditemukan. Pastikan Anda mengunggah gambar.');
        }

        if ($image->isValid() && !$image->hasMoved()) {
            // Tentukan nama file baru berdasarkan ID kategori
            $newName = 'img' . $data['id_kategori'] . '.jpg';

            // Pastikan folder tujuan ada atau buat jika belum ada
            $uploadPath = WRITEPATH . '../public/assets/img/img_kategori';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Pindahkan file ke folder tujuan dengan nama baru
            if ($image->move($uploadPath, $newName)) {
                // Simpan nama file di array data untuk disimpan ke database
                $data['img_kategori'] = $newName;


                // echo '<pre>';
                //     print_r($data);

                // Simpan data kategori ke database
                if ($kategoriModel->insert($data)) {
                    return redirect()->to('kategori')->with('success', 'Kategori Berhasil Ditambahkan!');
                } else {
                    return redirect()->back()->with('error', 'Gagal menyimpan data kategori.');
                }
            } else {
                return redirect()->back()->with('error', 'Gagal memindahkan file gambar.');
            }
        } else {
            return redirect()->back()->with('error', 'File tidak valid atau sudah dipindahkan.');
        }
    }

    public function hapusKategori($id_kategori)
    {

        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }



        $kategoriModel = new KategoriModel();
        $kategori = $kategoriModel->find($id_kategori);

        // Pastikan id kategori valid
        if (!$id_kategori) {
            return redirect()->back()->with('error', 'ID Kategori tidak valid.');
        }

        // Menghapus kategori dari database
        if ($kategori) {

            $imagePath = WRITEPATH . '../public/assets/img/img_kategori/' . $kategori['img_kategori']; // Atur direktori sesuai kebutuhan

            // Hapus file gambar jika ada
            if (file_exists($imagePath)) {
                unlink($imagePath); // Hapus file gambar

                if ($kategoriModel->delete($id_kategori)) {
                    return redirect()->to('kategori')->with('success', 'Kategori berhasil dihapus.');
                } else {
                    return redirect()->back()->with('error', 'Gagal menghapus kategori. Pastikan kategori ada dan tidak terikat dengan produk lain.');
                }
            } else {
                return redirect()->back()->with('error', 'Gagal menghapus kategori. Pastikan kategori ada dan tidak terikat dengan produk lain.');
            }
        }
    }




    public function productadd()
    {

        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }

        $productmodel = new ProductModel();
        $kategoriModel = new KategoriModel();

        $data['product'] = $productmodel
            ->select('product.id_product, product.nama_product, img_product, kategori_product.nama_kategori, kategori_product.id_kategori')
            ->join('kategori_product', 'kategori_product.id_kategori = product.id_kategori',)
            ->orderBy('kategori_product.id_kategori', 'ASC')
            ->findAll();

        foreach ($data['product'] as $index => $product) {
            $data['product'][$index]['number'] = $index + 1;
        }
        // // Mengambil semua data kategori
        // $data['product'] = $productmodel->getproduct();

        $data['title'] = 'PT. Ima Montaz Teknindo';
        echo view('admin/temp/lheader', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/pages/product');


        // echo '<pre>';
        //     print_r($data);

    }

    public function tambahproduct()
    {

        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }



        $idproduct = new ProductModel();
        $kategoriModel = new KategoriModel();
        $data['id_product'] = $idproduct->getid();
        $data['nama_kategori'] = $kategoriModel->getnamekategori();

        $data['title'] = 'PT. Ima Montaz Teknindo';
        echo view('admin/temp/lheader', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/pages/form_product', $data);

        // echo '<pre>';
        //     print_r($data);

    }



    public function dotambahproduct()
    {
        // Ambil input dari form

        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }

        $data['id_product'] = $this->request->getPost('id_product');
        $data['nama_product'] = $this->request->getPost('nama_product');
        $image = $this->request->getFile('img_product');
        $data['id_kategori'] = $this->request->getPost('id_kategori');

        // Inisialisasi model
        $productmodel = new ProductModel();

        // Pastikan file image ada
        if ($image === null) {
            return redirect()->back()->with('error', 'File tidak ditemukan. Pastikan Anda mengunggah gambar.');
        }

        if ($image->isValid() && !$image->hasMoved()) {
            // Tentukan nama file baru berdasarkan ID kategori
            $newName = 'img' . $data['id_product'] . '.jpg';

            // Pastikan folder tujuan ada atau buat jika belum ada
            $uploadPath = WRITEPATH . '../public/assets/img/product';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Pindahkan file ke folder tujuan dengan nama baru
            if ($image->move($uploadPath, $newName)) {
                // Simpan nama file di array data untuk disimpan ke database
                $data['img_product'] = $newName;

                // echo '<pre>';
                //     print_r($data);

                // Simpan data kategori ke database
                if ($productmodel->insert($data)) {
                    return redirect()->to('productadd')->with('success', 'Kategori Berhasil Ditambahkan!');
                } else {
                    return redirect()->back()->with('error', 'Gagal menyimpan data kategori.');
                }
            } else {
                return redirect()->back()->with('error', 'Gagal memindahkan file gambar.');
            }
        } else {
            return redirect()->back()->with('error', 'File tidak valid atau sudah dipindahkan.');
        }
    }

    public function hapusproduct($id_product)
    {

        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }

        $productmodel = new ProductModel();
        $product = $productmodel->find($id_product);

        // Pastikan id kate
        if ($product) {

            $imagePath = WRITEPATH . '../public/assets/img/product/' . $product['img_product']; // Atur direktori sesuai kebutuhan

            // Hapus file gambar jika ada
            if (file_exists($imagePath)) {
                unlink($imagePath); // Hapus file gambar

                if ($productmodel->delete($id_product)) {
                    return redirect()->to('productadd')->with('success', 'Kategori berhasil dihapus.');
                } else {
                    return redirect()->back()->with('error', 'Gagal menghapus kategori. Pastikan kategori ada dan tidak terikat dengan produk lain.');
                }
            } else {
                return redirect()->back()->with('error', 'Gagal menghapus kategori. Pastikan kategori ada dan tidak terikat dengan produk lain.');
            }
        }
    }

    public function clientadd()
    {

        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }

        $data['title'] = 'PT. Ima Montaz Teknindo';
        $clientmodel = new ClientModel();

        // Mengambil semua data kategori
        $data['client'] = $clientmodel->getclient();

        echo view('admin/temp/lheader', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/pages/client', $data);
    }

    public function addclient()
    {

        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }



        $idclient = new ClientModel();
        $data['id_client'] = $idclient->getid();

        $data['title'] = 'PT. Ima Montaz Teknindo';
        echo view('admin/temp/lheader', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/pages/form_client', $data);

        // echo '<pre>';
        //     print_r($data);

    }

    public function doaddclient()
    {

        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }
        // Ambil input dari form
        $data['id_client'] = $this->request->getPost('id_client');
        $data['nama_client'] = $this->request->getPost('nama_client');
        $image = $this->request->getFile('img_client');

        // Inisialisasi model
        $clientmodel = new ClientModel();

        // Pastikan file image ada
        if ($image === null) {
            return redirect()->back()->with('error', 'File tidak ditemukan. Pastikan Anda mengunggah gambar.');
        }

        if ($image->isValid() && !$image->hasMoved()) {
            // Tentukan nama file baru berdasarkan ID kategori
            $newName = 'img' . $data['id_client'] . '.jpg';

            // Pastikan folder tujuan ada atau buat jika belum ada
            $uploadPath = WRITEPATH . '../public/assets/img/img_client';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Pindahkan file ke folder tujuan dengan nama baru
            if ($image->move($uploadPath, $newName)) {
                // Simpan nama file di array data untuk disimpan ke database
                $data['img_client'] = $newName;


                // echo '<pre>';
                //     print_r($data);

                // Simpan data kategori ke database
                if ($clientmodel->insert($data)) {
                    return redirect()->to('clientadd')->with('success', 'Kategori Berhasil Ditambahkan!');
                } else {
                    return redirect()->back()->with('error', 'Gagal menyimpan data kategori.');
                }
            } else {
                return redirect()->back()->with('error', 'Gagal memindahkan file gambar.');
            }
        } else {
            return redirect()->back()->with('error', 'File tidak valid atau sudah dipindahkan.');
        }
    }

    public function hapusclient($id_client)
    {

        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }



        $clientmodel = new ClientModel();
        $client = $clientmodel->find($id_client);

        // Pastikan id kategori valid
        if (!$id_client) {
            return redirect()->back()->with('error', 'ID Kategori tidak valid.');
        }

        // Menghapus kategori dari database
        if ($client) {

            $imagePath = WRITEPATH . '../public/assets/img/img_client/' . $client['img_client']; // Atur direktori sesuai kebutuhan

            // Hapus file gambar jika ada
            if (file_exists($imagePath)) {
                unlink($imagePath); // Hapus file gambar

                if ($clientmodel->delete($id_client)) {
                    return redirect()->to('client')->with('success', 'Kategori berhasil dihapus.');
                } else {
                    return redirect()->back()->with('error', 'Gagal menghapus kategori. Pastikan kategori ada dan tidak terikat dengan produk lain.');
                }
            } else {
                return redirect()->back()->with('error', 'Gagal menghapus kategori. Pastikan kategori ada dan tidak terikat dengan produk lain.');
            }
        }
    }


}
