@extends('layouts.app2')
@section('content')
<div class="container-fluid ml-5">
<h2>Thêm sách</h2>

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

<form action="{{route('book.store')}}" method="post" enctype="multipart/form-data" class="mt-2">
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
          <label for="cat_id">Thể loại <span class="text-danger">*</span></label>
          <select name="categories_id" id="cat_id" class="form-control col-4">
              <option value="">--Chọn thể loại--</option>
              @foreach($categories as $key=>$cat_data)
                  <option value='{{$cat_data->id}}'>{{$cat_data->tenTheLoai}}</option>
              @endforeach
          </select>
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
        <textarea class="form-control" rows="10" cols="100" name="moTa" form="usrform" spellcheck="false"></textarea>
    </label>
    </div>

    <div class="form-group">
    <label>Ảnh bìa</label>
    <br>
      <input type="file" required name="image">
    </div>
    
    <button type="submit" class="btn btn-primary">Thêm sách</button>
</form>
</div>
@endsection