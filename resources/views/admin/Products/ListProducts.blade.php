@extends('layouts.AdminLayout')

@section('content')
<div class="container-fluid">
    <h1 class="text-center">{{$title}}</h1>

    @if(isset($_SESSION['success']))
    <div class="alert alert-success">
        {{$_SESSION['success']}}
        @php unset($_SESSION['success']); @endphp
    </div>
    @endif

    @if(isset($_SESSION['errors']))
    <div class="alert alert-danger">
        {{$_SESSION['errors']}}
        @php unset($_SESSION['errors']); @endphp
    </div>
    @endif

    <div class="row mb-3">
        <div class="col-12">
            <a href="{{route('product/create')}}" class="btn btn-primary">
                <i class="bx bx-plus"></i> Thêm sản phẩm
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Danh mục</th>
                            <th>Giá</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key=>$item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item['name']}}</td>
                            <td>
                                <img src="{{file_url($item['img_thumbnail'])}}" class="rounded" width="50" alt="{{$item['name']}}">
                            </td>
                            <td>{{$item['category_name']}}</td>
                            <td>{{number_format($item['price'], 0, ',', '.')}} đ</td>
                            <td>
                                <span class="badge bg-{{$item['active'] ? 'success' : 'danger'}}">
                                    {{$item['active'] ? 'Còn bán' : 'Dừng bán'}}
                                </span>
                            </td>
                            <td>
                                <a href="{{route('product/' . $item['id'] . '/show')}}" class="btn btn-info btn-sm">
                                    <i class="bx bx-show"></i>
                                </a>
                                <a href="{{route('product/' . $item['id'] . '/edit')}}" class="btn btn-warning btn-sm">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <form action="{{route('product/' . $item['id'] . '/delete')}}" method="post" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection