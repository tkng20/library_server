@extends('layouts.app2')
@section('content')
<div class="container-fluid ml-5">
<h2>Thêm chi tiết mượn sách</h2>

 @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif

{{Form::token()}}

<form action="#" method="post" enctype="multipart/form-data" class="mt-2">
    @csrf
    <div class="form-group">
    <label for="name">
        Tên độc giả:
        <input class="form-control" type="text" name="name" class="form-control">
    </label>
    <div>
    
    </div>
    </div>

    <div class="form-group">
    <label for="email">
    Email:
        <input class="form-control" type="text" name="email">
    </label>
    </div>

    <div class="form-group">
    <label for="password">
    Mật khẩu:
        <input class="form-control" type="text" name="password">
    </label>
    </div>

    <div class="form-group">
    <label for="phone">
    Số điện thoại:
        <input class="form-control" type="text" name="phone">
    </label>
    </div>

    <div class="form-group">
    <label for="gender">
    <b>Giới tính:</b>
        <br>
        <input type="radio" id="nam" name="gender" value="Nam">
        <label for="nam">Nam</label><br>
        <input type="radio" id="nu" name="gender" value="Nữ">
        <label for="nu" >Nữ</label><br>
    </label>
    </div>

    <div class="form-group">
    <label>Ảnh đại diện</label>
      <input type="file" required name="avatar">
    </div>
      

    <div class="form-group">
    <label for="birthday">
    Ngày sinh:
        <input class="form-control" type="date" name="birthday">
    </label>
    </div>
    
    <button type="submit" class="btn btn-primary">Thêm độc giả</button>
</form>
</div>
@endsection