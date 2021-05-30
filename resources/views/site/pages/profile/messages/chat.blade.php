@extends('site.pages.profile.show')

@section('title')
    Messages
@endsection

@section('profile')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Messages</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <messages-component
                        :user="{{ Auth::user() }}"
                    />
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
