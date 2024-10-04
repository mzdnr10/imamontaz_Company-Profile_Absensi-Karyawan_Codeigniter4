<?php

namespace App\Controllers;
use App\Models\KategoriModel;
use App\Models\ProductModel;
use App\Models\ClientModel;

class DashController extends BaseController
{


    public function index()
    {

        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth');
        }
        $data['title'] = 'PT. Ima Montaz Teknindo';
        echo view('admin/temp/lheader', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/pages/dashboard');
    }

    public function kategori(){

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

    public function addkategori(){

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

    
    

    public function kategoriadd() {
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
    
    

    public function productadd(){

        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }

        $productmodel = new ProductModel();
        $kategoriModel = new KategoriModel();

        $data['product'] = $productmodel 
        ->select('product.id_product, product.nama_product, img_product, kategori_product.nama_kategori, kategori_product.id_kategori')
        ->join('kategori_product', 'kategori_product.id_kategori = product.id_kategori',)
        ->orderBy('kategori_product.id_kategori','ASC')
        ->findAll();
        
        foreach ($data['product'] as $index => $product) {
            $data['product'][$index]['number'] = $index + 1;}
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

    public function clientadd(){

        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('auth')->with('error', 'Akses Anda Ditolak !');
        }

        $data['title'] = 'PT. Ima Montaz Teknindo';
        echo view('admin/temp/lheader', $data);
        echo view('admin/temp/sidebar');
        echo view('admin/temp/topbar');
        echo view('admin/pages/client');
        
    }
}
