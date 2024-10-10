<?php

namespace App\Models;

use CodeIgniter\Model;

class DashModel extends Model
{
    protected $db;

    public function __construct()
    {
        // Menginisialisasi koneksi database
        $this->db = \Config\Database::connect();
    }

    public function getTableFieldsCount()
    {
        $data['product'] = $this->db->table('product')->countAllResults();
        $data['kategori_product'] = $this->db->table('kategori_product')->countAllResults();
        $data['client']= $this->db->table('client')->countAllResults();

        return $data;
    }
}
