<?php

namespace App\Controllers;

class Home extends BaseController
{
    private function page(string $view): string
    {
        // Always use the v_ prefix for view files
        return view('v_' . $view);
    }

    public function index(): string
    {
        return $this->page('home');
    }

    public function dashboard(): string
    {
        return $this->page('dashboard');
    }

    public function produk(): string
    {
        return $this->page('produk');
    }

    public function keranjang(): string
    {
        return $this->page('keranjang');
    }

    public function detailMlbb(): string
    {
        return $this->page('detail_mlbb');
    }

    public function payment(): string
    {
        return $this->page('payment');
    }
}
