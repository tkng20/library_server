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

    .btn-info {
        color: #fff;
        background-color: #fac338;
        border-color: #fac338;
    }

    .btn-info:hover {
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
<h1 class="display-6">Danh sách độc giả</h1>
<div class="card shadow mb-4">
    <div class="card-header">
        <a href="{{route('users.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip"
            data-placement="bottom" title="Thêm sách"><i class="fas fa-plus"></i> Thêm độc giả</a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Giới tính</th>
                    <th>Ảnh đại diện</th>
                    <th>Ngày sinh</th>
                    <th colspan="3">Thao tác</th>
                </thead>

                <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->gender}}</td>
                    <td>
                        @if($user->avatar != null)
                        <img src="data:image/jpeg;base64,{{ $user->avatar }}" style="height: 100px; width: 100px;">
                        @else
                       <img src="{{ url('https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png') }}" style="height: 50px; width: 50px;">
                       @endif
                    </td>
                    <td>{{$user->birthday}}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{route('users.show', $user->id)}}" class="btn btn-info btn-sm float-left mr-1"
                                data-toggle="tooltip" title="detail"
                                style="height:30px; width:30px;border-radius:50%"><i class="fas fa-eye"></i></a>
                            <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary btn-sm float-left mr-1"
                                style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit"
                                data-placement="bottom"><i class="fas fa-edit"></i></a>
                        </div>
                    <td>
                </tr>
                @endforeach
              </tbody>   
            </table>
        </div>
        <div class="mt-4">{{$users->links()}}</div>
    </div>

</div>
@endsection
@push('scripts')
<script src="http://3.0.59.80/test/resources/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="http://3.0.59.80/test/resources/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="http://3.0.59.80/test/resources/assets/js/demo/datatables-demo.js"></script>
@endpush