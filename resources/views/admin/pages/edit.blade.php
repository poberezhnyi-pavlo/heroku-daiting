@extends('admin.parts.layout')

@section('title')
    Edit page
@endsection

@section('content')
{{--    {{dd($page)}}--}}
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">{{$page->title}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{route('pages.update', $page->id)}}">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs" role="tablist">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li class="nav-item">
                                            <a
                                                class="nav-link {{$loop->first ? 'active' : ''}}"
                                                id="tab_{{$properties['regional']}}"
                                                data-toggle="pill"
                                                href="#tabs-local-{{$properties['regional']}}"
                                                role="tab"
                                                aria-controls="custom-tabs"
                                            >
                                                {{$properties['name']}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <div
                                            class="tab-pane fade {{$loop->first ? 'active show' : ''}}"
                                            id="tabs-local-{{$properties['regional']}}"
                                            role="tabpanel"
                                            aria-labelledby="tab_{{$properties['regional']}}"
                                        >
                                            <div class="form-group row">
                                                <label for="inputTitle" class="col-sm-2 col-form-label">Page title</label>
                                                <div class="col-sm-10">
                                                    <input
                                                        type="text"
                                                        name="{{$localeCode}}[title]"
                                                        class="form-control"
                                                        id="inputTitle_{{$properties['regional']}}"
                                                        placeholder="Enter a title"
                                                        value="{{$page->translate($localeCode)->title}}"
                                                    >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="summernote" class="col-sm-2 col-form-label">Page body</label>
                                                <div class="col-sm-10">
                                                    <textarea
                                                        class="form-control suneditor"
                                                        name="{{$localeCode}}[body]"
                                                        rows="4"
                                                        placeholder="Enter a body"
                                                        id="suneditor_{{$properties['regional']}}"
                                                    >{{$page->translate($localeCode)->body}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="form-group row">
                            <label for="inputPublished" class="col-sm-2 col-form-label">Published</label>
                            <div class="col-sm-10">
                                <input
                                    type="checkbox"
                                    id="inputPublished"
                                    name="published"
                                    {{$page->published ? 'checked' : ''}}
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
