@extends('admin.parts.layout')

@section('title')
    Settings
@endsection

@section('content')
    <settings-form-component
        :initial-data = "{{$data}}"
    ></settings-form-component>
@endsection
