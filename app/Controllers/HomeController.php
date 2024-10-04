<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class HomeController extends BaseController
{
    public function index()
    {
        
        
        $data['title'] = 'PT. Ima Montaz Teknindo';
        $kategoriModel = new KategoriModel();
        
        // Mengambil semua data kategori
        $data['kategori'] = $kategoriModel->getKategori();


        echo view('temp/header', $data);
        echo view('pages/home', $data);
        echo view('temp/footer');
    }

    public function product()
    {
        $data['title'] = 'PT. Ima Montaz Teknindo';
        echo view('temp/header', $data);
        echo view('pages/product'); 
        echo view('temp/footer');
    }
}
