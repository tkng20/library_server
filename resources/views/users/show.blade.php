@extends('layouts.app2')
@section('content')
    <h1 class="display-6">User Details</h1>

    <hr/>

    <dl>
        <dt>First Name</dt>
        <dd>{{$user->first_name}}</dd>

        <dt>Last Name</dt>
        <dd>{{$user->last_name}}</dd>

        <dt>Age</dt>
        <dd>{{$user->age}}</dd>

        <dt>Email</dt>
        <dd>{{$user->email}}</dd>
    </dl>

    <div class="d-flex">
        <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary m-1">Edit</a>

        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button class="btn btn-danger m-1">Delete User</button>
        </form>
    </div>
@endsection