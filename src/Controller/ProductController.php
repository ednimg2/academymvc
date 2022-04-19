<?php

namespace App\Controller;

use App\Libraries\Controller;
use App\Model\ProductModel;

class ProductController extends Controller
{
    private ProductModel $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        dd($this->productModel->getAllProducts(20));
    }
}