<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProdukController extends BaseController
{
    public function index()
    {
        return view('v_produk');
        //
    }

    public function detail_mlbb()
    {
        return view('v_detail_mlbb');
    }

    public function payment()
    {
        return view('v_payment');
    }
}
