@extends('admin.parts.layout')

@section('title')
    Gifts
@endsection

@section('content')
    <a
        href="{{route('gifts.create')}}"
        class="btn btn-primary mb-4"
    >Create Gift</a>

    @if(count($gifts) > 0)
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
                                <th>Price</th>
                                <th style="width: 50px">Published</th>
                                <th style="width: 100px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($gifts as $gift)
                                <tr>
                                    <td class="align-middle">{{$gift->id}}</td>
                                    <td class="align-middle">{{$gift->translate()->title}}</td>
                                    <td class="align-middle">${{$gift->price}}</td>
                                    <td class="text-center align-middle">
                                        @if($gift->deleted_at)
                                            <i class="fas fa-ban text-danger"></i>
                                        @else
                                            <i class="far fa-check-circle text-success"></i>
                                        @endif
                                    </td>
                                    <td
                                        class="text-center align-middle"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Edit page"
                                    >
                                        <a href="{{route('gifts.edit', $gift->id)}}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{route('gifts.destroy', $gift->id)}}" method="POST"
                                              style="display: inline-block">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn">
                                                <i class="far fa-trash-alt text-orange"></i>
                                            </button>
                                        </form>
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
    @endif
@endsection
