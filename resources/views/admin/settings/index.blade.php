@extends('admin.parts.layout')

@section('title')
    Settings
@endsection

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Main settings</h3>
        </div>
        <settings-form-component
            :initial-data = "{{$data}}"
        ></settings-form-component>
    </div>
@endsection
