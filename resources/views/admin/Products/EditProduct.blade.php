@extends('layouts.AdminLayout')

@section('content')
<h1 class="text-center"> {{$tile}}</h1>
<div class="col-md-2 mb-5">
    <a href="{{route('product/')}}" class="btn btn-warning"> quay lai</a>
</div>
<div class="col-md-12">
    <form action="{{route('product/' . $product['id'] . '/update')}}" method="post" enctype="multipart/form-data">
        <div class="md-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" value="{{$product['name']}}" name="name" placeholder="Nhập tên sản phẩm">
        </div>
        <div class="md-3">
            <label for="category_id" class="form-label">Danh muc</label>
            <select class="form-select" id="category_id" name="category_id" aria-label="Default select example">
                <option selected>Chọn danh mục</option>
                @foreach ($categories as $item)
                    <option value="{{$item['id']}}"  {{$product['category_id'] == $item['id'] ? 'selected' : ''}}>
                        {{$item['name']}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="md-3">
            <label for="price" class="form-label">gia tien</label>
            <input type="number" step="100" class="form-control" value="{{$product['price']}}" id="price" name="price" placeholder="Nhập tên sản phẩm">
        </div>
        <div class="md-3">
            <label for="img_thumbnail" class="form-label">anh san pham</label>
            <input type="file" class="form-control" id="img_thumbnail" name="img_thumbnail">
        </div>
        <div class="md-3">
            <label for="active" class="form-label">trang thai</label>
            <select class="form-select" id="active" name="active" aria-label="Default select example">
                <option selected>Chọn trang thai</option>
                <option value="1" {{$product['active'] == 1 ? 'selected' : '' }}>con ban</option>
                <option value="0" {{$product['active'] == 0 ? 'selected' : '' }}>dung ban</option>
            </select>
        </div>
        <button class="btn btn-success">cap nhat san pham</button>
    </form>
</div>
@endsection