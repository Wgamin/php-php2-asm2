@extends('layouts.AdminLayout')

@section('content')
<h1 class="text-center">{{$title}}</h1>
<div class="container">
    <h2>{{$products['name']}}</h2>
    <p><strong>Danh muc: </strong> {{$products['category_name']}}</p>
    <p><strong>Gia tien: </strong> {{$products['price']}}</p>
    <p><strong>Trạng thái: </strong> {{$products['active'] ? 'Còn ban' : 'Dừng ban'}}</p>
</div>
@endsection