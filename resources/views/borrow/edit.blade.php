@extends('layouts.app2')
@section('content')
<div class="card">
    <h5 class="card-header">Cập nhật tình trạng mượn</h5>
    <div class="card-body">
      <form method="post" action="{{route('borrow.update',$borrow->id)}}">
        @csrf 
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Tên người mượn<span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title" readonly value="{{$borrow->user->name}}" class="form-control">
        </div>
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Tên sách<span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title" readonly value="{{$borrow->book->tenSach}}" class="form-control">
        </div>
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Ngày mượn<span class="text-danger">*</span></label>
          <input id="inputTitle" type="date" name="date_borrow" readonly value="{{ $borrow->date_borrow }}" class="form-control">
        </div>
        <div class="form-group">
          <label for="ngayXB" class="col-form-label">Ngày trả<span class="text-danger">*</span></label>
          <input class="form-control" type="date" name="date_return" value="{{ $borrow->date_return }}">
        @error('date_return')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>
        <div class="form-group">
          <label for="ngayXB" class="col-form-label">Hạn trả<span class="text-danger">*</span></label>
          <input class="form-control" type="date" name="return_expect" value="{{ $borrow->return_expect }}">
        @error('return_expect')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>
        <div class="form-group">
        <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="1" {{(($borrow->status=='1') ? 'selected' : '')}}>Đang mượn</option>
            <option value="2" {{(($borrow->status=='2') ? 'selected' : '')}}>Đã trả</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3" style="    text-align: center;">
           <button class="btn btn-danger" type="submit">Cập nhật</button>
        </div>
      </form>
    </div>
</div>
@endsection