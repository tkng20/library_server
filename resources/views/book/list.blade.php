@extends('layouts.app2')
@section('content')
<h1 class="display-5 text-center text-uppercase mb-5">danh sách sách</h1>

<table class="table">
  <thead class="thead-dark">
    <tr>
        <th scope="col" style="width: 1%">ID</th>
        <th scope="col" style="width: 15%">Tên sách</th>
        <th scope="col" style="width: 12%">Tác giả</th>
        <th scope="col" style="width: 5%">Thể loại</th>
        <th scope="col" style="width: 5%">Số lượng</th>
        <th scope="col" style="width: 5%">Số trang</th>
        <th scope="col" style="width: 10%">Ngày XB</th>
        <th scope="col" style="width: 32%">Mô Tả</td>
        <th scope="col" style="width: 20%">Action</td>
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
            <td>{{ $book->moTa }}</td>
            <td>
            <div class="d-flex">
                        <a href="{{route('book.show', $book->id)}}" class="btn btn-info m-1">Chi tiết</a>
                        <a href="{{route('book.edit', $book->id)}}" class="btn btn-primary m-1">Sửa</a>

                        <form action="{{ route('book.destroy', $book->id) }}" method="POST">
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
  {{$books->links()}}
</div>
@endsection
