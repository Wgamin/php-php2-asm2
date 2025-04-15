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
        $tile = 'Chi tiết sản phẩm';
        return view('admin.Products.DetailProduct', compact('products', 'tile'));
    }

    public function create()
    {
        $tile = 'trang Thêm sản phẩm';
        $categories = $this->categoryModel->All();
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

    public function update($id)
    {
        try {
            $product = $this->productsModel->find($id);
            if (!$product) {
                redirect404();
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (empty($_POST['name']) || empty($_POST['category_id']) || !isset($_POST['price'])) {
                    $_SESSION['errors'] = 'Vui lòng điền đầy đủ thông tin';
                    redirect('product/' . $id . '/edit');
                }

                $img_thumbnail = $product['img_thumbnail'];
                if (is_upload('img_thumbnail')) {
                    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
                    $extension = pathinfo($_FILES['img_thumbnail']['name'], PATHINFO_EXTENSION);
                    
                    if (!in_array(strtolower($extension), $allowed)) {
                        $_SESSION['errors'] = 'Chỉ chấp nhận file ảnh: ' . implode(', ', $allowed);
                        redirect('product/' . $id . '/edit');
                    }

                    if ($product['img_thumbnail'] != 'storage/uploads/products/default.jpg') {
                        if (file_exists($product['img_thumbnail'])) {
                            unlink($product['img_thumbnail']);
                        }
                    }
                    
                    $uploaded = $this->uploadFile($_FILES['img_thumbnail'], 'products');
                    if ($uploaded) {
                        $img_thumbnail = $uploaded;
                    }
                }

                if ($this->productsModel->update($id, [
                    'category_id' => htmlspecialchars($_POST['category_id']),
                    'name' => htmlspecialchars($_POST['name']),
                    'price' => floatval($_POST['price']),
                    'active' => isset($_POST['active']) ? 1 : 0,
                    'img_thumbnail' => $img_thumbnail
                ])) {
                    $_SESSION['success'] = 'Cập nhật sản phẩm thành công';
                    redirect('product');
                }
            }
        } catch (\Exception $e) {
            $_SESSION['errors'] = 'Có lỗi xảy ra khi cập nhật sản phẩm';
            redirect('product/' . $id . '/edit');
        }
        redirect404();
    }

    public function destroy($id)
    {
        try {
            $product = $this->productsModel->find($id);
            if (!$product) {
                redirect404();
            }

            if ($product['img_thumbnail'] != 'storage/uploads/products/default.jpg') {
                if (file_exists($product['img_thumbnail'])) {
                    unlink($product['img_thumbnail']);
                }
            }

            if ($this->productsModel->delete($id)) {
                $_SESSION['success'] = 'Xóa sản phẩm thành công';
                redirect('product');
            }
        } catch (\Exception $e) {
            $_SESSION['errors'] = 'Có lỗi xảy ra khi xóa sản phẩm';
            redirect('product');
        }
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
}
