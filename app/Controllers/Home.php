<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'PT. Ima Montaz Teknindo';
        echo view('temp/header', $data);
        echo view('pages/home');
        echo view('temp/footer');
    }

    public function product()
    {
        $data['title'] = 'PT. Ima Montaz Teknindo';
        echo view('temp/header', $data);
        echo view('pages/product');
        echo view('temp/footer');
    }
}
