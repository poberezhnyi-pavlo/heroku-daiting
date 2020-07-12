@extends('admin.parts.layout')

@section('title')
    Edit user
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">{{$user->name}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">User name</label>
                            <div class="col-sm-10">
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    id="inputName"
                                    placeholder="Enter a name"
                                    value="{{$user->name}}"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">E-mail</label>
                            <div class="col-sm-10">
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    id="inputEmail"
                                    placeholder="Enter an E-mail"
                                    value="{{$user->email}}"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input
                                    type="tel"
                                    name="phone"
                                    class="form-control"
                                    id="inputPhone"
                                    placeholder="Enter an phone"
                                    value="{{$user->phone}}"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Main photo</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputAvatar" name="avatar">
                                        <label class="custom-file-label" for="inputAvatar">Choose image</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($roles)
                            <div class="form-group row">
                                <label for="inputRole" class="col-sm-2 col-form-label">User role</label>
                                <div class="col-sm-10">
                                    <select id="inputRole" class="custom-select" name="role">
                                        @foreach($roles as $role)
                                            <option
                                                value="{{ $role }}"
                                                {{ $role === $user->role ? 'selected="selected"' : '' }}
                                            >
                                                {{ $role }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                        <div class="form-group row">
                            <label for="inputPublished" class="col-sm-2 col-form-label">Published</label>
                            <div class="col-sm-10">
                                <input
                                    type="checkbox"
                                    id="inputPublished"
                                    name="deleted_at"
                                    {{$user->deleted_at ? '' : 'checked' }}
                                    data-bootstrap-switch
                                    data-off-color="danger"
                                    data-on-color="success"
                                >
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success offset-lg-2 offset-md-2">Save</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
@endsection
