@extends('layouts.app')
@section('content')
<div class="container-fluid ml-5">
<h2>THÊM SÁCH</h2>

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

<form action="{{route('book.store')}}" method="post" class="mt-2">
    @csrf
    <div class="form-group">
    <label for="tenSach">
        Tên sách:
        <input class="form-control" type="text" name="tenSach" class="form-control">
    </label>
    <div>
    
    </div>
    </div>

    <div class="form-group">
    <label for="tacGia">
    Tác giả:
        <input class="form-control" type="text" name="tacGia">
    </label>
    </div>
    

    <div class="form-group">
    <label for="theLoai">
    Thể loại:
        <input class="form-control" type="text" name="theLoai">
    </label>
    </div>
    

    <div class="form-group">
    <label for="soLuong">
    Số lượng:
        <input class="form-control" type="text" name="soLuong">
    </label>
    </div>
    

    <div class="form-group">
    <label for="soTrang">
    Số trang:
        <input class="form-control" type="text" name="soTrang">
    </label>
    </div>
    

    <div class="form-group">
    <label for="ngayXB">
    Ngày xuất bản:
        <input class="form-control" type="date" name="ngayXB">
    </label>
    </div>
    

    <div class="form-group">
    <label for="moTa">
    Mô tả:
        <input class="form-control" type="text" name="moTa">
    </label>
    </div>
    
    <button type="submit" class="btn btn-primary">Thêm sách</button>
</form>
</div>
@endsection