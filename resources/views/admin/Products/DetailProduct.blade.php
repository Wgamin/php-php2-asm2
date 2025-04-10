@extends('layouts.AdminLayout')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h1 class="text-center">{{$title}}</h1>
            <a href="{{route('product/')}}" class="btn btn-secondary mb-3">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>
    </div>
    
    <div class="card">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{file_url($products['img_thumbnail'])}}" class="img-fluid rounded-start" alt="{{$products['name']}}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title">{{$products['name']}}</h2>
                    <div class="card-text">
                        <div class="mb-3">
                            <strong>Danh mục:</strong> 
                            <span class="badge bg-info">{{$products['category_name']}}</span>
                        </div>
                        <div class="mb-3">
                            <strong>Giá tiền:</strong> 
                            <span class="text-danger fw-bold">{{number_format($products['price'], 0, ',', '.')}} VNĐ</span>
                        </div>
                        <div class="mb-3">
                            <strong>Trạng thái:</strong> 
                            <span class="badge {{$products['active'] ? 'bg-success' : 'bg-danger'}}">
                                {{$products['active'] ? 'Còn bán' : 'Dừng bán'}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection