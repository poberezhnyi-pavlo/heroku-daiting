@extends('site.layouts.main')

@php
    /** @var App\Models\Woman $woman */
@endphp

@section('title')
    {{ $woman->user->full_name ?? 'Women profile'}}
@endsection

@section('content')
    <section class="section section-lg bg-default">
        <div class="container">
            <div class="row row-50 align-items-lg-center justify-content-xl-between">
                <div class="col-lg-6">
                    <h2>{{ $woman->user->full_name }}</h2>
                    <div class="divider-lg"></div>
                    <p class="big text-gray-800">
                        {{ $woman->age }} y.o.
                    </p>
                    <p>
                        {{ $woman->creed }}
                    </p>
                    <div class="row row-30">
                        <div class="col-md-6">
                            <button class="button button-default-outline" data-toggle="modal" data-target="#exampleModalCenter">Send me gift</button>
                        </div>
                        <div class="col-md-6">
                            <a class="button button-default-outline" href="#">Send me message</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="box-images box-images-variant-3">
                        <img src="{{ asset('storage/' . $woman->user->avatar) }}" alt="{{ $woman->user->full_name }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-md bg-default text-center">
        <div class="container">
            <h2>About me</h2>
            <div class="divider-lg"></div>
            <p class="block-lg">
                {{ $woman->about_myself }}
            </p>
            <div class="row row-40">
                <div class="col-12 bd-example">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="text-left">Date of birth</td>
                            <td class="text-left">{{ $woman->birth_date }}</td>
                        </tr>
                        <tr class="table-danger">
                            <td class="text-left">Full name</td>
                            <td class="text-left">{{ $woman->user->full_name }}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Children</td>
                            <td class="text-left">{{
                                $woman->amount_of_children ?
                                'Count ' . $woman->amount_of_children :
                                'Has no children'
                            }}</td>
                        </tr>
                        <tr class="table-danger">
                            <td class="text-left">Height</td>
                            <td class="text-left">{{ $woman->height }}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Weight</td>
                            <td class="text-left">{{ $woman->weight }}</td>
                        </tr>
                        <tr class="table-danger">
                            <td class="text-left">Eye color</td>
                            <td class="text-left">{{ $woman->eye_color }}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Hair color</td>
                            <td class="text-left">{{ $woman->height }}</td>
                        </tr>
                        <tr class="table-danger">
                            <td class="text-left">Education</td>
                            <td class="text-left">{{ $woman->education }}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Job</td>
                            <td class="text-left">{{ $woman->job }}</td>
                        </tr>
                        <tr class="table-danger">
                            <td class="text-left">Visit countries</td>
                            <td class="text-left">{{ collect($woman->travel_countries)->implode(', ') }}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Knowledge of languages</td>
                            <td class="text-left">{{ collect($woman->langs)->implode(', ') }}</td>
                        </tr>
                        <tr class="table-danger">
                            <td class="text-left">Bad habits</td>
                            <td class="text-left">{{ $woman->bad_habits }}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Creed</td>
                            <td class="text-left">{{ $woman->creed }}</td>
                        </tr>
                        <tr class="table-danger">
                            <td class="text-left">City</td>
                            <td class="text-left">{{ $woman->city }}</td>
                        </tr><tr class="table-danger">
                            <td class="text-left">Ideal man</td>
                            <td class="text-left">{{ $woman->ideal_man }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </section>
    <section class="section section-md bg-default text-center">
        <div class="container">
            <h2>Gallery</h2>
            <div>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button
                                class="nav-link"
                                id="nav-home-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#images"
                                type="button"
                                role="tab"
                                aria-controls="nav-home"
                                aria-selected="true"
                        >
                            Images
                        </button>
                        <button
                                class="nav-link active"
                                id="nav-profile-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#videos"
                                type="button"
                                role="tab"
                                aria-controls="nav-profile"
                                aria-selected="false"
                        >
                            Videos
                        </button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div
                            class="tab-pane fade show active"
                            id="images"
                            role="tabpanel"
                            aria-labelledby="nav-home-tab"
                    >
{{--                        <image-component--}}
{{--                            :woman-id="{{ $woman->getKey() }}"--}}
{{--                        />--}}
                    </div>
                    <div
                            class="tab-pane fade"
                            id="videos"
                            role="tabpanel"
                            aria-labelledby="nav-profile-tab"
                    >
                        <video-component
                            :woman-id="{{ $woman->getKey() }}"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Send gift</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <gifts-component
                    :woman-id="{{ $woman->getKey() }}"
                ></gifts-component>
            </div>
        </div>
    </div>

@endsection