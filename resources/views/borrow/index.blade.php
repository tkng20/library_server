@extends('layouts.app2')
@section('content')
<style>
    th {
        background-color: #4e73df;
        color: white;
    }

    .container,
    .container-fluid,
    .container-lg,
    .container-md,
    .container-sm,
    .container-xl {
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .form-control form-control-sm {
        text-align: right;

    }

    .btn-success {
        color: #fff;
        background-color: #fac338;
        border-color: #fac338;
    }

    .btn-success:hover {
        color: #fff;
        background-color: #eab42b;
        border-color: #eab42b;
    }

    .table {
        color: #4b4b4e !important;
    }

    h1 {
        text-align: center;
    }

    .float-right {

        padding: 10px !important;
    }

    .thead {
        vertical-align: middle;
    }
</style>

<!-- Page Heading -->
<h1 class="display-6">Danh sách mượn</h1>
<div class="card shadow mb-4">
    <div class="card-header">
        <a href="{{route('borrow.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip"
            data-placement="bottom" title="Thêm sách"><i class="fas fa-plus"></i> Thêm chi mượn</a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tên độc giả</th>
                        <th>Tên sách</th>
                        <th>Ngày mượn</th>
                        <th>Ngày trả</th>
                        <th>Hạn trả</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($borrows as $borrow)
                    <tr>
                        <td>{{ $borrow->user->name }}</td>
                        <td>{{ $borrow->book->tenSach }}</td>
                        <td>{{ $borrow->date_borrow }}</td>
                        <td>{{ $borrow->date_return }}</td>
                        <td>{{ $borrow->return_expect }}</td>
                        @if($borrow->status == "0")
                        <td class="btn btn-danger btn-sm float-left mr-1" style="text-align: center;
margin-left: 32px;">Mới đăng ký</td>
                        @endif
                        @if($borrow->status == "1")
                        <td class="btn btn-info btn-sm" style="text-align: center;
margin-left: 32px;">Đang mượn</td>
                        @endif
                        @if($borrow->status == "2")
                        <td class="btn-success btn-sm float-left mr-1" style="text-align: center;
margin-left: 32px; padding-left: 30px; padding-right: 25px;">Đã trả</td>
                        @endif
                        <td>
                            <div class="d-flex" style="padding = 0px">
                                @if($borrow->status =="2"& $borrow->date_return != null)
                                <a href="{{route('borrow.show', $borrow->id)}}"
                                    class="btn btn-success btn-sm float-left mr-1" data-toggle="tooltip" title="detail"
                                    style="height:30px; width:30px;border-radius:50%"><i class="fas fa-eye"></i></a>
                                @elseif($borrow->status =="0")
                                <form method="POST" action="{{route('borrow.destroy', $borrow->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm float-left mr-1 dltBtn" data-id={{$borrow->id}}
                                        style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip"
                                        data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                </form>
                                <a href="{{route('borrow.edit', $borrow->id)}}"
                                    class="btn btn-primary btn-sm float-left mr-1"
                                    style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit"
                                    data-placement="bottom"><i class="fas fa-edit"></i></a>
                                @else
                                <a href="{{route('borrow.edit', $borrow->id)}}"
                                    class="btn btn-primary btn-sm float-left mr-1"
                                    style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit"
                                    data-placement="bottom"><i class="fas fa-edit"></i></a>
                                @endif
                            </div>
                        </td>
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
