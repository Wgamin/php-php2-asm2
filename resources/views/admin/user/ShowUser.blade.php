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
        <div class="row g-0">
            <div class="col-md-4 text-center p-4">
                <img src="{{file_url($user['img_avatar'])}}" class="rounded-circle img-thumbnail" style="width: 200px; height: 200px; object-fit: cover;" alt="{{$user['full_name']}}">
                <h3 class="mt-3">{{$user['full_name']}}</h3>
                <span class="badge bg-primary">{{$user['role_name']}}</span>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3"><strong>Email:</strong></div>
                        <div class="col-md-9">{{$user['email']}}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3"><strong>Số điện thoại:</strong></div>
                        <div class="col-md-9">{{$user['phone']}}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3"><strong>Địa chỉ:</strong></div>
                        <div class="col-md-9">{{$user['address']}}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3"><strong>Ngày tạo:</strong></div>
                        <div class="col-md-9">{{date('d/m/Y H:i', strtotime($user['created_at']))}}</div>
                    </div>
                    @if($user['updated_at'])
                    <div class="row mb-3">
                        <div class="col-md-3"><strong>Cập nhật lần cuối:</strong></div>
                        <div class="col-md-9">{{date('d/m/Y H:i', strtotime($user['updated_at']))}}</div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection