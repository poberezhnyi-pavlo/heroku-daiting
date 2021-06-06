@extends('site.layouts.main')

@section('title')
   {{ __('main.gallery') }}
@endsection

@section('content')
    <section class="section section-lg bg-default text-center">
        <div class="container">
            <h2>{{ __('main.gallery') }}</h2>
            <div
                class="row icon-modern-list no-gutters"
                style="display: flex; flex-wrap: wrap"
            >
            @forelse($women as $woman)
                    <div class="col-sm-6 col-lg-4">
                        <article class="box-icon-modern modern-variant-2">
                            <div class="icon-modern">
                                <img
                                    src="{{  asset('storage/' . $woman->avatar) }}"
                                    x="0px"
                                    y="0px"
                                    width="53.948px"
                                    height="79.418px"
                                >
                            </div>
                            <h4 class="box-icon-modern-title">
                                <a href="{{ route('user.woman.show', ['womanId' => $woman->id ]) }}">
                                    {{ $woman->full_name}}
                                </a>
                            </h4>
                        </article>
                    </div>
            @empty
                <h1>not women</h1>
            @endforelse
            </div>
            <div class="row justify-content-sm-center">
                <div class="pagination">{{ $women->links() }}</div>
            </div>
        </div>
    </section>
@endsection