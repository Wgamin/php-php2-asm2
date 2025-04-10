@extends('layouts.AdminLayout')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h1 class="text-center">{{$tile}}</h1>
            <a href="{{route('product/')}}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{route('product/' . $product['id'] . '/update')}}" method="post" enctype="multipart/form-data">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <img src="{{file_url($product['img_thumbnail'])}}" class="img-thumbnail" alt="Ảnh sản phẩm">
                    </div>
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label for="img_thumbnail" class="form-label">Ảnh sản phẩm</label>
                            <input type="file" class="form-control" id="img_thumbnail" name="img_thumbnail" accept="image/*">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="name" value="{{$product['name']}}" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Danh mục</label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        @foreach ($categories as $item)
                            <option value="{{$item['id']}}" {{$product['category_id'] == $item['id'] ? 'selected' : ''}}>
                                {{$item['name']}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Giá tiền</label>
                    <input type="number" step="1000" class="form-control" value="{{$product['price']}}" id="price" name="price" required>
                </div>

                <div class="mb-3">
                    <label for="active" class="form-label">Trạng thái</label>
                    <select class="form-select" id="active" name="active" required>
                        <option value="1" {{$product['active'] == 1 ? 'selected' : ''}}>Còn bán</option>
                        <option value="0" {{$product['active'] == 0 ? 'selected' : ''}}>Dừng bán</option>
                    </select>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Cập nhật sản phẩm
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection