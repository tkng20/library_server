@extends('layouts.app')
@section('content')
<div class="container-fluid ml-5">
    <h1 class="display-6">Book Details</h1>

    <hr/>

    <dl>
        <dt>Tên sách</dt>
        <dd>{{$book->tenSach}}</dd>

        <dt>Tác giả</dt>
        <dd>{{$book->tacGia}}</dd>

        <dt>Thể loại</dt>
        <dd>{{$book->theLoai}}</dd>

        <dt>Số lượng</dt>
        <dd>{{$book->soLuong}}</dd>

        <dt>Số Trang</dt>
        <dd>{{$book->soTrang}}</dd>

        <dt>Ngày Xuất Bản</dt>
        <dd>{{$book->ngayXB}}</dd>

        <dt>Mô Tả</dt>
        <dd>{{$book->moTa}}</dd>
    </dl>

    <div class="d-flex">
        <a href="{{route('book.edit', $book->id)}}" class="btn btn-primary">Sửa</a>

        <form action="{{ route('book.destroy', $book->id) }}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button class="btn btn-danger ml-2"> Xoá Sách</button>
        </form>
    </div>
</div>
@endsection