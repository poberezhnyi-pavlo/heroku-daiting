@extends('admin.parts.layout')

@section('title')
    User "{{$user->name}}"
@endsection

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <img
                    class="profile-user-img img-fluid img-circle"
                    @if(Str::start('$user->avatar', 'images'))
                        src="{{ asset($user->avatar) }}"
                    @else
                        src="{{$user->avatar}}"
                    @endif
                    alt="User profile picture"
                >
            </div>

            <h3 class="profile-username text-center">{{$user->name}}</h3>

            <p class="text-muted text-center">{{$user->email}}</p>

            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Status:</b> <a class="float-right">
                        @if($user->deleted_at)
                            <span class="badge badge-error">Not active</span>
                        @else
                            <span class="badge badge-success">Active</span>
                        @endif
                    </a>
                </li>
                <li class="list-group-item">
                    <b>User role:</b> <a class="float-right">{{$user->role}}</a>
                </li>
                <li class="list-group-item">
                    <b>Registered at:</b> <a class="float-right">{{$user->created_at}}</a>
                </li>
                <li class="list-group-item">
                    <b>Updated at:</b> <a class="float-right">{{$user->updated_at}}</a>
                </li>
            </ul>

            <a href="#" class="btn btn-success btn-block">
                <i class="fas fa-user-edit"></i>
                <b>Edit profile</b>
            </a>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
