<?php

namespace App\Controllers;
use App\Models\Product;
use App\Models\baseModel;
use App\Models\Category;
use App\Controllers\BaseController;

class ProductController extends BaseController{ 
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
        $tile = 'trang Thêm sản phẩm';
        // var_dump('');die;
        $categories = $this->categoryModel->All();
        // var_dump($categories);die;
        return view('admin.Products.CreateProduct', compact('categories', 'tile'));
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $img_thumbnail = 'storage/uploads/products/default.jpg';
            
            if (is_upload('img_thumbnail')) {
                $uploaded = $this->uploadFile($_FILES['img_thumbnail'], 'products');
                if ($uploaded) {
                    $img_thumbnail = $uploaded;
                }
            }

            $this->productsModel->create([
                'category_id' => $_POST['category_id'],
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'active' => $_POST['active'],
                'img_thumbnail' => $img_thumbnail,
            ]);
            redirect('product');
        }
        redirect404();
    }

    public function edit($id)
    {
        $product = $this->productsModel->find($id);
        if (!$product) {
            redirect404();
        }
        $tile = 'Cập nhật sản phẩm';
        $categories = $this->categoryModel->all();
        return view('admin.Products.EditProduct', compact('product', 'categories', 'tile'));
    }

    public function update($id)
    {
        $product = $this->productsModel->find($id);
        if (!$product) {
            redirect404();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $img_thumbnail = $product['img_thumbnail'];

            if (is_upload('img_thumbnail')) {
                if (!empty($product['img_thumbnail']) && $product['img_thumbnail'] != 'storage/uploads/products/default.jpg') {
                    if (file_exists($product['img_thumbnail'])) {
                        unlink($product['img_thumbnail']);
                    }
                }
                
                $uploaded = $this->uploadFile($_FILES['img_thumbnail'], 'products');
                if ($uploaded) {
                    $img_thumbnail = $uploaded;
                }
            }

            $this->productsModel->update($id, [
                'category_id' => $_POST['category_id'],
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'active' => $_POST['active'],
                'img_thumbnail' => $img_thumbnail
            ]);
            redirect('product/');
        }
        redirect404();
    }

    public function destroy($id)
    {
        $product = $this->productsModel->find($id);
        if (!$product) {
            redirect404();
        }

        if (!empty($product['img_thumbnail']) && $product['img_thumbnail'] != 'public/uploads/products/default.jpg') {
            if (file_exists($product['img_thumbnail'])) {
                unlink($product['img_thumbnail']);
            }
        }

        $this->productsModel->delete($id);
        redirect('product');
    }
}
