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

    <div class="row mb-3">
        <div class="col-md-12">
            <a href="{{route('/services/create')}}" class="btn btn-success">
                <i class="bx bx-plus"></i> Thêm dịch vụ
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
                            <th>Tên dịch vụ</th>
                            <th>Danh mục</th>
                            <th>Ảnh</th>
                            <th>Mô tả</th>
                            <th>Ngày tạo</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $key=>$item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item['name']}}</td>
                            <td>{{$item['category_name']}}</td>
                            <td>
                                <img src="{{file_url($item['img_thumbnail'])}}" width="50" class="rounded" alt="{{$item['name']}}">
                            </td>
                            <td>{{$item['overview']}}</td>
                            <td>{{date('d/m/Y', strtotime($item['created_at']))}}</td>
                            <td>
                                <a href="{{route('services/' . $item['id'] . '/show')}}" class="btn btn-info btn-sm">
                                    <i class="bx bx-show"></i>
                                </a>
                                <a href="{{route('services/' . $item['id'] . '/edit')}}" class="btn btn-warning btn-sm">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <form action="{{route('services/' . $item['id'] . '/delete')}}" method="post" style="display:inline-block;">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">
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