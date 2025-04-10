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
        // var_dump('test san pham thanh cong');die;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $category_id = $_POST['category_id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $active = $_POST['active'];
            if (is_upload('img_thumbnail')) {
                $img_thumbnail = $this -> uploadFile($_FILES['img_thumbnail'], 'products');
            }else {
                $img_thumbnail = null;    
            }
            $this->productsModel->create([
                'category_id' => $category_id,
                'name' => $name,
                'price' => $price,
                'active' => $active,
                'img_thumbnail' => $img_thumbnail,
            ]);
            redirect('product');
        } else {
            redirect404();
        }
    }

    public function edit($id)
    {
        $tile = 'trang sửa sản phẩm';
        $product = $this->productsModel->find($id);
        $categories = $this->categoryModel->All();

        if (!$product) {
            redirect404();
        }else {
            return view('admin.Products.EditProduct', compact('product', 'categories', 'tile'));
        }
        
    }

    public function update($id)
    {
        $product = $this->productsModel->find($id);
        if (!$product) {
            redirect404();
        }else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $category_id = $_POST['category_id'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $active = $_POST['active'];
                $img_thumbnail = $product['img_thumbnail']; // Giữ nguyên ảnh cũ
                if (is_upload('img_thumbnail')) {
                    // Xóa ảnh cũ nếu có
                    if (!empty($products['img_thumbnail'])) {
                        if (file_exists($products['img_thumbnail']) && file_exists($products['img_thumbnail'])) {
                            unlink($products['img_thumbnail']);
                        }
                    }
                    $img_thumbnail = $this -> uploadFile($_FILES['img_thumbnail'], 'products');
                }
                $this->productsModel->update($id,[
                    'category_id' => $category_id,
                    'name' => $name,
                    'price' => $price,
                    'active' => $active,
                    'img_thumbnail' => $img_thumbnail,
                ]);
                redirect('product');
            } else {
                redirect404();
            }
        }
    }

    public function destroy($id)
    {
        $products = $this->productsModel->find($id);
        if (!$products) {
            redirect404();
            
        }else {
            if (!empty($products['img_thumbnail'])) {
                if (file_exists($products['img_thumbnail'])) {
                    unlink($products['img_thumbnail']);
                    
                }
            }
            $this->productsModel->delete($id);
            redirect('product');
        }
    }
}
