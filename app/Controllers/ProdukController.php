<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProdukController extends BaseController
{
    public function index()
    {
        return view('produk');
        //
    }

    public function detail_mlbb()
    {
        return view('detail-mlbb');
    }

    public function payment()
    {
        return view('payment');
    }
}
