<?php

namespace App\Controllers;
use App\Models\Product;
use App\Models\baseModel;
use App\Models\Category;

class ProductController { 
    protected $productsModel; // Khai báo biến model
    protected $categoryModel; // Khai báo biến model
    public function __construct()
    {
        $this->productsModel = new Product(); // Kiểm tra đăng nhập
        $this->categoryModel = new Category(); // Kiểm tra đăng nhập
    }
    public function index()
    {
        $tile = 'Danh sách sản phẩm';
        $products = $this->productsModel->getAllProduct();
        
        return view('admin.Products.ListProducts', compact('products', 'tile'));
    }

    public function show($id)
    {
        $products = $this->productsModel->getProductById($id);
        // return view('admin.Products.DetailProduct');
        // var_dump($products);die;
        $tile = 'Chi tiết sản phẩm';
        return view('admin.Products.DetailProduct', compact('products', 'tile'));
        
    }

    public function create()
    {
        // Hàm hiển thị form thêm
    }

    public function store()
    {
        // Hàm thực hiện thêm dữ liệu
    }

    public function edit($id)
    {
        // Hàm lấy thông tin dữ liệu cần sửa
        
    }

    public function update($id)
    {
        // Hàm thực hiện sửa dữ liệu 
    }

    public function destroy($id)
    {
        // Hàm thực hiện xóa dữ liệu
        
    }
}
