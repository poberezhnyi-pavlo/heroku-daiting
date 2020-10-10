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
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Birthday:</b> <span class="float-right">{{$user->user->birth_date}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Children:</b> <span class="float-right">{{$user->user->amount_of_children}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Weight:</b>
                            <span class="float-right">{{$user->user->weight}}<span class="badge badge-pill">Kg</span></span>
                        </li>
                        <li class="list-group-item">
                            <b>Height:</b>
                            <span class="float-right">{{$user->user->height}}<span class="badge badge-pill">Cm</span></span>
                        </li>
                        <li class="list-group-item">
                            <b>Eye color:</b> <span class="float-right">{{$user->user->eye_color}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Hair color:</b> <span class="float-right">{{$user->user->hair_color}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Job:</b> <span class="float-right">{{$user->user->job}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Languages:</b> <span class="float-right">
                                @isset($user->user->langs)
                                    @foreach(Languages::lookup($user->user->langs) as $lang)
                                        <span class="badge badge-info">{{$lang}}</span>
                                    @endforeach
                                @endisset
                            </span>
                        </li>
                        <li class="list-group-item">
                            <b>Travel countries:</b> <span class="float-right">
                                @isset($user->user->travel_countries)
                                    @foreach($user->user->travel_countries as $country)
                                        <span class="badge badge-warning">{{$country}}</span>
                                    @endforeach
                                @endisset
                            </span>
                        </li>
                        <li class="list-group-item">
                            <b>Vises:</b> <span class="float-right">{{$user->user->vises}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Creed:</b> <span class="float-right">{{$user->user->creed}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>City:</b> <span class="float-right">{{$user->user->city}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Ideal man:</b> <span class="float-right">{{$user->user->ideal_man}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Bad habits:</b> <span class="float-right">{{$user->user->bad_habits}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Education:</b> <span class="float-right">{{$user->user->education}}</span>
                        </li>
                        <li class="list-group-item">
                            <b>About myself:</b> <span class="float-right">{{$user->user->about_myself}}</span>
                        </li>
                    </ul>
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
