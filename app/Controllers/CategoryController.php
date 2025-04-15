<?php

namespace App\Controllers;

use App\Models\Category;

class CategoryController
{
    public $modelCategory;

    public function __construct()
    {
        $this->modelCategory = new Category();
    }

    public function index() {}

    public function show()
    {
        // Hàm lấy chi tiết
    }

    public function create()
    {
        // Hàm hiển thị form thêm
    }

    public function store()
    {
        // Hàm thực hiện thêm dữ liệu
    }

    public function edit()
    {
        // Hàm lấy thông tin dữ liệu cần sửa
    }

    public function update()
    {
        // Hàm thực hiện sửa dữ liệu 
    }

    public function destroy()
    {
        // Hàm thực hiện xóa dữ liệu 
    }
}
