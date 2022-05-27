@extends('layouts.app2')
@section('content')
<div class="container-fluid ml-5">
<h2>THÊM THỂ LOẠI</h2>

 @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif

{{Form::token()}}

<form action="{{route('category.store')}}" method="post" class="mt-2">
    @csrf
    <div class="form-group">
    <label for="tenTheLoai">
        Tên thể loại:
        <input class="form-control" type="text" name="tenTheLoai" class="form-control">
    </label>
    <div>
    <button type="submit" class="btn btn-primary">Thêm thể loại</button>
</form>
</div>
@endsection