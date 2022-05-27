@extends('layouts.app2')
@section('content')
    <h1 class="display-6">Users</h1>
    <a href="{{route('users.create')}}">Create New</a>
    <hr/>


    <table class="table">
        <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Age</th>
        <th>Email</th>
        <th colspan="3">Actions</th>
        </thead>

        @foreach($users as $user)
            <tr>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->age}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{route('users.show', $user->id)}}" class="btn btn-info m-1">Details</a>
                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary m-1">Edit</a>

                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-danger m-1">Delete User</button>
                        </form>
                    </div>

                </td>
            </tr>
        @endforeach
    </table>

@endsection