@extends('layouts.app2')
@section('content')
<div class="container-fluid ml-5">
<h2>Thêm độc giả</h2>

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

<form action="{{route('users.store')}}" method="post" enctype="multipart/form-data" class="mt-2">
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
        <input class="form-control" type="password" name="password" id="pw">
        <input type="checkbox" id="show_hide_password" class="mt-3 mr-2">Hiện mật khẩu
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
      <input type="file" name="avatar">
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
@push('scripts')
<script type="text/javascript">
   function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }

    $(document).ready(function() {
    $("#show_hide_password").on('change', function(event) {
        event.preventDefault();
        if(!this.checked){
            $('#pw').attr('type', 'password');
        }else if(this.checked){
            $('#pw').attr('type', 'text');
        }
    });
});
</script>
@endpush
