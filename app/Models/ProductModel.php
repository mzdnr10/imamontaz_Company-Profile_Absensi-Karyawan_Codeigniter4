<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product'; // Nama tabel dalam database
    protected $primaryKey = 'id_product'; // Primary key
    protected $allowedFields = ['id_product','nama_product', 'img_product', 'id_kategori']; // Kolom yang diizinkan untuk diakses

    // Fungsi untuk mengambil semua kategori
    public function getproduct()
    {
        return $this->findAll(); // Mengambil semua data kategori
    }

    public function getid(){

        $builder = $this->db->table($this->table);
        $builder->selectMax('id_product');
        $query = $builder->get();
        $result = $query->getRow();
        $nextId = ($result->id_product) ? $result->id_product + 1 : 1;
        return $nextId;

    }

    


}
