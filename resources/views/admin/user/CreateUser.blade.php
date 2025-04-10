@extends('layouts.AdminLayout')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h1 class="text-center">{{$title}}</h1>
            <a href="{{route('user/')}}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{route('user/store')}}" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="img_avatar" class="form-label">Ảnh đại diện</label>
                    <input type="file" class="form-control" id="img_avatar" name="img_avatar" accept="image/*">
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="full_name" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{10}" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <textarea class="form-control" id="address" name="address" rows="2"></textarea>
                </div>

                <div class="mb-3">
                    <label for="role_id" class="form-label">Vai trò</label>
                    <select class="form-select" id="role_id" name="role_id" required>
                        @foreach($roles as $role)
                        <option value="{{$role['id']}}" {{$role['id'] == 2 ? 'selected' : ''}}>{{$role['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Lưu người dùng
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection