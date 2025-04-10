@extends('layouts.AdminLayout')

@section('content')
<h1 class="text-center"> {{$tile}}</h1>
<table class="table table-striped">
  <thead>
    <tr>

      <th>STT</th>
      <th>Tên sản phẩm</th>
      <th>Ånh san phẩm</th>
      <th>Danh mục</th>
      <th>Giá tiền</th>
      <th>Trạng thái</th>
      <th>Thao tác</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($products as $key=>$item)
    <tr>
      <td>{{$key+1}}</td>
      <td>{{$item ['name']}}</td>
      <td>
        <img src="{{file_url($item['img_thumbnail'])}}" width="50" alt="">
      </td>
      <td>{{$item ['category_name']}}</td>
      <td>{{$item ['price']}}</td>
      <td>{{$item ['active'] ? 'con ban' : 'dung ban'}}</td>
      <td>
        <a href="{{route('product/' . $item['id'] . '/show')}}" class="btn btn-info btn-sm">Xem</a>
        <a href="" class="btn btn-warning btn-sm">Sua</a>
        <a href="" class="btn btn-danger btn-sm">Xoa</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection