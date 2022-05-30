@extends('layouts.app2')
@section('content')
<style>
th{
    background-color: #4e73df;
  color: white;
  }

  .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl {
    padding-left: 1rem;
    padding-right: 1rem;
  }
  .form-control form-control-sm{
text-align:right;

    }

  </style>
<!-- Page Heading -->

        <!-- <h1 class="h3 mb-2 text-gray-800">Danh sách mượn</h1> -->
        <h1 class="display-6">Danh sách mượn</h1>
           <!-- class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <!-- <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div> -->
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
                      <td>{{ $borrow->user->name  }}</td>
                      <td>{{ $borrow->book->tenSach }}</td>
                      <td>{{ $borrow->date_borrow }}</td>
                      <td>{{ $borrow->date_return }}</td>
                      <td>{{ $borrow->return_expect }}</td>
                      @if($borrow->status == "0")
                      <td class="btn btn-danger btn-sm float-left mr-1">Mới đăng ký</td>
                      @endif
                      @if($borrow->status == "1")
                      <td class="btn btn-info btn-sm">Đang mượn</td>
                      @endif
                      @if($borrow->status == "2")
                      <td class="btn-success btn-sm float-left mr-1">Đã trả</td>
                      @endif
                      <td>
                      <div class="d-flex" style="padding = 0px">
                        @if($borrow->status =="2"& $borrow->date_return != null)
                          <a href="{{route('borrow.show', $borrow->id)}}" class="btn btn-info btn-sm float-left mr-1" data-toggle="tooltip" title="detail" style="height:30px; width:30px;border-radius:50%"><i class="fas fa-eye"></i></a>
                        @else 
                          <!-- <a href="{{route('borrow.show', $borrow->id)}}" class="btn btn-info m-1">Chi tiết</a> -->
                          <a href="{{route('borrow.edit', $borrow->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                          
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
@endpush
