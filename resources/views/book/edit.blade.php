@extends('layouts.app2')
@section('content')

<div class="container-fluid ml-5">
<h2>Chỉnh sửa thông tin sách</h2>

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
          <label for="cat_id">Thể loại <span class="text-danger">*</span></label>
          <select name="categories_id" id="cat_id" class="form-control">
              <option value="">--Chọn thể loại--</option>
              @foreach($categories as $key=>$cat_data)
                  <option value='{{$cat_data->id}}' {{(($book->categories_id==$cat_data->id)? 'selected' : '')}}>{{$cat_data->tenTheLoai}}</option>
              @endforeach
          </select>
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
             <textarea class="form-control" rows="4" cols="100" name="moTa" form="usrform" value="{{ $book->moTa }} spellcheck="false"">
        </label>
        </div>
        @error('moTa')
            <span role="alert">
                <p class="font-weight-light text-danger">{{ $message }}</p>
            </span>
        @enderror

    {{Form::submit('Cập nhật', ['class' => 'btn btn-danger'])}}
    {{ Form::close() }}
</div>
    @endsection