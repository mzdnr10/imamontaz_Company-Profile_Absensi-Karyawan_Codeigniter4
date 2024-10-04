<?php

namespace App\Models;

use CodeIgniter\Model;


class UserModel extends Model
{
    protected $table = 'user'; // Nama tabel di database
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['email', 'password']; // Kolom yang bisa diakses

    public function validateUser($email, $password)
    {
        // Cari user berdasarkan username dan password tanpa hash
        return $this->where('email', $email)
                    ->where('password', $password) // Bandingkan password secara langsung
                    ->first(); // Ambil user pertama yang ditemukan
    }

    
}