@extends('layouts.app2')
@section('content')
<div class="container-fluid ml-5">
<h2>SỬA THỂ LOẠI</h2>

<!-- Open the form with the store function route. -->
{{ Form::open(['action' => ['CategoriesAdminController@update', $category->id], 'method' => 'put']) }}
    <!-- Include the CRSF token -->
    {{Form::token()}}
    <!-- build our form inputs -->
    <div class="form-group">
        <label for="tenTheLoai">
            Tên thể loại:
            <input class="form-control" type="text" name="tenTheLoai" class="form-control" value="{{ $category->tenTheLoai }}">
        </label>
       <div>
        @error('tenTheLoai')
                <span role="alert">
                    <p class="font-weight-light text-danger">{{ $message }}</p>
                </span>

        @enderror
       </div>
    </div>
    {{Form::submit('Cập nhật!', ['class' => 'btn btn-primary'])}}
    {{ Form::close() }}
</div>
    @endsection