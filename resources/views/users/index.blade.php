@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 ">
        @include('message.success')
            <div class="card">
                <div class="card-header">
                    <h3>Users
                        <a href="{{ url('/registration') }}" class="btn btn-primary btn-sm float-right">Add User</a>
                    </h3>
                </div>
                <div class="card-body">
                
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Description</th>
                            <th width="250px">Action</th>
                        </tr>

                        @foreach($usersList as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->user_id}}</td>
                        </tr>
                        @endforeach
                    </table>
                    {{$usersList->links()}}
                </div>
                
            </div>
        </div>
    </div>
@endsection