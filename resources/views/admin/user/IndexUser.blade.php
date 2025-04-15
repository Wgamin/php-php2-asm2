@extends('layouts.AdminLayout')

@section('content')
<h1 class="text-center">{{$title}}</h1>
<div class="col-md-2 mb-3">
    <a href="{{route('user/create')}}" class="btn btn-success">Thêm người dùng</a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>STT</th>
            <th>Ảnh</th>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Vai trò</th>
            <th>dia chia</th>
            <th>Ngày tạo</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $key=>$item)
        <tr>
            <td>{{$key+1}}</td>
            <td>
                <img src="{{file_url($item['img_avatar'])}}" width="50" class="rounded-circle" alt="{{$item['full_name']}}">
            </td>
            <td>{{$item['full_name']}}</td>
            <td>{{$item['email']}}</td>
            <td>{{$item['phone']}}</td>
            <td>{{$item['role_name']}}</td>
            <td>{{$item['address']}}</td>
            <td>{{date('d/m/Y', strtotime($item['created_at']))}}</td>
            <td>
                <a href="{{route('user/' . $item['id'] . '/show')}}" class="btn btn-info btn-sm">Xem</a>
                <a href="{{route('user/' . $item['id'] . '/edit')}}" class="btn btn-warning btn-sm">Sửa</a>
                <form action="{{route('user/' . $item['id'] . '/delete')}}" method="post" style="display:inline-block;">
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection