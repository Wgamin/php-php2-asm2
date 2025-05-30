@extends('layouts.AdminLayout')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h1 class="text-center">{{$title}}</h1>
            <a href="{{route('services')}}" class="btn btn-secondary">
                <i class="bx bx-arrow-back"></i> Quay lại
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{route('services/store')}}" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Tên dịch vụ</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Danh mục</label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        <option value="">Chọn danh mục</option>
                        @foreach ($categories as $item)
                        <option value="{{$item['id']}}">{{$item['name']}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="img_thumbnail" class="form-label">Ảnh dịch vụ</label>
                    <input type="file" class="form-control" id="img_thumbnail" name="img_thumbnail" accept="image/*">
                </div>

                <div class="mb-3">
                    <label for="overview" class="form-label">Mô tả ngắn</label>
                    <textarea class="form-control" id="overview" name="overview" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Nội dung chi tiết</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="bx bx-save"></i> Thêm dịch vụ
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection