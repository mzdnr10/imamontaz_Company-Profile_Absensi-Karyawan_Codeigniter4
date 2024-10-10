<?php

namespace App\Controllers;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function index(){

        if (session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('dashboard')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }
        $data['title'] = ('Administrator');
        echo view('admin/temp/lheader', $data);
        echo view('admin/pages/login');
    }

    public function doLogin(){

        // Memuat input dari form login
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Menggunakan model untuk mencari user berdasarkan email
        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();
        
        // echo '<pre>';
        //     print_r($user['password']);
        //     print_r($password);

        // Jika user ditemukan dan password benar
        $user = $userModel->validateUser($email, $password);

        if ($user) {
            // Set session
            session()->set([
                'email' => $user['email'],
                'isLoggedIn' => true
            ]);

            // Redirect ke halaman dashboard atau home
            return redirect()->to('/dashboard');
        } else {
            // Jika login gagal, kirimkan pesan error
            return redirect()->back()->with('error', 'Email atau Password salah !');
        }
    }

    public function logout()
    {
        // Hapus semua session
        session()->destroy();
        return redirect()->to('auth');
    }

}
