@extends('site.layouts.main')

@section('title')
{{ $title }}
@endsection

@section('content')
    <section class="section section-md bg-default text-center">
        <div class="container">
            <h2>{{ $page->title }}</h2>
            <div class="divider-lg"></div>
            <div class="row">
                <div class="col-12">
                    <p class="text-left">
                        {!! $page->body !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection