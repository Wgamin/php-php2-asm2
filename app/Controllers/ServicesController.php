<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Services;

class ServicesController extends BaseController
{
    protected $modelCategory;
    protected $modelServices;

    public function __construct()
    {
        $this->modelCategory = new Category();
        $this->modelServices = new Services();
    }

    public function index()
    {
        $title = 'Danh sách dịch vụ';
        $services = $this->modelServices->all();
        return view('admin.Services.IndexServices', compact('services', 'title'));
    }

    public function create()
    {
        $title = 'Thêm người dịch vụ';
        $categories = $this->modelCategory->all();
        return view('admin.Services.CreateServices', compact('title', 'categories'));
    }

    public function edit($id)
    {
        // $user = $this->modelUser->find($id);
        // if (!$user) {
        //     redirect404();
        // }
        // $title = 'Sửa thông tin người dùng';
        // $roles = $this->modelRole->all();
        // return view('admin.user.EditUser', compact('user', 'title', 'roles'));
    }

    public function show($id)
    {
        $services = $this->modelServices->find($id);
        if (!$services) {
            redirect404();
        }
        $title = 'Chi tiết dịch vụ';
        return view('admin.Services.ShowServices', compact('services', 'title'));
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $img_thumbnail = 'storage/uploads/services/default.jpg';
            
            if (is_upload('img_thumbnail')) {
                $uploaded = $this->uploadFile($_FILES['img_thumbnail'], 'services');
                if ($uploaded) {
                    $img_thumbnail = $uploaded;
                }
            }

            if ($this->modelServices->create([
                'name' => $_POST['name'],
                'category_id' => $_POST['category_id'],
                'img_thumbnail' => $img_thumbnail,
                'overview' => $_POST['overview'],
                'content' => $_POST['content']
            ])) {
                redirect('services');
            }
        }
        redirect404();
    }

    public function update($id)
    {
        $service = $this->modelServices->find($id);
        if (!$service) {
            redirect404();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name'],
                'category_id' => $_POST['category_id'],
                'overview' => $_POST['overview'],
                'content' => $_POST['content'],
                'updated_at' => date('Y-m-d H:i:s')
            ];

            if ($this->modelServices->update($id, $data)) {
                redirect('services');
            }
        }
        redirect404();
    }

    public function destroy($id)
    {
        $service = $this->modelServices->find($id);
        if (!$service) {
            redirect404();
        }

        if ($this->modelServices->delete($id)) {
            redirect('services');
        }
        redirect404();
    }
}
