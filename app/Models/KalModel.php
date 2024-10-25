<?php

namespace App\Models;

use CodeIgniter\Model;

class KalModel extends Model
{
    protected $db;
    public function __construct()
    {
        // Menginisialisasi koneksi database
        $this->db = \Config\Database::connect();
    }
    
    public function getTableFieldsCount()
    {

        $data['karyawan'] = $this->db->table('karyawan')->countAllResults();
        $data['Lemburan'] = $this->db->table('Lemburan')->countAllResults();

        return $data;
    }
}