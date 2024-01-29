<?php

namespace App\Controllers;

class Layout extends BaseController
{
    public function index(): string
    {
        if (session()->get('masuk') == true) {
            return view('layout/beranda');
        } else {
            echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }
}
