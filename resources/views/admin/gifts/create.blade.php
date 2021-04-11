@extends('admin.parts.layout')

@section('title')
    Create Gift
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Create</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{route('gifts.store')}}" enctype="multipart/form-data">
                    @csrf
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
                                                <label for="inputTitle" class="col-sm-2 col-form-label">Gift title</label>
                                                <div class="col-sm-10">
                                                    <input
                                                        type="text"
                                                        name="{{$localeCode}}[title]"
                                                        class="form-control"
                                                        id="inputTitle_{{$properties['regional']}}"
                                                        placeholder="Enter a title"
                                                        value="{{old('title')}}"
                                                    >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="summernote" class="col-sm-2 col-form-label">Gift description</label>
                                                <div class="col-sm-10">
                                                    <textarea
                                                        class="form-control suneditor"
                                                        name="{{$localeCode}}[description]"
                                                        rows="4"
                                                        placeholder="Enter a description"
                                                        id="suneditor_{{$properties['regional']}}"
                                                    >{{old('description')}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="form-group row">
                            <label for="giftImage" class="col-sm-2 col-form-label">Gift image</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input
                                        type="file"
                                        class="custom-file-input"
                                        name="image"
                                        id="giftImage"
                                        accept="image/x-png,image/jpeg"
                                    >
                                    <label class="custom-file-label" for="giftImage">Choose image...</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="inputPrice"
                                    name="price"
                                    min="0"
                                    step=".01"
                                    value="{{old('price', 0)}}"
                                >
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
@endsection
