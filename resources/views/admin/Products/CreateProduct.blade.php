@extends('layouts.AdminLayout')

@section('content')
<div class="container-fluid">
    <h1 class="text-center">{{$title}}</h1>

    @if(isset($_SESSION['errors']))
    <div class="alert alert-danger">
        {{$_SESSION['errors']}}
        @php unset($_SESSION['errors']); @endphp
    </div>
    @endif

    <div class="row mb-3">
        <div class="col-12">
            <a href="{{route('product/')}}" class="btn btn-secondary">
                <i class="bx bx-arrow-back"></i> Quay lại
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{route('product/store')}}" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Tên sản phẩm</label>
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
                    <label for="price" class="form-label">Giá tiền</label>
                    <input type="number" step="1000" min="0" class="form-control" id="price" name="price" required>
                </div>

                <div class="mb-3">
                    <label for="img_thumbnail" class="form-label">Ảnh sản phẩm</label>
                    <input type="file" class="form-control" id="img_thumbnail" name="img_thumbnail" accept="image/*">
                </div>

                <div class="mb-3">
                    <label for="active" class="form-label">Trạng thái</label>
                    <select class="form-select" id="active" name="active" required>
                        <option value="1">Còn bán</option>
                        <option value="0">Dừng bán</option>
                    </select>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="bx bx-save"></i> Thêm sản phẩm
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection