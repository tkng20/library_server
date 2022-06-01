@extends('layouts.app2')
@section('content')
<div class="container-fluid ml-5">
<h2>Chỉnh sửa thông tin độc giả</h2>

@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif

<!-- Open the form with the store function route. -->
{{ Form::open(['action' => ['UserAdminController@update', $user->id], 'method' => 'put']) }}
    <!-- Include the CRSF token -->
    {{Form::token()}}
    <!-- build our form inputs -->
    <div class="form-group">
    <label for="name">
        Tên độc giả:
        <input class="form-control" type="text" name="name" class="form-control" value="{{ $user->name }}">
    </label>
    <div>
    
    </div>
    </div>

    <div class="form-group">
    <label for="email">
    Email:
        <input class="form-control" type="text" name="email" value="{{ $user->email }}">
    </label>
    </div>


    <div class="form-group">
    <label for="phone">
    Số điện thoại:
        <input class="form-control" type="text" name="phone" value="{{ $user->phone }}">
    </label>
    </div>

    <div class="form-group">
    <label for="gender">
    <b>Giới tính:</b>
        <br>
        <input type="radio" id="nam" name="gender" value="Nam" {{ ($user->gender=="Nam")? "checked" : "" }}>
        <label for="nam">Nam</label><br>
        <input type="radio" id="nu" name="gender" value="Nữ" {{ ($user->gender=="Nữ")? "checked" : "" }}>
        <label for="nu" >Nữ</label><br>
    </label>
    </div>

    <!-- <div class="form-group">
    <label>Ảnh đại diện</label>
      <input type="file" required name="avatar">
    </div> -->
      

    <div class="form-group">
    <label for="birthday">
    Ngày sinh:
        <input class="form-control" type="date" name="birthday" value="{{ $user->birthday }}">
    </label>
    </div>


    {{Form::submit('Cập nhật', ['class' => 'btn btn-danger'])}}
    {{ Form::close() }}
</div>
    @endsection