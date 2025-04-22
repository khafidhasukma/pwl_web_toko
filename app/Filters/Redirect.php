<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Redirect implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Tidak ada aksi sebelum request
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Jika user berhasil login, arahkan ke menu Produk
        if (session()->has('isLoggedIn') && session('isLoggedIn') === true) {
            return redirect()->to(site_url('produk'));
        }
    }
}