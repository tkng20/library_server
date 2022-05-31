@extends('layouts.app2')
@section('content')
<style>
  .card-header{
    border-bottom: 0px solid #e3e6f0 !important; 

  }
  .float-right{
    margin-bottom: 12px !important;
    padding: 10px  !important;
  }
  /* tr{
    background-color: #4e73df;
  color: white;
  } */
  .table .thead-dark th{
    background-color: #4e73df;
    color: white;
  }
  .table{
    color: #4b4b4e !important;
  }
  tr:hover {background-color: #c7d2f1;}

  .btn-info {
    color: #fff;
    background-color: #fac338;
    border-color: #fac338;
  }
  .btn-info:hover{
    color: #fff;
    background-color:    #eab42b;
    border-color:   #eab42b;
  }
  .table .thead-dark th{
    border-color: #ffffff;
  }
</style>
<h1 class="display-6">Danh sách sách</h1>
<div class="card shadow mb-4">
<div class="card-header">
      <a href="{{route('book.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Thêm sách"><i class="fas fa-plus"></i> Thêm sách</a>
</div>

<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead class="thead-dark">
    <tr style="background-color: #4e73df;">
        <th scope="col" style="width: 1%">ID</th>
        <th scope="col" style="width: 15%">Tên sách</th>
        <th scope="col" style="width: 12%">Tác giả</th>
        <th scope="col" style="width: 5%">Thể loại</th>
        <th scope="col" style="width: 10%">Số lượng</th>
        <th scope="col" style="width: 10%">Số trang</th>
        <th scope="col" style="width: 20%">Ngày XB</th>
        <th scope="col" style="width: 32%">Ảnh</td>
        <th scope="col" style="width: 20%">Thao tác</td>
        <td></td>
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
</div>
</div>
</div>
@endsection
@push('scripts')
<script src="http://3.0.59.80/test/resources/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="http://3.0.59.80/test/resources/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="http://3.0.59.80/test/resources/assets/js/demo/datatables-demo.js"></script>
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