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
        <div class="row g-0">
            <div class="col-md-4 text-center p-4">
                <img src="{{file_url($services['img_thumbnail'])}}" class="img-thumbnail" style="width: 200px; height: 200px; object-fit: cover;" alt="{{$services['name']}}">
                <h3 class="mt-3">{{$services['name']}}</h3>
                <div class="mb-3">
                    <strong>Danh mục:</strong>
                    <span class="badge bg-info">{{$services['category_name']}}</span>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3"><strong>Mô tả ngắn:</strong></div>
                        <div class="col-md-9">{{$services['overview']}}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3"><strong>Nội dung chi tiết:</strong></div>
                        <div class="col-md-9">{{$services['content']}}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3"><strong>Ngày tạo:</strong></div>
                        <div class="col-md-9">{{date('d/m/Y H:i', strtotime($services['created_at']))}}</div>
                    </div>
                    @if($services['updated_at'])
                    <div class="row mb-3">
                        <div class="col-md-3"><strong>Cập nhật lần cuối:</strong></div>
                        <div class="col-md-9">{{date('d/m/Y H:i', strtotime($services['updated_at']))}}</div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection