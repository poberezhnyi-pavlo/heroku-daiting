@extends('site.layouts.main')

@php
    /** @var App\Models\User $user */
@endphp

{{--@section('title')--}}
{{--    Profile - {{ $user->name ?? '' }}--}}
{{--@endsection--}}

@section('content')
    <div class="container">
       <div class="row">
           <div class="col-md-3">
               <ul class="nav flex-column">
                   <li class="nav-item">
                       <a class="nav-link active" href="#">Profile</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="#">Messages</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="#">Wallet</a>
                   </li>
               </ul>
           </div>
           <div class="col-md-9">
               @yield('profile')
           </div>
       </div>
    </div>
@endsection