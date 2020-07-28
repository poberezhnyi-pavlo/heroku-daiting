@extends('admin.parts.layout')

@section('title')
    Create {{ucfirst($type)}}
@endsection

@section('content')
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
                    @if($type === 'woman')
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
                    @elseif($type === 'man')
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
                <form class="form-horizontal" method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div
                                class="tab-pane fade show active"
                                id="custom-tabs-four-home"
                                role="tabpanel"
                                aria-labelledby="custom-tabs-four-home-tab"
                            >
                                @include('admin.users.forms.common')
                            </div>
                            @if($type === 'woman')
                                <div
                                    class="tab-pane fade"
                                    id="custom-tabs-woman-profile"
                                    role="tabpanel"
                                    aria-labelledby="custom-tabs-woman-profile-tab"
                                >
                                    @include('admin.users.forms.woman')
                                </div>
                            @elseif($type === 'man')
                                <div
                                    class="tab-pane fade"
                                    id="custom-tabs-man-profile"
                                    role="tabpanel"
                                    aria-labelledby="custom-tabs-man-profile-tab"
                                >
                                    @include('admin.users.forms.man')
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
@endsection
