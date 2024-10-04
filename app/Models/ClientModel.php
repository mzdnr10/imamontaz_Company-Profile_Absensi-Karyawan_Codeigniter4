<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'client'; // Nama tabel dalam database
    protected $primaryKey = 'id_client'; // Primary key
    protected $allowedFields = ['id_client', 'nama_client', 'img_client']; // Kolom yang diizinkan untuk diakses

    // Fungsi untuk mengambil semua kategori
    public function getclient()
    {
        return $this->findAll(); // Mengambil semua data kategori
    }
}
