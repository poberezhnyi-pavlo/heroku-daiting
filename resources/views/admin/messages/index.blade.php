@extends('admin.parts.layout')

@section('title')
    Messages
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Messages</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <messages-layout
                        :men = "{{$men}}"
                        :women = "{{$women}}"
                    />
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
