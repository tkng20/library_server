@extends('layouts.app2')
@section('content')
<h1 class="display-5 text-center text-uppercase mb-5">Danh sách thể loại</h1>

<table class="table">
  <thead class="thead-dark">
    <tr>
        <th scope="col" style="width: 20%">Thể loại</th>
        <th scope="col" style="width: 20%">Hành động</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $category)
        <tr>
            <th scope="row">{{ $category->tenTheLoai }}</th>
            <td>
            <div class="d-flex">
                        <a href="{{route('category.edit', $category->id)}}" class="btn btn-primary m-1">Sửa</a>

                        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-danger m-1">Xoá</button>
                        </form>
                    </div>
            <td>
        </tr>
    @endforeach
  </tbody>
</table>

<div>
  {{$categories->links()}}
</div>
@endsection
