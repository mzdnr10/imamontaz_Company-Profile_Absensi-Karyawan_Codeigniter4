<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori_product'; // Nama tabel dalam database
    protected $primaryKey = 'id_kategori'; // Primary key
    protected $allowedFields = ['id_kategori', 'nama_kategori', 'img_kategori']; // Kolom yang diizinkan untuk diakses

    // Fungsi untuk mengambil semua kategori
    public function getKategori()
    {
        return $this->findAll(); // Mengambil semua data kategori
    }


    public function getid(){

        $builder = $this->db->table($this->table);
        $builder->selectMax('id_kategori');
        $query = $builder->get();
        $result = $query->getRow();
        $nextId = ($result->id_kategori) ? $result->id_kategori + 1 : 1;
        return $nextId;

    }
}
