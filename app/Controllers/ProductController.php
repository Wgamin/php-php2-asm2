<?php

namespace App\Controllers;

class ProductController {
    public function index()
    {
        return view('admin.Products.ListProducts');
    }

    public function show($id)
    {
        return view('admin.Products.DetailProduct');
        
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
