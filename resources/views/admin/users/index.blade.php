@extends('admin.parts.layout')

@section('title')
    Users
@endsection

@section('content')
    <users-component
        user-type="{{$type}}"
        :current-user="{{json_encode(Auth::user())}}"
    ></users-component>
@endsection
