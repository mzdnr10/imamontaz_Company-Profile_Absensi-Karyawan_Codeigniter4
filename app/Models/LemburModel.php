<?php

namespace App\Models;

use CodeIgniter\Model;

class LemburModel extends Model
{
    protected $table = 'Lemburan'; // Nama tabel dalam database
    protected $primaryKey = 'id_lembur'; // Primary key
    protected $allowedFields = ['id_lembur', 'id_absensi', 'id_karyawan']; // Kolom yang diizinkan untuk diakses

    // Fungsi untuk mengambil semua kategori
    public function getlembur()
    {
        return $this->findAll(); // Mengambil semua data kategori
    }

    public function getid(){

        $builder = $this->db->table($this->table);
        $builder->selectMax('id_lembur');
        $query = $builder->get();
        $result = $query->getRow();
        $nextId = ($result->id_lembur) ? $result->id_lembur + 1 : 1;
        return $nextId;

    }

    public function cekid($id_absensi){
        return $this->where('id_absensi', $id_absensi)->first();
    }

    
}
