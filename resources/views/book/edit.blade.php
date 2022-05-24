@extends('layouts.app2')
@section('content')
<div class="container-fluid ml-5">
<h2>SỬA SÁCH</h2>

<!-- Open the form with the store function route. -->
{{ Form::open(['action' => ['BookControllerAdmin@update', $book->id], 'method' => 'put']) }}
    <!-- Include the CRSF token -->
    {{Form::token()}}
    <!-- build our form inputs -->
    <div class="form-group">
        <label for="tenSach">
            Tên sách:
            <input class="form-control" type="text" name="tenSach" class="form-control" value="{{ $book->tenSach }}">
        </label>
       <div>
        @error('tenSach')
                <span role="alert">
                    <p class="font-weight-light text-danger">{{ $message }}</p>
                </span>

        @enderror
       </div>
       </div>

       <div class="form-group">
        <label for="tacGia">
        Tác giả:
            <input class="form-control" type="text" name="tacGia" value="{{ $book->tacGia }}">
        </label>
        </div>
        @error('tacGia')
            <span role="alert">
                <p class="font-weight-light text-danger">{{ $message }}</p>
            </span>
        @enderror

        <div class="form-group">
        <label for="theLoai">
        Thể loại:
            <input class="form-control" type="text" name="theLoai" value="{{ $book->theLoai }}">
        </label>
        </div>
        @error('theLoai')
            <span role="alert">
                <p class="font-weight-light text-danger">{{ $message }}</p>
            </span>
        @enderror

        <div class="form-group">
        <label for="soLuong">
        Số lượng:
            <input class="form-control" type="text" name="soLuong" value="{{ $book->soLuong }}">
        </label>
        </div>
        @error('soLuong')
            <span role="alert">
                <p class="font-weight-light text-danger">{{ $message }}</p>
            </span>
        @enderror

        <div class="form-group">
        <label for="soTrang">
        Số trang:
            <input class="form-control" type="text" name="soTrang" value="{{ $book->soTrang }}">
        </label>
        </div>
        @error('soTrang')
            <span role="alert">
                <p class="font-weight-light text-danger">{{ $message }}</p>
            </span>
        @enderror

        <div class="form-group">
        <label for="ngayXB">
        Ngày xuất bản:
            <input class="form-control" type="date" name="ngayXB" value="{{ $book->ngayXB }}">
        </label>
        </div>
        @error('ngayXB')
            <span role="alert">
                <p class="font-weight-light text-danger">{{ $message }}</p>
            </span>
        @enderror

        <div class="form-group">
        <label for="moTa">
        Mô tả:
            <input class="form-control" type="text" name="moTa" value="{{ $book->moTa }}">
        </label>
        </div>
        @error('moTa')
            <span role="alert">
                <p class="font-weight-light text-danger">{{ $message }}</p>
            </span>
        @enderror
    {{Form::submit('Cập nhật!', ['class' => 'btn btn-primary'])}}
    {{ Form::close() }}
</div>
    @endsection