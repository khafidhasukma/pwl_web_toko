<?php

namespace App\Controllers;
use App\Models\ProductModel;

class Home extends BaseController
{
    protected $product;

    function __construct()
    {
        helper('form');
        helper('number');
        $this->product = new ProductModel();
    }
    
    public function index(): string
    {

        $product = $this->product->findAll();
        $data['product'] = $product;

        return view('v_home', $data);
    }

    public function faq(): string
    {
        return view('v_faq');
    }

    public function profile()
    {
        return view('v_profile');
    }

    public function contact()
    {
        return view('v_contact');
    }
}