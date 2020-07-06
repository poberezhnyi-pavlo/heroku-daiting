@extends('admin.parts.layout')

@section('title')
    Users
@endsection

@section('content')
    <users-component user-type="{{$type}}"></users-component>
@endsection
