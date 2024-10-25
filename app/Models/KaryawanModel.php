<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table = 'karyawan'; // Nama tabel dalam database
    protected $primaryKey = 'id_karyawan'; // Primary key
    protected $allowedFields = ['id_karyawan', 'nama_karyawan', 'no_hp']; // Kolom yang diizinkan untuk diakses

    // Fungsi untuk mengambil semua kategori
    public function getkaryawan()
    {
        return $this->findAll(); // Mengambil semua data kategori
    }

    public function getid(){

        $builder = $this->db->table($this->table);
        $builder->selectMax('id_karyawan');
        $query = $builder->get();
        $result = $query->getRow();
        $nextId = ($result->id_karyawan) ? $result->id_karyawan + 1 : 1;
        return $nextId;

    }

    
}
