@extends('admin.parts.layout')

@section('title')
    Homepage
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Top slider</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <homepage-slides>

                    </homepage-slides>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
