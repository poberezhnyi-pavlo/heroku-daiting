@extends('admin.parts.layout')

@section('title')
    User "{{$user->name}}"
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img
                            class="profile-user-img img-fluid img-circle"
                            @if(Str::startsWith($user->avatar, 'http'))
                            src="{{$user->avatar}}"
                            @else
                            src="{{ asset('storage/' . $user->avatar) }}"
                            @endif
                            alt="User profile picture"
                        >
                    </div>

                    <h3 class="profile-username text-center">{{$user->name}} {{$user->last_name}}</h3>
                    <p class="text-muted text-center"><i class="fas fa-envelope-open-text"></i> {{$user->email}}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Status:</b> <a class="float-right">
                                @if($user->deleted_at)
                                    <span class="badge badge-danger">Not active</span>
                                @else
                                    <span class="badge badge-success">Active</span>
                                @endif
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Phone:</b> <a class="float-right">{{$user->phone}}</a>
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
                        <li class="list-group-item">
                            <b>Type:</b> <a class="float-right">{{Str::afterLast($user->user_type, '\\')}}</a>
                        </li>
                    </ul>

                    <div>
                        <a href="{{route('users.edit', $user->id)}}"
                           class="btn btn-success"
                           data-toggle="tooltip"
                           data-placement="top"
                           title="Edit account"
                        >
                            <i class="fas fa-user-edit"></i>
                            <b>Edit profile</b>
                        </a>
                        <button
                            class="btn btn-danger"
                            data-toggle="modal"
                            data-placement="top"
                            title="Delete account"
                            data-target="#deleteConfirmModal"
                        >
                            <i class="far fa-trash-alt"></i>
                            <b>Delete account</b>
                        </button>
                        @if($user->deleted_at)
                            <form
                                action="{{route('activate', $user->id)}}"
                                method="POST"
                                class="d-inline"
                            >
                                @csrf
                                <button
                                    class="btn btn-info"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Enable account"
                                >
                                    <i class="fas fa-trash-restore"></i>
                                    <b>Enable account</b>
                                </button>
                            </form>
                        @else
                            <form
                                action="{{route('deactivate', $user->id)}}"
                                method="POST"
                                class="d-inline"
                            >
                                @method('DELETE')
                                @csrf
                                <button
                                    class="btn btn-warning"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Delete account"
                                >
                                    <i class="fas fa-ban"></i>
                                    <b>Disable account</b>
                                </button>
                            </form>
                        @endif

                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body box-profile">
                    @if($user->user_type === 'App\Models\Woman')
                        @include('admin.users.show.woman')
                    @elseif($user->user_type === 'App\Models\Man')
                        @include('admin.users.show.man')
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Do you really want to delete user <b>{{$user->name}}</b>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form
                        action="{{route('users.destroy', $user->id)}}"
                        method="POST"
                        class="d-inline"
                    >
                        @csrf
                        @method('DELETE')
                        <button
                            class="btn btn-danger"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="Delete account"
                        >
                            <i class="far fa-trash-alt"></i>
                            <b>Delete account</b>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
