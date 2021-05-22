@extends('site.layouts.main')

@section('title')
    Register man
@endsection

@section('content')
    <div class="container">
        <form method="post" action="{{ route('user.profile.login', 'en') }}">
            @csrf
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input
                        type="text"
                        class="form-control"
                        id="email"
                        placeholder="email"
                        name="email"
                        value="{{ old('email') ?? '' }}"
                    >
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>
        </form>
    </div>
@endsection