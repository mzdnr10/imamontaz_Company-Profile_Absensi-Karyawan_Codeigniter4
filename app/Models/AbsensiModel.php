<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model
{
    protected $table = 'absensi'; // Nama tabel dalam database
    protected $primaryKey = 'id_absensi'; // Primary key
    protected $allowedFields = ['id_absensi', 'id_karyawan', 'tanggal','keterangan']; // Kolom yang diizinkan untuk diakses

    // Fungsi untuk mengambil semua kategori
    public function getabsensi()
    {
        return $this->findAll(); // Mengambil semua data kategori
    }

    public function getid(){

        $builder = $this->db->table($this->table);
        $builder->selectMax('id_absensi');
        $query = $builder->get();
        $result = $query->getRow();
        $nextId = ($result->id_absensi) ? $result->id_absensi + 1 : 1;
        return $nextId;

    }

    public function getbyid($id_absensi){

        return $this->select('id_karyawan')->where('id_absensi', $id_absensi)->first();

    }

    
}
