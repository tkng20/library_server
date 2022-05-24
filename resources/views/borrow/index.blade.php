@extends('layouts.app2')
@section('content')
<!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh sách mượn</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
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
                      <td class="text-danger">{{ $borrow->status }}</td>
                      <td>
                      <div class="d-flex">
                        <a href="{{route('borrow.show', $borrow->id)}}" class="btn btn-info m-1">Chi tiết</a>
                        <a href="{{route('borrow.edit', $borrow->id)}}" class="btn btn-primary m-1">Sửa</a>
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
