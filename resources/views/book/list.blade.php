@extends('layouts.app2')
@section('content')
<h1 class="display-5 text-center text-uppercase mb-5">danh sách sách</h1>

<div class="card-header">
      <a href="{{route('book.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Thêm sách"><i class="fas fa-plus"></i> Thêm sách</a>
</div>
<table class="table">
  <thead class="thead-dark">
    <tr>
        <th scope="col" style="width: 1%">ID</th>
        <th scope="col" style="width: 15%">Tên sách</th>
        <th scope="col" style="width: 12%">Tác giả</th>
        <th scope="col" style="width: 5%">Thể loại</th>
        <th scope="col" style="width: 10%">Số lượng</th>
        <th scope="col" style="width: 10%">Số trang</th>
        <th scope="col" style="width: 20%">Ngày XB</th>
        <th scope="col" style="width: 32%">Ảnh</td>
        <th scope="col" style="width: 20%">Thao tác</td>
    </tr>
  </thead>
  <tbody>
    @foreach($books as $book)
        <tr>
            <th scope="row">{{ $book->id }}</th>
            <td>{{ $book->tenSach }}</td>
            <td>{{ $book->tacGia }}</td>
            <td>{{ $book->categories->tenTheLoai }}</td>
            <td>{{ $book->soLuong }}</td>
            <td>{{ $book->soTrang }}</td>
            <td>{{ $book->ngayXB }}</td>
            <td><img src="{{ url('public/storage/'.$book->image) }}"
 style="height: 100px; width: 150px;">
	          </td>
            <td>
            <div class="d-flex">
                        <a href="{{route('book.show', $book->id)}}" class="btn btn-info btn-sm float-left mr-1" data-toggle="tooltip" title="detail" style="height:30px; width:30px;border-radius:50%"><i class="fas fa-eye"></i></a>
                        <a href="{{route('book.edit', $book->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                        <form method="POST" action="{{route('book.destroy', $book->id)}}">
                        @csrf 
                        @method('delete')
                          <button class="btn btn-danger btn-sm dltBtn" data-id={{$book->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </div>
            <td>
        </tr>
    @endforeach
  </tbody>
</table>

<div>
  {{$books->links()}}
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