<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product'; // Nama tabel dalam database
    protected $primaryKey = 'id_product'; // Primary key
    protected $allowedFields = ['nama_product', 'img_product', 'id_kategori']; // Kolom yang diizinkan untuk diakses

    // Fungsi untuk mengambil semua kategori
    public function getproduct()
    {
        return $this->findAll(); // Mengambil semua data kategori
    }


}
