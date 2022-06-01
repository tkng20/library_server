@extends('layouts.app2')
@section('content')
<div class="container-fluid ml-5">
    <h1 class="display-6">Chi tiết sách</h1>

    <hr/>

    <dl>
        <dt>Tên sách</dt>
        <dd>{{$book->tenSach}}</dd>

        <dt>Tác giả</dt>
        <dd>{{$book->tacGia}}</dd>

        <dt>Thể loại</dt>
        <dd>{{$book->categories->tenTheLoai}}</dd>

        <dt>Số lượng</dt>
        <dd>{{$book->soLuong}}</dd>

        <dt>Số Trang</dt>
        <dd>{{$book->soTrang}}</dd>

        <dt>Ngày Xuất Bản</dt>
        <dd>{{$book->ngayXB}}</dd>

        <dt>Mô Tả</dt>
        <p>{{$book->moTa}}</p>
    </dl>

    <div class="d-flex">
        <a href="{{route('book.edit', $book->id)}}" class="btn btn-primary">Sửa</a>

        <form action="{{ route('book.destroy', $book->id) }}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button class="btn btn-danger ml-2 dltBtn"> Xoá Sách</button>
        </form>
    </div>
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