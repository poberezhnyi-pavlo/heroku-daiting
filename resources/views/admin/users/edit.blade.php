@extends('admin.parts.layout')

@section('title')
    Edit user
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                id="custom-tabs-four-home-tab"
                                data-toggle="pill"
                                href="#custom-tabs-four-home"
                                role="tab"
                                aria-controls="custom-tabs-four-home"
                                aria-selected="true"
                            >
                                Main
                            </a>
                        </li>
                        @if($user->user_type === 'App\Models\Woman')
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    id="custom-tabs-woman-profile-tab"
                                    data-toggle="pill"
                                    href="#custom-tabs-woman-profile"
                                    role="tab"
                                    aria-controls="custom-tabs-woman-profile"
                                    aria-selected="false"
                                >
                                    Woman profile
                                </a>
                            </li>
                        @elseif($user->user_type === 'App\Models\Man')
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    id="custom-tabs-man-profile-tab"
                                    data-toggle="pill"
                                    href="#custom-tabs-man-profile"
                                    role="tab"
                                    aria-controls="custom-tabs-man-profile"
                                    aria-selected="false"
                                >
                                    Man profile
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div
                                class="tab-pane fade show active"
                                id="custom-tabs-four-home"
                                role="tabpanel"
                                aria-labelledby="custom-tabs-four-home-tab"
                            >
                                @include('admin.users.edit-forms.common')
                            </div>
                            @if($user->user_type === 'App\Models\Woman')
                                <div
                                    class="tab-pane fade"
                                    id="custom-tabs-woman-profile"
                                    role="tabpanel"
                                    aria-labelledby="custom-tabs-woman-profile-tab"
                                >
                                    @include('admin.users.edit-forms.woman')
                                </div>
                            @elseif($user->user_type === 'App\Models\Man')
                                <div
                                    class="tab-pane fade"
                                    id="custom-tabs-man-profile"
                                    role="tabpanel"
                                    aria-labelledby="custom-tabs-man-profile-tab"
                                >
                                    @include('admin.users.edit-forms.man')
                                </div>
                            @endif
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
