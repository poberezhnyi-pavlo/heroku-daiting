@extends('admin.parts.layout')

@section('title')
    Edit page
@endsection

@section('content')
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
                        <div class="form-group row">
                            <label for="inputTitle" class="col-sm-2 col-form-label">Page title</label>
                            <div class="col-sm-10">
                                <input
                                    type="text"
                                    name="title"
                                    class="form-control"
                                    id="inputTitle"
                                    placeholder="Enter a title"
                                    value="{{$page->title}}"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="summernote" class="col-sm-2 col-form-label">Page body</label>
                            <div class="col-sm-10">
                                <textarea
                                    class="form-control"
                                    name="body"
                                    rows="4"
                                    placeholder="Enter a body"
                                    id="suneditor"
                                >{{$page->body}}</textarea>
                            </div>
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
