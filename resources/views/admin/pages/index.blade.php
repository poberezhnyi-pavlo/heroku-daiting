@extends('admin.parts.layout')

@section('title')
    Pages
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10px">ID</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Published</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pages as $page)
                            <tr>
                                <td>{{$page->id}}</td>
                                <td>{{$page->title}}</td>
                                <td>{{$page->slug}}</td>
                                <td class="text-center">
                                    @if($page->published)
                                        <i class="far fa-check-circle text-success"></i>
                                    @else
                                        <i class="fas fa-ban text-danger"></i>
                                    @endif
                                </td>
                                <td
                                    class="text-blue text-center"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Edit page"
                                >
                                    <a href="{{route('pages.edit', $page->id)}}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
