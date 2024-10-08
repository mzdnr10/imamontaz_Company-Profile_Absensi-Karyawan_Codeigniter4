<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $table = 'client'; // Nama tabel dalam database
    protected $primaryKey = 'id_client'; // Primary key
    protected $allowedFields = ['id_client', 'nama_client', 'img_client']; // Kolom yang diizinkan untuk diakses

    // Fungsi untuk mengambil semua kategori
    public function getclient()
    {
        return $this->findAll(); // Mengambil semua data kategori
    }

    public function getid(){

        $builder = $this->db->table($this->table);
        $builder->selectMax('id_client');
        $query = $builder->get();
        $result = $query->getRow();
        $nextId = ($result->id_client) ? $result->id_client + 1 : 1;
        return $nextId;

    }
}
