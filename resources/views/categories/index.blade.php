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
  .row{
    margin-top: 25px;
  }
  .card-title{
color: #4e73df;
  }
</style>
<h1 class="display-5 text-center">Danh sách thể loại</h1>
<div class="card-header">
      <a href="{{route('category.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Thêm sách"><i class="fas fa-plus"></i> Thêm thể loại</a>
    </div>
<div class="row">
    @foreach($categories as $category)
    <div class="col-6 col-xl-4 col-xxl-2 col-lg-6 mt-4">
    <div class="card">
      <div class="card-body" style = "border-left: .25rem solid #799ee0">
        <h5 class="card-title">{{ $category->tenTheLoai }}</h5>
        <a href="{{route('category.edit', $category->id)}}" class="btn btn-info">   Sửa   </a>
      </div>
    </div>
    </div>
    @endforeach
</div>
@endsection
