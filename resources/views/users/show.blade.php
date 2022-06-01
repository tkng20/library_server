@extends('layouts.app2')
@section('content')
<div class="container-fluid ml-5">
    <h1 class="display-6">Chi tiết độc giả</h1>

    <hr/>

    <dl>
        <dt>Tên độc giả</dt>
        <dd>{{$user->name}}</dd>

        <dt>Email</dt>
        <dd>{{$user->email}}</dd>

        <dt>Số điện thoại</dt>
        <dd>{{$user->phone}}</dd>

        <dt>Giới tính</dt>
        <dd>{{$user->gender}}</dd>

        <dt>Ảnh đại diện</dt>
        <dd><img src="data:image/jpeg;base64,{{ $user->avatar }}"
 style="height: 100px; width: 150px;"></dd>

        <dt>Ngày sinh</dt>
        <dd>{{$user->birthday}}</dd>
    </dl>

    <div class="d-flex">
        <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary">Sửa</a>
    </div>
</div>
@endsection