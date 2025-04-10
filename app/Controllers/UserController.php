<?php
namespace App\Controllers;

use App\Models\User;
use App\Models\Role;

class UserController extends BaseController
{
    protected $modelUser;
    protected $modelRole;

    public function __construct()
    {
        $this->modelUser = new User();
        $this->modelRole = new Role();
    }

    public function create()
    {
        $title = 'Thêm người dùng mới';
        $roles = $this->modelRole->all();
        return view('admin.user.CreateUser', compact('title', 'roles'));
    }

    public function edit($id)
    {
        $user = $this->modelUser->find($id);
        if (!$user) {
            redirect404();
        }
        $title = 'Sửa thông tin người dùng';
        $roles = $this->modelRole->all();
        return view('admin.user.EditUser', compact('user', 'title', 'roles'));
    }

    public function index()
    {
        $title = 'Danh sách người dùng';
        $users = $this->modelUser->all();
        return view('admin.user.IndexUser', compact('users', 'title'));
    }

    public function show($id)
    {
        $user = $this->modelUser->find($id);
        if (!$user) {
            redirect404();
        }
        $title = 'Chi tiết người dùng';
        return view('admin.user.ShowUser', compact('user', 'title'));
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $img_avatar = 'storage/uploads/users/default-avatar.jpg';
            
            if (is_upload('img_avatar')) {
                $uploaded = $this->uploadFile($_FILES['img_avatar'], 'users');
                if ($uploaded) {
                    $img_avatar = $uploaded;
                }
            }

            $data = [
                'full_name' => $_POST['full_name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address'] ?? '',
                'img_avatar' => $img_avatar,
                'role_id' => $_POST['role_id'],
                'created_at' => date('Y-m-d H:i:s')
            ];

            if ($this->modelUser->create($data)) {
                redirect('user/');
            }
        }
        redirect404();
    }

    public function update($id)
    {
        $user = $this->modelUser->find($id);
        if (!$user) {
            redirect404();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $img_avatar = $user['img_avatar'];

            if (is_upload('img_avatar')) {
                if (!empty($user['img_avatar']) && $user['img_avatar'] != 'storage/uploads/users/default-avatar.jpg') {
                    if (file_exists($user['img_avatar'])) {
                        unlink($user['img_avatar']);
                    }
                }
                
                $uploaded = $this->uploadFile($_FILES['img_avatar'], 'users');
                if ($uploaded) {
                    $img_avatar = $uploaded;
                }
            }

            $data = [
                'full_name' => $_POST['full_name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address'] ?? '',
                'img_avatar' => $img_avatar,
                'role_id' => $_POST['role_id'],
                'updated_at' => date('Y-m-d H:i:s')
            ];

            if ($this->modelUser->update($id, $data)) {
                redirect('user/');
            }
        }
        redirect404();
    }

    public function destroy($id)
    {
        $user = $this->modelUser->find($id);
        if (!$user) {
            redirect404();
        }

        if (!empty($user['img_avatar']) && $user['img_avatar'] != 'storage/uploads/users/default-avatar.jpg') {
            if (file_exists($user['img_avatar'])) {
                unlink($user['img_avatar']);
            }
        }

        if ($this->modelUser->delete($id)) {
            redirect('user/');
        }
        redirect404();
    }
}