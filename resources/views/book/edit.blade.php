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
          <select name="categories_id" id="cat_id" class="form-control col-4">
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
             <textarea  class="form-control" rows="10" cols="100" name="moTa" type="text" spellcheck="false">{{ $book->moTa }}</textarea>
        </label>
        </div>
        @error('moTa')
            <span role="alert">
                <p class="font-weight-light text-danger">{{ $message }}</p>
            </span>
        @enderror
        <div class="form-group mb-3" style="    text-align: left;">
           <button class="btn btn-danger" type="submit">Cập nhật</button>
        </div>
      </form>
    {{ Form::close() }}
</div>
    @endsection
    @push('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script>
      $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
              var dataID=$(this).data('id');
              // alert(dataID);
              e.preventDefault();
              swal({
                    title: "Bạn có muốn xóa?",
                    text: "Khi xóa bạn sẽ không thể hồi phục lại dữ liệu",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        swal("Dữ liệu của bạn vẫn an toàn!");
                    }
                });
          })
      })
  </script>
@endpush