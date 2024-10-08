<?php

namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\KategoriModel;
use App\Models\ProductModel;

class HomeController extends BaseController
{
    public function index()
    {


        $data['title'] = 'PT. Ima Montaz Teknindo';
        $kategoriModel = new KategoriModel();
        $clientmodel = new ClientModel();


        // Mengambil semua data kategori
        $data['kategori'] = $kategoriModel->getKategori();
        $data['client'] = $clientmodel->getclient();


        echo view('temp/header', $data);
        echo view('pages/home', $data);
        echo view('temp/footer');


        // echo '<pre>';
        //     print_r($data);
    }

    public function product()
    {
        $productmodel = new ProductModel();

        // Ambil semua produk dan kategori terkait
        $products = $productmodel
            ->select('product.id_product, product.nama_product, img_product, kategori_product.nama_kategori, kategori_product.id_kategori')
            ->join('kategori_product', 'kategori_product.id_kategori = product.id_kategori')
            ->orderBy('kategori_product.id_kategori', 'ASC')
            ->findAll();

        // Inisialisasi array untuk menampung produk yang dikelompokkan berdasarkan kategori
        $data['grouped_products'] = [];

        // Kelompokkan produk berdasarkan id_kategori
        foreach ($products as $product) {
            $data['grouped_products'][$product['id_kategori']]['nama_kategori'] = $product['nama_kategori'];
            $data['grouped_products'][$product['id_kategori']]['products'][] = $product;
        }

        $data['title'] = 'PT. Ima Montaz Teknindo';

        // Load views
        echo view('temp/header', $data);
        echo view('pages/product', $data);
        echo view('temp/footer');
    }
}
