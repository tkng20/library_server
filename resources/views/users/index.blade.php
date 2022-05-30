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
  th{
    background-color: #4e73df;
  color: white;
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
</style>
    <h1 class="display-6">Danh sách độc giả</h1>
    <div class="card-header">
      <a href="{{route('users.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Thêm sách"><i class="fas fa-plus"></i> Thêm độc giả</a>
    </div>


    <table class="table">
        <thead>
        <th>Tên</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Giới tính</th>
        <th>Ảnh đại diện</th>
        <th>Ngày sinh</th>
        <th colspan="3">Thao tác</th>
        </thead>

        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->gender}}</td>
                <td><img src="{{ url('public/storage/'.$user->avatar) }}"
 style="height: 100px; width: 150px;"></td>
                <td>{{$user->birthday}}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{route('users.show', $user->id)}}" class="btn btn-info btn-sm float-left mr-1" data-toggle="tooltip" title="detail" style="height:30px; width:30px;border-radius:50%"><i class="fas fa-eye"></i></a>
                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                    </div>
                <td>
            </tr>
        @endforeach
    </table>

@endsection